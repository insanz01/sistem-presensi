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
      $presensi = $this->app_m->get_all_presensi_filter_magang($filter);
    }

    $data["all_laporan"] = $presensi;

    $this->load->view("app/print/presensi", $data);
  }

  public function lembur() {
    
  }
}