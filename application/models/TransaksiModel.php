<?php

class TransaksiModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_produk_by_code($kode_produk) {
    $query = "SELECT produk.id, produk.nama, produk.detail, produk.merk, produk.harga, katalog.jumlah FROM katalog JOIN produk ON katalog.id_produk = produk.id WHERE produk.kode_produk = '$kode_produk'";

    return $this->db->query($query)->row_array();
  }

  public function get_produk_kembali_by_KTP($NIP_penyewa) {
    $query = "SELECT sewa_keluar.id as id_sewa, produk.id as id_produk, produk.nama, produk.detail, produk.merk, produk.harga, sewa_keluar.NIP_penyewa, sewa_keluar.nama_penyewa, sewa_keluar.jumlah, sewa_keluar.created_at as tanggal_sewa FROM sewa_keluar JOIN produk ON sewa_keluar.id_produk = produk.id WHERE sewa_keluar.NIP_penyewa = '$NIP_penyewa' WHERE sewa_keluar.id not in (SELECT id_sewa_keluar FROM sewa_masuk)";

    return $this->db->query($query)->result_array();
  }

  public function get_produk_kembali_by_code($kode_produk) {
    $query = "SELECT sewa_keluar.id as id_sewa, produk.id as id_produk, produk.nama, produk.detail, produk.merk, produk.harga, sewa_keluar.NIP_penyewa, sewa_keluar.nama_penyewa, sewa_keluar.jumlah, sewa_keluar.created_at as tanggal_sewa FROM sewa_keluar JOIN produk ON sewa_keluar.id_produk = produk.id WHERE produk.kode_produk = '$kode_produk'";

    return $this->db->query($query)->row_array();
  }

  public function add_sewa_pinjam($data) {
    if($this->update_stok_keluar($data['id_produk'], $data['jumlah'])) {
      return $this->db->insert("sewa_keluar", $data);
    }

    return false;
  }

  public function add_sewa_kembali($data) {
    $query = "SELECT * FROM sewa_keluar WHERE KTP_penyewa = '$data[KTP_penyewa]'";
    $produk_pinjam = $this->db->query($query)->result_array();

    foreach($produk_pinjam as $pinjam) {
      $kembali_exist = $this->db->get_where("sewa_masuk", ["id_sewa_keluar", $pinjam['id']])->row_array();

      if(!$kembali_exist) {
        if($this->update_stok_kembali($pinjam['id_produk'], $pinjam['jumlah'])) {
          $data_pinjam = [
            'id_sewa_keluar' => $pinjam['id']
          ];

          $this->db->insert("sewa_masuk", $data_pinjam);
        }
      }
    }

    return true;
  }

  public function update_stok_keluar($id_produk, $jumlah) {
    $produk_katalog = $this->db->get_where("katalog", ["id_produk", $id_produk])->row_array();

    $update_stok = $produk_katalog - $jumlah;
    if($update_stok < 0) {
      return false;
    }

    $this->db->set("jumlah", $update_stok);
    $this->db->where("id_produk", $id_produk);
    $this->db->update("katalog");

    return $this->db->affected_rows();
  }

  public function update_stok_kembali($id_produk, $jumlah) {
    $produk_katalog = $this->db->get_where("katalog", ["id_produk", $id_produk])->row_array();

    $update_stok = $produk_katalog + $jumlah;

    $this->db->set("jumlah", $update_stok);
    $this->db->where("id_produk", $id_produk);
    $this->db->update("katalog");

    return $this->db->affected_rows();
  }
}