<?php

class PrintController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("AppModel", "app_m");
  }

  public function presensi() {
    $filter = $this->session->userdata("SESS_PRESENSI_FILTER");

    $presensi = $this->app_m->get_all_presensi();

    if($filter) {
      $presensi = $this->app_m->get_all_presensi_filter($filter);
    }

    $data["all_laporan"] = $presensi;

    $this->load->view("app/print/presensi", $data);
  }

  public function presensi_magang() {
    $filter = $this->session->userdata("SESS_PRESENSI_FILTER");

    $presensi = $this->app_m->get_all_presensi_magang();

    if($filter) {      
      $presensi = $this->app_m->get_all_presensi_magang_filter($filter);
    }

    $data["all_laporan"] = $presensi;

    $this->load->view("app/print/presensi", $data);
  }

  public function lembur_pns() {
    $lembur = $this->app_m->get_all_lembur_pns();

    $data["all_laporan"] = $lembur;
    
    $this->load->view("app/print/lembur", $data);
  }

  public function lembur_honorer() {
    $lembur = $this->app_m->get_all_lembur_honorer();

    $data["all_laporan"] = $lembur;
    
    $this->load->view("app/print/lembur", $data);
  }
}