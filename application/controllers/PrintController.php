<?php

class PrintController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("AppModel", "app_m");
    $this->load->model("GajiModel", "gaji_m");
    $this->load->model("MagangModel", "magang_m");
  }

  public function karyawan() {
    $data['all_laporan'] = $this->app_m->get_all_karyawan_PNS();

    $this->load->view("app/print/karyawan", $data);
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

  public function agenda_kegiatan($id) {
    $data['all_laporan'] = $this->magang_m->get_all_agenda_by_magang_id($id);
    $data['magang'] = $this->magang_m->get_single_magang($id);

    $this->load->view("app/print/agenda_kegiatan", $data);
  }

  public function penilaian() {
    $data['all_laporan'] = $this->magang_m->get_all_penilaian_magang();

    $this->load->view("app/print/penilaian_kegiatan", $data);
  }

  public function presensi_magang() {
    $filter = $this->session->userdata("SESS_PRESENSI_FILTER");

    $presensi = $this->app_m->get_all_presensi_magang();

    if($filter) {      
      $presensi = $this->app_m->get_all_presensi_magang_filter($filter);
    }

    $data["all_laporan"] = $presensi;

    $this->load->view("app/print/presensi_magang", $data);
  }

  public function lembur_pns() {
    $lembur = $this->app_m->get_all_lembur_pns();
    
    $filter_bulan = $this->session->userdata("FILTER_BULAN_PNS_LEMBUR");
    if($filter_bulan) {
      $lembur = $this->app_m->get_all_lembur_pns_filter($filter_bulan);
    }

    $data["all_laporan"] = $lembur;
    
    $this->load->view("app/print/lembur", $data);
  }

  public function lembur_honorer() {
    $lembur = $this->app_m->get_all_lembur_honorer();

    $filter_bulan = $this->session->userdata("FILTER_BULAN_HONORER_LEMBUR");
    if($filter_bulan) {
      $lembur = $this->app_m->get_all_lembur_honorer_filter($filter_bulan);
    }

    $data["all_laporan"] = $lembur;
    
    $this->load->view("app/print/lembur", $data);
  }

  public function gaji() {
    $bulan = ["", "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOPEMBER", "DESEMBER", "SEMUA"];
    
    $filter_bulan = $this->session->userdata("FILTER_BULAN");
    $filter_golongan = $this->session->userdata("FILTER_GOLONGAN");

    $gaji = $this->gaji_m->get_all();

    if($filter_bulan || $filter_golongan) {
      $filter = [
        'filter_bulan' => $filter_bulan,
        'filter_golongan' => $filter_golongan
      ];

      $gaji = $this->gaji_m->get_all_filter($filter);
    }

    $nama_bulan = "";

    if($filter_bulan && $filter_bulan != 13) {
      $nama_bulan = "BULAN " . $bulan[$filter_bulan];
    } else {
      $nama_bulan = "SATU TAHUN";
    }

    $data["all_laporan"] = $gaji;
    $data["nama_bulan"] = $nama_bulan;

    $this->load->view("app/print/gaji", $data);
  }

  public function detail_gaji($id_karyawan) {
    $bulan = ["", "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOPEMBER", "DESEMBER"];

    $filter_bulan = $this->session->userdata("FILTER_BULAN");

    if(!$filter_bulan) {
      $filter_bulan = date('n', time());
    }

    $filter = [
      'filter_bulan' => $filter_bulan
    ];

    $gaji = $this->gaji_m->get_single_filter($id_karyawan, $filter);

    $nama_bulan = "BULAN " . $bulan[$filter_bulan];

    $data['laporan'] = $gaji;
    $data['nama_bulan'] = $nama_bulan;

    $this->load->view("app/print/gaji_detail", $data);
  }
}