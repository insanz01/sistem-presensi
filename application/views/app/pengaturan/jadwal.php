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
                <h3>Pengaturan Jam Pegawai</h3>
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
                  <button type="submit" class="btn btn-primary btn-block">UPDATE PENGATURAN JADWAL</button>
                </div>
              </form>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <form action="<?= base_url("setting/jadwal/gaji") ?>" method="post">
                <h3>Pengaturan Gaji</h3>
                <div class="form-group">
                  <label for="id_golongan">Golongan</label>
                  <select name="id_golongan" id="id_golongan" class="form-control" onchange="setGolongan(this)">
                    <option value="">- PILIH -</option>
                    <?php foreach($golongan as $gol): ?>
                      <option value="<?= $gol['id'] ?>"><?= $gol['nama'] ?> - (<?= $gol['detail'] ?>)</option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nominal">Nominal Gaji</label>
                  <input type="number" id="nominal" name="nominal" class="form-control">
                </div>

                <div class="form-group">
                  <label for="tunjangan">Tunjangan Bulanan</label>
                  <input type="number" id="tunjangan" name="tunjangan" class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">UPDATE PENGATURAN GAJI</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  const getNominalGaji = async (id_golongan) => {
    return await axios.get(`<?= base_url() ?>api/gaji/${id_golongan}`).then(res => res.data);
  }

  const setGolongan = async (target) => {
    const id = target.value;
    const result = await getNominalGaji(id).then(res => res);
    console.log("result", result);

    if(result) {
      console.log("result.data", result.data);
      console.log("result.error", result.error);
      
      document.getElementById("nominal").value = result.data.gaji;
      document.getElementById("tunjangan").value = result.data.tunjangan;
    }
  }
</script>