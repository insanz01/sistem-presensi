<?php

class GajiController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("GajiModel", "gaji_m");
    $this->load->model("GolonganModel", "golongan_m");
  }

  public function index() {
    $filter_bulan = $this->input->post("filter_bulan");
    $filter_golongan = $this->input->post("filter_golongan");

    $gaji = $this->gaji_m->get_all();

    if($filter_bulan || $filter_golongan) {
      $filter = [
        'filter_bulan' => $filter_bulan,
        'filter_golongan' => $filter_golongan
      ];

      // if($filter_bulan) {
      //   $this->session->userdata("FILTER_BULAN", $filter_bulan);
      // }

      // if($filter_golongan) {
      //   $this->session->userdata("FILTER_GOLONGAN", $filter_golongan);
      // }

      $gaji = $this->gaji_m->get_all_filter($filter);
    }

    $data['gaji'] = $gaji;
    $data['golongan'] = $this->golongan_m->get_all();

    if(!$filter_bulan) {
      $filter_bulan = (string) date("n", time());

      // if($this->session->userdata("FILTER_BULAN")) {
      //   $filter_bulan = $this->session->userdata("FILTER_BULAN");
      // }
    }

    $data['filter_bulan'] = $filter_bulan;
    $data['filter_golongan'] = $filter_golongan;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/gaji/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    // $data['tipe_karyawan'] = $this->karyawan_m->get_all_tipe();
    $data['golongan'] = $this->golongan_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/gaji/add', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->gaji_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect("gaji");
  }

  public function edit($id) {
    $data['id'] = $id;
    // $data['tipe_karyawan'] = $this->karyawan_m->get_all_tipe();
    $data['gaji'] = $this->gaji_m->get_all_single($id);
    $data['golongan'] = $this->golongan_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/gaji/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->gaji_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil mengubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal mengubah data</div>");
    }

    redirect("gaji");
  }

  public function delete($id) {
    if($this->gaji_m->remove($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapus data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapus data</div>");
    }

    redirect("gaji");
  }
}