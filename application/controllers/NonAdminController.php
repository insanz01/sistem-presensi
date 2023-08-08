<?php

class NonAdminController extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model("NonAdminModel", "non_admin_m");
    $this->load->model("KategoriModel", "kategori_m");
    $this->load->model("SettingModel", "setting_m");
  }

  public function presensi() {
    $data['kategori_presensi'] = $this->kategori_m->get_all();
    $data['presensi'] = $this->non_admin_m->current_month_presensi();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/non_admin/presensi', $data);
    $this->load->view('templates/panel/footer');
  }

  public function logbook() {
    $data['logbook'] = $this->non_admin_m->get_all_logbook();

    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/non_admin/logbook', $data);
    $this->load->view('templates/panel/footer');
  }

  public function do_logbook() {
    date_default_timezone_set("Asia/Makassar");

    $NIP = $this->session->userdata("SESS_PRESENSI_NIP");

    $data = [
      "NIP" => $NIP,
      "catatan" => $this->input->post("catatan")
    ];
    if($this->non_admin_m->add_logbook($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil menambahkan logbook</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal menambahkan logbook</div>");
    }

    redirect("na/logbook");
  }

  public function do_presensi() {
    date_default_timezone_set('Asia/Makassar');

    $NIP = $this->session->userdata("SESS_PRESENSI_NIP");

    // if($NIP != $this->session->userdata("SESS_PRESENSI_NIP")) {
    //   $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>NIP tidak valid</div>");

    //   redirect("na/presensi");
    // }

    $jadwal_pns = $this->setting_m->get_jadwal_pns();
    $jadwal_honorer = $this->setting_m->get_jadwal_honorer();
    
    $karyawan = $this->non_admin_m->get_karyawan_by_NIP($NIP);

    $kategori_presensi = $this->input->post("kategori_presensi");

    $terlambat = 0;
    $current_time = date("H:i:s", time());

    if($karyawan['tipe_karyawan'] == 1 || $karyawan['tipe_karyawan'] == 2) {
      if($kategori_presensi == 1) {
        if($current_time < $jadwal_pns['waktu_awal_mulai_kerja']) {
          $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi belum dibuka</div>");
  
          redirect("na/presensi");
        }
  
        if($current_time > $jadwal_pns['waktu_akhir_mulai_kerja']) {
          $terlambat = 1;
        }
      } else if($kategori_presensi == 2) {
        if($current_time < $jadwal_pns['waktu_awal_pulang_kerja']) {
          $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi pulang belum dibuka</div>");
  
          redirect("na/presensi");
        }
      } else if($kategori_presensi == 5) {
        if($current_time < $jadwal_pns['waktu_akhir_pulang_kerja']) {
          $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi lembur belum dibuka</div>");
  
          redirect("na/presensi");
        }
      }
    } else {
      if($kategori_presensi == 1) {
        if($current_time < $jadwal_pns['waktu_awal_mulai_kerja']) {
          $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi belum dibuka</div>");
  
          redirect("na/presensi");
        }
  
        if($current_time > $jadwal_pns['waktu_akhir_mulai_kerja']) {
          $terlambat = 1;
        }
      } else if($kategori_presensi == 2) {
        if($current_time < $jadwal_pns['waktu_awal_pulang_kerja']) {
          $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Jadwal presensi pulang belum dibuka</div>");
  
          redirect("na/presensi");
        }
      }
    }

    // $terlambat = $this->non_admin_m->check_keterlambatan();

    $data = [
      'id_karyawan' => $karyawan['id'],
      'terlambat' => $terlambat,
      'kategori_presensi' => $kategori_presensi
    ];

    if($this->non_admin_m->exists_presensi($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Anda sudah melakukan presensi ini</div>");

      redirect('na/presensi');
    }

    if($this->non_admin_m->presensi($data)) {
      if($kategori_presensi == 5) {
        $lemburData = [
          'id_karyawan' => $karyawan['id'],
          'tanggal_lembur' => date("Y-m-d", time()),
          'durasi' => 0,
          'jam_mulai' => date("H:i:s", time()),
          'jam_selesai' => NULL,
          'keterangan' => "",
          'status' => 1
        ];

        $this->non_admin_m->ajukan_lembur($lemburData);
      }

      if($kategori_presensi == 6) {
        $lembur = $this->non_admin_m->get_lembur_hari_ini($karyawan['id']);

        $durasi = time() - strtotime($lembur['jam_mulai']);

        $lemburData = [
          'durasi' => $durasi,
          'jam_selesai' => date("H:i:s", time())
        ];

        $this->non_admin_m->update_lembur($lembur['id'], $lemburData);
      }

      if($terlambat) {
        $this->session->set_flashdata("pesan", "<div class='alert alert-warning' role='alert'>Berhasil melakukan presensi, tapi anda terlambat !</div>");
      } else {
        $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil Presensi</div>");
      }

    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal Presensi</div>");
    }

    redirect('na/presensi');
  }

  public function ajukan_lembur() {
    $this->load->view('templates/panel/header');
    $this->load->view('templates/panel/sidebar');
    $this->load->view('templates/panel/navbar');
    $this->load->view('app/non_admin/ajukan_lembur');
    $this->load->view('templates/panel/footer');
  }

  public function do_ajukan_lembur() {
    $data = $this->input->post();

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file_bukti'))
    {
      $imageData = array('upload_data' => $this->upload->data());

      $data['file_bukti'] = $imageData['upload_data']['file_name'];
    }
    
    $karyawan = $this->non_admin_m->get_karyawan_by_NIP($this->session->userdata("SESS_PRESENSI_NIP"));
    $data['id_karyawan'] = $karyawan['id'];

    if($this->non_admin_m->ajukan_lembur($data)) {
      $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Berhasil Mengajukan Lembur</div>");
    } else {
      $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Gagal Mengajukan Lembur</div>");
    }

    redirect('na/ajukan_lembur');
  }
}