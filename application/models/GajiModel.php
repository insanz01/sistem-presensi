<?php

class GajiModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_all() {
    $query = "SELECT karyawan.*, tipe_karyawan.nama as tipe, pengaturan_gaji.gaji as gaji, karyawan.id_jabatan, golongan.id as golongan_id, golongan.nama as golongan FROM karyawan JOIN tipe_karyawan ON karyawan.tipe_karyawan = tipe_karyawan.id JOIN pengaturan_gaji ON pengaturan_gaji.id_golongan = karyawan.id_golongan JOIN golongan ON golongan.id = karyawan.id_golongan WHERE karyawan.tipe_karyawan <> 3";
    $karyawan = $this->db->query($query)->result_array();

    $results = [];
    foreach($karyawan as $k) {
      $temp = $k;
      $gaji_bulan_ini = $this->count_salary($k['golongan_id']);
      $tunjangan = $this->count_tunjangan($k['id_jabatan']);
      $absensi = $this->get_absensi($k['id']);
      $potongan_gaji = $this->get_cut_salary();

      $temp['jumlah_terlambat'] = $absensi;
      $temp['tunjangan'] = $tunjangan;
      $temp['gaji_bulan_ini'] = ($gaji_bulan_ini + $tunjangan) - ($absensi * $potongan_gaji);
      array_push($results, $temp);
    }
    
    return $results;
  }
  
  public function count_salary($golongan) {
    $query = "SELECT gaji FROM pengaturan_gaji WHERE id_golongan = $golongan";
    $data = $this->db->query($query)->row_array();
    
    return $data['gaji'];
  }

  public function count_tunjangan($jabatan) {
    $query = "SELECT nominal FROM pengaturan_tunjangan WHERE id_jabatan = $jabatan";
    $data = $this->db->query($query)->row_array();
    
    return $data['nominal'];
  }
  
  public function get_cut_salary() {
    $pengaturan = $this->db->get_where("pengaturan", ["id" => 1])->row_array();
    
    return $pengaturan['potongan_gaji'];
  }

  public function get_all_filter($filter) {
    $query = "SELECT karyawan.*, tipe_karyawan.nama as tipe, pengaturan_gaji.gaji as gaji, karyawan.id_jabatan, golongan.id as golongan_id, golongan.nama as golongan FROM karyawan JOIN tipe_karyawan ON karyawan.tipe_karyawan = tipe_karyawan.id JOIN pengaturan_gaji ON pengaturan_gaji.id_golongan = karyawan.id_golongan JOIN golongan ON golongan.id = karyawan.id_golongan WHERE karyawan.tipe_karyawan <> 3";

    if($filter['filter_golongan']) {
      $query .= " AND golongan.id = $filter[filter_golongan]";
    }

    $karyawan = $this->db->query($query)->result_array();

    $results = [];
    foreach($karyawan as $k) {
      $temp = $k;
      $gaji_bulan_ini = $this->count_salary($k['golongan_id']);
      $tunjangan = $this->count_tunjangan($k['id_jabatan']);
      $absensi = $this->get_absensi($k['id']);
      if($filter['filter_bulan']) {
        $absensi = $this->get_absensi_filter($k['id'], $filter['filter_bulan']);
      }
      $potongan_gaji = $this->get_cut_salary();
      
      $temp['jumlah_terlambat'] = $absensi;
      $temp['tunjangan'] = $tunjangan;
      $temp['gaji_bulan_ini'] = ($gaji_bulan_ini + $tunjangan) - ($absensi * $potongan_gaji);
      array_push($results, $temp);
    }
    
    return $results;
  }

  public function count_salary_filter($golongan) {
    $query = "SELECT gaji FROM pengaturan_gaji WHERE id_golongan = $golongan";
    $data = $this->db->query($query)->row_array();
    
    return $data['gaji'];
  }
  
  public function get_cut_salary_filter() {
    $pengaturan = $this->db->get_where("pengaturan", ["id" => 1])->row_array();
    
    return $pengaturan['potongan_gaji'];
  }

  public function get_all_single($id) {
    return $this->db->get_where("pengaturan_gaji", ["id" => $id])->row_array();
  }

  public function get_absensi($id_karyawan) {
    $query = "SELECT COUNT(*) as total FROM presensi WHERE MONTH(created_at) = MONTH(NOW()) AND id_karyawan = $id_karyawan AND terlambat = 1";
    $data = $this->db->query($query)->row_array();

    return $data['total'];
  }

  public function get_absensi_filter($id_karyawan, $filter_bulan) {
    $query = "SELECT COUNT(*) as total FROM presensi WHERE MONTH(created_at) = $filter_bulan AND id_karyawan = $id_karyawan AND terlambat = 1";
    $data = $this->db->query($query)->row_array();

    return $data['total'];
  }

  public function insert($data) {
    $this->db->insert("gaji", $data);
    return $this->db->insert_id();
  }

  public function update($data, $id) {
    $this->db->set($data);
    $this->db->where("id", $id);
    $this->db->update("gaji");

    return $this->db->affected_rows();
  }

  public function delete($id) {
    return $this->db->delete("gaji", ["id" => $id]);
  }

  public function get_gaji_by_golongan_id($id_golongan) {
    return $this->db->get_where("pengaturan_gaji", ["id_golongan" => $id_golongan])->row_array();
  }

  // public function get_all_tipe() {
  //   return $this->db->get("tipe_karyawan")->result_array();
  // }
}