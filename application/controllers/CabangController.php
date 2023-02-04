<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CabangController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // if(!$this->session->userdata('SESS_KANIGARA_USERID')) {
    //   redirect('auth');
    // }

    $this->load->model('CabangModel', 'cabang_m');
  }

  public function index()
  {
    $data['cabang'] = $this->cabang_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/cabang/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/cabang/tambah');
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->cabang_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect('cabang');
  }

  public function edit($id) {
    $data['produk'] = $this->cabang_m->get_single($id);

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/cabang/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->cabang_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil merubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal merubah data</div>");
    }

    redirect('cabang');
  }

  public function delete() {
    $id = $this->input->post('id');

    if($this->cabang_m->delete($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapusa data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapusa data</div>");
    }

    redirect('cabang');
  }
}
