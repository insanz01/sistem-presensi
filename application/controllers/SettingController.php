<?php

class SettingController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("SettingModel", "setting_m");
    $this->load->model("GolonganModel", "golongan_m");
    $this->load->model("JabatanModel", "jabatan_m");
  }

  public function jadwal() {
    $data['jadwal_pns'] = $this->setting_m->get_jadwal_pns();
    $data['jadwal_honorer'] = $this->setting_m->get_jadwal_honorer();
    $data['jabatan'] = $this->jabatan_m->get_all();
    $data['golongan'] = $this->golongan_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/pengaturan/jadwal', $data);
    $this->load->view('templates/panel/footer');
  }

  public function jadwal_pns() {
    $data = $this->input->post();

    if($this->setting_m->set_jadwal_pns($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("setting/jadwal");
  }

  public function jadwal_honorer() {
    $data = $this->input->post();

    if($this->setting_m->set_jadwal_honorer($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("setting/jadwal");
  }

  public function gaji() {
    $data = $this->input->post();

    if($this->setting_m->set_gaji($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("setting/jadwal");
  }

  public function jabatan() {
    $data = $this->input->post();

    if($this->setting_m->set_jabatan($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("setting/jadwal");
  }
}