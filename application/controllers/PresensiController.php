<?php

class PresensiController extends CI_Controller {
  public function __construct() {
    parent::__construct();
    
    $this->load->model("PresensiModel", "presensi_m");
  }

  // PNS
  public function index() {
    $data['presensi'] = $this->presensi_m->get_all('pns');

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/pns/index', $data);
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
    $data['presensi'] = $this->presensi_m->get_all('honorer');

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/honorer/index', $data);
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
    $filter_absen = $this->input->post("filter_absen");

    $presensi = $this->presensi_m->get_all("magang");

    if($filter_absen) {
      $filter = [
        'filter_absen' => $filter_absen
      ];

      $this->session->set_userdata("SESS_PRESENSI_FILTER", $filter);
      
      $presensi = $this->presensi_m->get_all_filter("magang", $filter);
    }

    $data["presensi"] = $presensi;
    $data["filter_absen"] = $filter_absen;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/magang/index', $data);
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