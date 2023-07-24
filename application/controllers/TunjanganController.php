<?php

class TunjanganController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("TunjanganModel", "tunjangan_m");
  }

  public function index() {
    $data['tunjangan'] = $this->tunjangan_m->get_all_tunjangan();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/tunjangan/index', $data);
    $this->load->view('templates/panel/footer');
  }

  public function add() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/tunjangan/add');
    $this->load->view('templates/panel/footer');
  }

  public function do_add() {
    $data = $this->input->post();

    if($this->tunjangan_m->insert_tunjangan($data)) {

    }

    redirect("tunjangan");
  }
}