<?php

class NonAdminController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("NonAdminModel", "non_admin_m");
  }

  public function presensi() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/non_admin/presensi');
    $this->load->view('templates/panel/footer');
  }

  public function do_presensi() {
    $NIP = $this->input->post('NIP');
    
    $karyawan = $this->non_admin_m->get_karyawan_by_NIP($NIP);

    $data = [
      'id_karyawan' => $karyawan['id_karyawan'],
      'terlambat' => $terlambat
    ];
  }
}