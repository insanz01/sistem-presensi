<?php

class TransaksiController extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function pinjam() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/transaksi/pinjam');
    $this->load->view('templates/panel/footer');
  }

  public function kembali() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/transaksi/kembali');
    $this->load->view('templates/panel/footer');
  }
}