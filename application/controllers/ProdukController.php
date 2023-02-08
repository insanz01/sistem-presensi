<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // if(!$this->session->userdata('SESS_KANIGARA_USERID')) {
    //   redirect('auth');
    // }

    $this->load->model('ProdukModel', 'produk_m');
  }

  public function index()
  {
    $data['produk'] = $this->produk_m->get_all();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/produk/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/produk/tambah');
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    $config['upload_path']          = './uploads/image/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $count = count($_FILES['gambar']['name']);

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('foto'))
    {
      $error = array('error' => $this->upload->display_errors());

      var_dump($error); die;
    }
    else
    {
      $uploadData = array('upload_data' => $this->upload->data());

      $data['foto'] = $uploadData['upload_data']['file_name'];
    }

    $id_produk = $this->produk_m->insert($data);

    if($id_produk) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan data</div>");
    }

    for($i=0;$i<$count;$i++){
    
      if(!empty($_FILES['gambar']['name'][$i])){
  
        $_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
        $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
        $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];

        $config['upload_path'] = 'uploads/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000';
        $config['file_name'] = $_FILES['gambar']['name'][$i];
 
        $this->load->library('upload',$config); 
  
        if($this->upload->do_upload('gambar')){
          $uploadData = $this->upload->data();
          $filename = $uploadData['file_name'];

          $data_gambar = [
            'url_gambar' => $filename,
            'id_produk' => $id_produk
          ];
 
          // $data['totalFiles'][] = $filename;
          $this->produk_m->insert_gambar($data_gambar);
        }
      }
 
    }

    redirect('produk');
  }

  public function edit($id) {
    $data['produk'] = $this->produk_m->get_single($id);

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/produk/edit', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_edit($id) {
    $data = $this->input->post();

    $config['upload_path']          = './uploads/image/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';

    $this->load->library('upload', $config);

    if ( $this->upload->do_upload('foto')) {
      $uploadData = array('upload_data' => $this->upload->data());
  
      $data['foto'] = $uploadData['upload_data']['file_name'];
    }

    if($this->produk_m->update($data, $id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil merubah data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal merubah data</div>");
    }

    redirect('produk');
  }

  public function delete() {
    $id = $this->input->post('id');

    if($this->produk_m->delete($id)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menghapusa data</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menghapusa data</div>");
    }

    redirect('produk');
  }
}
