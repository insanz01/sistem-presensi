<?php

class APIController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("GajiModel", "gaji_m");
    $this->load->model("JabatanModel", "jabatan_m");
  }

  public function golongan_gaji($id_golongan) {
    $data = [
      "data" => null,
      "error" => "tidak ada data"
    ];

    $gaji = $this->gaji_m->get_gaji_by_golongan_id($id_golongan);
    
    if($gaji) {
      $data = [
        "data" => $gaji,
        "error" => null
      ];
    }

    echo json_encode($data, JSON_PRETTY_PRINT);
  }

  public function jabatan_tunjangan($id_jabatan) {
    $data = [
      "data" => null,
      "error" => "tidak ada data"
    ];

    $tunjangan = $this->jabatan_m->get_tunjangan_by_jabatan_id($id_jabatan);
    
    if($tunjangan) {
      $data = [
        "data" => $tunjangan,
        "error" => null
      ];
    }

    echo json_encode($data, JSON_PRETTY_PRINT);
  }
}