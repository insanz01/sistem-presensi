<?php

class PotonganController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("PotonganModel", "potongan_m");
  }

  public function index() {
    $data['potongan'] = $this->potongan_m->get_all_potongan();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/potongan/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/potongan/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->potongan_m->insert_potongan($data)) {

    }

    redirect("potongan");
  }
}