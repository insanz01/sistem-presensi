<?php

class PresensiController extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  // PNS
  public function index() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/pns/index');
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/pns/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->presensi_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("presensi");
  }

  public function edit($id) {
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/pns/edit');
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->presensi_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("presensi");
  }

  public function delete($id) {
    if($this->presensi_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("presensi");
  }

  // Honorer
  public function index_honorer() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/honorer/index');
    $this->load->view('templates/panel/footer');
  }

  public function add_honorer() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/honorer/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add_honorer() {
    $data = $this->input->post();

    if($this->presensi_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("presensi");
  }

  public function edit_honorer($id) {
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/honorer/edit');
    $this->load->view('templates/panel/footer');
  }

  public function do_edit_honorer($id) {
    $data = $this->input->post();

    if($this->presensi_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("presensi");
  }

  public function delete_honorer($id) {
    if($this->presensi_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("presensi");
  }

  // Magang
  public function index_magang() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/magang/index');
    $this->load->view('templates/panel/footer');
  }

  public function add_magang() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/magang/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add_magang() {
    $data = $this->input->post();

    if($this->presensi_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("presensi");
  }

  public function edit_magang($id) {
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/magang/edit');
    $this->load->view('templates/panel/footer');
  }

  public function do_edit_magang($id) {
    $data = $this->input->post();

    if($this->presensi_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("presensi");
  }

  public function delete_magang($id) {
    if($this->presensi_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("presensi");
  }
}