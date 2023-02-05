<?php

class LaporanController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("ProdukModel", "produk_m");
    $this->load->model("CabangModel", "cabang_m");
  }

  public function produk() {
    $data['produk'] = $this->produk_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/laporan/produk/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function cabang() {
    $data['cabang'] = $this->cabang_m->get_all_report();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/laporan/cabang/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function katalog() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/laporan/katalog/index');
    $this->load->view('templates/panel/footer');
  }
}