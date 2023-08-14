<?php

class MagangController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("MagangModel", "magang_m");
  }

  public function agenda() {
    $data['magang'] = $this->magang_m->get_all_magang();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/agenda/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add_agenda() {
    $id_magang = $this->session->userdata("SESS_PRESENSI_MAGANGID");

    $data['agenda'] = $this->magang_m->get_all_agenda_by_magang_id($id_magang);

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/agenda/tambah', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_add_agenda() {
    date_default_timezone_set("Asia/Makassar");

    $id_magang = $this->session->userdata("SESS_PRESENSI_MAGANGID");

    $data = [
      "id_magang" => $id_magang,
      "kegiatan" => $this->input->post('kegiatan')
    ];

    if($this->magang_m->add_agenda($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan agenda</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan agenda</div>");
    }

    redirect("magang/add_agenda");
  }

  public function detail($id) {
    $data['agenda'] = $this->magang_m->get_all_agenda_by_magang_id($id);
    $data['magang'] = $this->magang_m->get_single_magang($id);
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/agenda/detail', $data);
    $this->load->view('templates/panel/footer');
  }

  public function penilaian() {
    $data['magang'] = $this->magang_m->get_all_penilaian_magang();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/agenda/penilaian', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add_penilaian() {
    $data['magang'] = $this->magang_m->get_not_exist_penilaian_magang();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/agenda/add_penilaian', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_add_penilaian() {
    // $data['penilaian'] = $this->magang_m->
    $data = $this->input->post();

    if($this->magang_m->add_penilaian($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan penilaian</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan penilaian</div>");
    }

    redirect("magang/penilaian");
  }

  public function edit_penilaian($id) {
    $data['penilaian'] = $this->magang_m->get_single_penilaian_magang($id);
    $data['id'] = $id;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/agenda/edit_penilaian', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit_penilaian($id) {
    $data = $this->input->post();

    if($this->magang_m->edit_penilaian($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah penilaian</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah penilaian</div>");
    }

    redirect("magang/penilaian");
  }

  public function delete_penilaian($id) {
    if($this->magang_m->delete_penilaian($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus penilaian</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus penilaian</div>");
    }

    redirect("magang/penilaian");
  }
}