<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KatalogController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // if(!$this->session->userdata('SESS_KANIGARA_USERID')) {
    //   redirect('auth');
    // }

    $this->load->model('KatalogModel', 'katalog_m');
    $this->load->model('CabangModel', 'cabang_m');
    $this->load->model('ProdukModel', 'produk_m');
  }

  public function index()
  {
    $data['cabang'] = $this->cabang_m->get_all();
    $id_cabang = null;
    $data['katalog'] = NULL;

    $filter_cabang = $this->input->post('filter_cabang');
    if($filter_cabang) {
      $data['katalog'] = $this->katalog_m->get_all_by_cabang_id($filter_cabang);
      $id_cabang = $filter_cabang;
      $this->session->set_userdata("filter_cabang", $filter_cabang);
    } else {
      $data['katalog'] = $this->katalog_m->get_all_by_cabang_id($data['cabang'][0]['id']);
      $id_cabang = $data['cabang'][0]['id'];
      $this->session->set_userdata("filter_cabang", $data["cabang"][0]['id']);
    }

    $data['id_cabang'] = $id_cabang;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/katalog/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $data['produk'] = $this->produk_m->get_all();
    $data['cabang'] = $this->cabang_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/katalog/tambah', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->katalog_m->insert($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    redirect('katalog');
  }

  public function edit($id) {
    $data['katalog'] = $this->katalog_m->get_single($id);
    $data['cabang'] = $this->cabang_m->get_all();
    $data['produk'] = $this->produk_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/katalog/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    if($this->katalog_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil merubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal merubah data</div>");
    }

    redirect('katalog');
  }

  public function delete() {
    $id = $this->input->post('id');

    if($this->katalog_m->delete($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapusa data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapusa data</div>");
    }

    redirect('katalog');
  }
}
