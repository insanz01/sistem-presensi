<?php

class LemburController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("LemburModel", "lembur_m");
  }

  public function index() {
    $filter_bulan = $this->input->post("filter_bulan");

    $lembur = $this->lembur_m->get_all('pns');

    if($filter_bulan) {
      $lembur = $this->lembur_m->get_all_filter('pns', $filter_bulan);
    } else {
      $filter_bulan = 0;
    }

    $data['lembur'] = $lembur;
    $data['filter_bulan'] = $filter_bulan;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/pns/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/pns/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->lembur_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("lembur");
  }

  public function edit($id) {
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/pns/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->lembur_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("lembur");
  }

  public function delete($id) {
    if($this->lembur_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("lembur");
  }

  // Honorer
  public function index_honorer() {
    $filter_bulan = $this->input->post("filter_bulan");

    $lembur = $this->lembur_m->get_all('honorer');

    if($filter_bulan) {
      $lembur = $this->lembur_m->get_all_filter('honorer', $filter_bulan);
    } else {
      $filter_bulan = 0;
    }

    $data['lembur'] = $lembur;
    $data['filter_bulan'] = $filter_bulan;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/honorer/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add_honorer() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/honorer/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add_honorer() {
    $data = $this->input->post();

    if($this->lembur_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("lembur");
  }

  public function edit_honorer($id) {
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/honorer/edit');
    $this->load->view('templates/panel/footer');
  }

  public function do_edit_honorer($id) {
    $data = $this->input->post();

    if($this->lembur_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("lembur");
  }

  public function delete_honorer($id) {
    if($this->lembur_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("lembur");
  }

  // Magang
  public function index_magang() {
    $data['lembur'] = $this->lembur_m->get_all('magang');

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/magang/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add_magang() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/magang/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add_magang() {
    $data = $this->input->post();

    if($this->lembur_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("lembur");
  }

  public function edit_magang($id) {
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/lembur/magang/edit');
    $this->load->view('templates/panel/footer');
  }

  public function do_edit_magang($id) {
    $data = $this->input->post();

    if($this->lembur_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("lembur");
  }

  public function delete_magang($id) {
    if($this->lembur_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("lembur");
  }

  public function status($id_lembur, $status, $path) {
    if($this->lembur_m->update_status($id_lembur, $status)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah status data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah status data</div>");
    }

    redirect("lembur/" . $path);
  }
}