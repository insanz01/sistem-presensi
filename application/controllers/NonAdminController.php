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

    $terlambat = $this->non_admin_m->check_keterlambatan();

    $data = [
      'id_karyawan' => $karyawan['id'],
      'terlambat' => $terlambat
    ];

    if($this->non_admin_m->presensi($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil Presensi</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal Presensi</div>");
    }

    redirect('na/presensi');
  }

  public function ajukan_lembur() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/non_admin/ajukan_lembur');
    $this->load->view('templates/panel/footer');
  }

  public function do_ajukan_lembur() {
    $data = $this->input->post();
    
    $karyawan = $this->non_admin_m->get_karyawan_by_NIP($this->session->userdata("SESS_PRESENSI_NIP"));
    $data['id_karyawan'] = $karyawan['id'];

    if($this->non_admin_m->ajukan_lembur($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil Mengajukan Lembur</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal Mengajukan Lembur</div>");
    }

    redirect('na/ajukan_lembur');
  }
}