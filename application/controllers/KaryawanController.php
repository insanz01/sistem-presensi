<?php

class KaryawanController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("KaryawanModel", "karyawan_m");
    $this->load->model("GolonganModel", "golongan_m");
    $this->load->model("JabatanModel", "jabatan_m");
  }

  public function index() {
    $data['karyawan'] = $this->karyawan_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/karyawan/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $data['tipe_karyawan'] = $this->karyawan_m->get_all_tipe();
    $data['golongan'] = $this->golongan_m->get_all();
    $data['jabatan'] = $this->jabatan_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/karyawan/add', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->karyawan_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("karyawan");
  }

  public function edit($id) {
    $data['id'] = $id;
    $data['tipe_karyawan'] = $this->karyawan_m->get_all_tipe();
    $data['karyawan'] = $this->karyawan_m->get_all_single($id);
    $data['golongan'] = $this->golongan_m->get_all();
    $data['jabatan'] = $this->jabatan_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/karyawan/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->karyawan_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("karyawan");
  }

  public function delete($id) {
    if($this->karyawan_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("karyawan");
  }

  public function magang() {
    $data['magang'] = $this->magang_m->get_all_magang();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/admin/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add_magang() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/admin/tambah');
    $this->load->view('templates/panel/footer');
  }

  public function do_add_magang() {
    $data = $this->input->post();

    if($this->karyawan_m->insert_magang($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("karyawan");
  }

  public function edit_magang($id) {
    $data['id'] = $id;
    $data['magang'] = $this->magang_m->get_single_magang($id);

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/magang/admin/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit_magang($id) {
    $data = $this->input->post();

    if($this->karyawan_m->update_magang($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("karyawan");
  }

  public function delete_magang($id) {
    if($this->karyawan_m->remove_magang($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("karyawan");
  }


}