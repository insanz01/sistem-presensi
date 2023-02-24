<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if(!$this->session->userdata('SESS_PRESENSI_USERID')) {
      redirect('auth');
    }

    $this->load->model('AppModel', 'app_m');
  }

  public function index()
  {
    // $data['total_bpd'] = $this->app_m->get_total_biaya_perjalanan_dinas();
    // $data['total_lpd'] = $this->app_m->get_total_laporan_perjalanan_dinas();
    // $data['total_sppd'] = $this->app_m->get_total_surat_perintah_perjalanan_dinas();
    // $data['total_spt'] = $this->app_m->get_total_surat_perintah_tugas();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/dashboard');
    $this->load->view('templates/panel/footer');
  }

  public function presensi() {
    $filter_karyawan = $this->input->post("filter_karyawan");
    $filter_absen = $this->input->post("filter_absen");

    $presensi = $this->app_m->get_all_presensi();

    $filter = [
      "filter_karyawan" => NULL,
      "filter_absen" => NULL
    ];
    
    $this->session->set_userdata("SESS_PRESENSI_FILTER", $filter);
    
    if($filter_karyawan || $filter_absen) {
      $filter = [
        'filter_karyawan' => $filter_karyawan,
        'filter_absen' => $filter_absen
      ];

      $this->session->set_userdata("SESS_PRESENSI_FILTER", $filter);
      
      $presensi = $this->app_m->get_all_presensi_filter($filter);
    }

    $data["presensi"] = $presensi;
    $data["filter_karyawan"] = $filter_karyawan;
    $data["filter_absen"] = $filter_absen;

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/presensi/karyawan/index', $data);
    $this->load->view('templates/panel/footer');
  }
}
