<style>
  #map {
    height: 500px;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pengaturan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active"></li>
          </ol> -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <?php if($this->session->flashdata('pesan')): ?>
          <div class="col-7 mx-auto text-center mb-2">
            <?= $this->session->flashdata('pesan') ?>
          </div>
        <?php endif; ?>
        <div class="col-7 mx-auto">
          <div class="card mb-4">
            <div class="card-body">
              <form action="<?= base_url("setting/jadwal/pns") ?>" method="post">
                <h3>Pengaturan PNS</h3>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="waktu_awal_mulai_kerja">Jam Awal Presensi Mulai Kerja</label>
                      <input type="time" class="form-control" name="waktu_awal_mulai_kerja" id="waktu_awal_mulai_kerja" value="<?= date('H:i:s', strtotime($jadwal_pns['waktu_awal_mulai_kerja'])) ?>">
                    </div>
                    <div class="col-6">
                      <label for="waktu_akhir_mulai_kerja">Jam Akhir Presensi Mulai Kerja</label>
                      <input type="time" class="form-control" name="waktu_akhir_mulai_kerja" id="waktu_akhir_mulai_kerja" value="<?= date('H:i:s', strtotime($jadwal_pns['waktu_akhir_mulai_kerja'])) ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="waktu_awal_istirahat">Jam Awal Istirahat Kerja</label>
                      <input type="time" class="form-control" name="waktu_awal_istirahat" id="waktu_awal_istirahat" value="<?= date('H:i:s', strtotime($jadwal_pns['waktu_awal_istirahat'])) ?>">
                    </div>
                    <div class="col-6">
                      <label for="waktu_akhir_istirahat">Jam Akhir Istirahat Kerja</label>
                      <input type="time" class="form-control" name="waktu_akhir_istirahat" id="waktu_akhir_istirahat" value="<?= date('H:i:s', strtotime($jadwal_pns['waktu_akhir_istirahat'])) ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="waktu_awal_pulang_kerja">Jam Awal Pulang Kerja</label>
                      <input type="time" class="form-control" name="waktu_awal_pulang_kerja" id="waktu_awal_pulang_kerja" value="<?= date('H:i:s', strtotime($jadwal_pns['waktu_awal_pulang_kerja'])) ?>">
                    </div>
                    <div class="col-6">
                      <label for="waktu_akhir_pulang_kerja">Jam Akhir Pulang Kerja</label>
                      <input type="time" class="form-control" name="waktu_akhir_pulang_kerja" id="waktu_akhir_pulang_kerja" value="<?= date('H:i:s', strtotime($jadwal_pns['waktu_akhir_pulang_kerja'])) ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="potongan_gaji">Potongan Gaji (Jika terlambat)</label>
                  <input type="number" min="0" value="<?= $jadwal_pns['potongan_gaji'] ?>" class="form-control" id="potongan_gaji" name="potongan_gaji">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">UPDATE PENGATURAN PNS</button>
                </div>
              </form>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <form action="<?= base_url("setting/jadwal/honorer") ?>" method="post">
                <h3>Pengaturan Honorer</h3>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="waktu_awal_mulai_kerja">Jam Awal Presensi Mulai Kerja</label>
                      <input type="time" class="form-control" name="waktu_awal_mulai_kerja" id="waktu_awal_mulai_kerja" value="<?= date('H:i:s', strtotime($jadwal_honorer['waktu_awal_mulai_kerja'])) ?>">
                    </div>
                    <div class="col-6">
                      <label for="waktu_akhir_mulai_kerja">Jam Akhir Presensi Mulai Kerja</label>
                      <input type="time" class="form-control" name="waktu_akhir_mulai_kerja" id="waktu_akhir_mulai_kerja" value="<?= date('H:i:s', strtotime($jadwal_honorer['waktu_akhir_mulai_kerja'])) ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="waktu_awal_istirahat">Jam Awal Istirahat Kerja</label>
                      <input type="time" class="form-control" name="waktu_awal_istirahat" id="waktu_awal_istirahat" value="<?= date('H:i:s', strtotime($jadwal_honorer['waktu_awal_istirahat'])) ?>">
                    </div>
                    <div class="col-6">
                      <label for="waktu_akhir_istirahat">Jam Akhir Istirahat Kerja</label>
                      <input type="time" class="form-control" name="waktu_akhir_istirahat" id="waktu_akhir_istirahat" value="<?= date('H:i:s', strtotime($jadwal_honorer['waktu_akhir_istirahat'])) ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="waktu_awal_pulang_kerja">Jam Awal Pulang Kerja</label>
                      <input type="time" class="form-control" name="waktu_awal_pulang_kerja" id="waktu_awal_pulang_kerja" value="<?= date('H:i:s', strtotime($jadwal_honorer['waktu_awal_pulang_kerja'])) ?>">
                    </div>
                    <div class="col-6">
                      <label for="waktu_akhir_pulang_kerja">Jam Akhir Pulang Kerja</label>
                      <input type="time" class="form-control" name="waktu_akhir_pulang_kerja" id="waktu_akhir_pulang_kerja" value="<?= date('H:i:s', strtotime($jadwal_honorer['waktu_akhir_pulang_kerja'])) ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="potongan_gaji">Potongan Gaji (Jika terlambat)</label>
                  <input type="number" min="0" value="<?= $jadwal_honorer['potongan_gaji'] ?>" class="form-control" id="potongan_gaji" name="potongan_gaji">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">UPDATE PENGATURAN HONORER</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>