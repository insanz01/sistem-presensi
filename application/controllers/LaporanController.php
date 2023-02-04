<?php

class LaporanController extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function produk() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/laporan/produk/index');
    $this->load->view('templates/panel/footer');
  }

  public function cabang() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/laporan/cabang/index');
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