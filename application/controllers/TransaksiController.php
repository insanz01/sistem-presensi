<?php

class TransaksiController extends CI_Controller {
  public function __construct() {
    parent::__construct();
    
    $this->load->model("TransaksiModel", "transaksi_m");
  }

  public function pinjam() {
    $data['produk'] = null;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/transaksi/pinjam', $data);
    $this->load->view('templates/panel/footer');
  }

  public function check_produk_pinjam() {
    $kode_produk = $this->input->post("kode_produk");

    $data['produk'] = $this->transaksi_m->get_produk_by_code($kode_produk);

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/transaksi/pinjam', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_pinjam() {
    $data = $this->input->post();

    if($this->transaksi_m->add_sewa_pinjam($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("transaksi/pinjam");
  }

  public function kembali() {
    $data['produk'] = [];

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/transaksi/kembali', $data);
    $this->load->view('templates/panel/footer');
  }

  public function check_produk_kembali() {
    $KTP_penyewa = $this->input->post("KTP_penyewa");

    $data['produk'] = $this->transaksi_m->get_produk_kembali_by_KTP($KTP_penyewa);
    $data['KTP_penyewa'] = $KTP_penyewa;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/transaksi/kembali', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_kembali() {
    $data = $this->input->post();

    if($this->transaksi_m->add_sewa_kembali($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("transaksi/kembali");
  }
}