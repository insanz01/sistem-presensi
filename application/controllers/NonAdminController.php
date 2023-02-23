<?php

class NonAdminController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("NonAdminModel", "non_admin_m");
    $this->load->model("KategoriModel", "kategori_m");
    $this->load->model("SettingModel", "setting_m");
  }

  public function presensi() {
    $data['kategori_presensi'] = $this->kategori_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/non_admin/presensi', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_presensi() {
    $NIP = $this->input->post('NIP');

    if($NIP != $this->session->userdata("SESS_PRESENSI_NIP")) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>NIP tidak valid</div>");

      redirect("na/presensi");
    }

    $jadwal_pns = $this->setting_m->get_jadwal_pns();
    $jadwal_honorer = $this->setting_m->get_jadwal_honorer();
    
    $karyawan = $this->non_admin_m->get_karyawan_by_NIP($NIP);

    if($karyawan['tipe_karyawan'] == 1) {
      $current_time = date("H:i:s", time());
      if($current_time < $jadwal_pns['waktu_mulai_kerja']) {
        $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi belum dibuka</div>");

        redirect("na/presensi");
      }
    } else {
      $current_time = date("H:i:s", time());
      if($current_time < $jadwal_honorer['waktu_mulai_kerja']) {
        $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi belum dibuka</div>");

        redirect("na/presensi");
      }
    }

    $terlambat = $this->non_admin_m->check_keterlambatan();

    $data = [
      'id_karyawan' => $karyawan['id'],
      'terlambat' => $terlambat,
      'kategori_presensi' => $this->input->post("kategori_presensi")
    ];

    if($this->non_admin_m->presensi($data)) {
      if($terlambat) {
        $this->session->set_flashdata("pesan", "<div class='alert alert-warning' role='alert'>Berhasil melakukan presensi, tapi anda terlambat !</div>");
      } else {
        $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil Presensi</div>");
      }

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