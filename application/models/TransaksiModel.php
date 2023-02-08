<?php

class TransaksiModel extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function get_produk_by_code($kode_produk) {
    $query = "SELECT produk.id, produk.nama, produk.detail, produk.merk, produk.harga, katalog.jumlah FROM katalog JOIN produk ON katalog.id_produk = produk.id WHERE produk.kode_produk = '$kode_produk'";

    return $this->db->query($query)->row_array();
  }

  public function get_produk_kembali_by_code($kode_produk) {
    $query = "SELECT sewa_keluar.id as id_sewa, produk.id as id_produk, produk.nama, produk.detail, produk.merk, produk.harga, sewa_keluar.NIP_penyewa, sewa_keluar.nama_penyewa, sewa_keluar.jumlah, sewa_keluar.created_at as tanggal_sewa FROM sewa_keluar JOIN produk ON sewa_keluar.id_produk = produk.id WHERE produk.kode_produk = '$kode_produk'";

    return $this->db->query($query)->row_array();
  }

  public function add_sewa_pinjam($data) {
    return $this->db->insert("sewa_keluar", $data);
  }

  public function add_sewa_kembali($data) {
    return $this->db->insert("sewa_masuk", $data);
  }
}