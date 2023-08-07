<?php

class TunjanganController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("TunjanganModel", "tunjangan_m");
    $this->load->model("KaryawanModel", "karyawan_m");
  }

  public function index() {
    $tunjangan = $this->tunjangan_m->get_all_tunjangan();

    $result = [];
    foreach($tunjangan as $t) {
      $additional = $this->tunjangan_m->get_tunjangan_dari_jabatan($t['id']);

      $t["nominal"] += $additional['nominal'];
      $result[] = $t;
    }

    $data['tunjangan'] = $result;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/tunjangan/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $data['karyawan'] = $this->karyawan_m->get_all_PNS();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/tunjangan/add', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->tunjangan_m->insert_tunjangan($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambah data</div>");
    }

    redirect("tunjangan");
  }

  public function edit($id) {
    $data['id'] = $id;
    $data['tunjangan'] = $this->tunjangan_m->get_single_tunjangan($id);
    $data['karyawan'] = $this->karyawan_m->get_all_PNS();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/tunjangan/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->tunjangan_m->update_tunjangan($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("tunjangan");
  }

  public function delete($id) {
    if($this->tunjangan_m->delete_tunjangan($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("tunjangan");
  }
}