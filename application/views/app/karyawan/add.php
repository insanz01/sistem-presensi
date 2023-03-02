<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Pegawai</h1>
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
        <div class="col-10 mx-auto">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url("karyawan/do_add") ?>" method="post">
                <div class="form-group">
                  <label for="NIP">NIP</label>
                  <input type="text" name="NIP" id="NIP" class="form-control">
                </div>

                <!-- <div class="form-group">
                  <label for="NIP_PNS">NIP PNS (Optional)</label>
                  <input type="text" name="NIP_PNS" id="NIP_PNS" class="form-control" placeholder="isi jika seorang PNS">
                </div> -->

                <div class="form-group">
                  <label for="nama">Nama Pegawai</label>
                  <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="tipe_karyawan">Tipe Pegawai</label>
                  <select name="tipe_karyawan" id="tipe_karyawan" class="form-control">
                    <option value="">- PILIH -</option>
                    <?php foreach($tipe_karyawan as $data): ?>
                    <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="nomor_hp">Nomor HP</label>
                  <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-control" required cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <!-- <input type="text" name="jabatan" id="jabatan" class="form-control" required> -->
                  <select name="jabatan" id="jabatan" class="form-control">
                    <option value="pengelola program dan kegiatan">Pengelola Program dan Kegiatan</option>
                    <option value="sekertaris">Sekretaris</option>
                    <option value="pengelola program anggaran dan pelaporan">Pengelola Program Anggaran dan Pelaporan</option>
                    <option value="analisis sumber daya manusia aparatur">Analisis Sumber Daya Manusia Aparatur</option>
                    <option value="pengelola kepegawaian">Pengelola Kepegawaian</option>
                    <option value="instruktur pelaksana">Infrastuktur Pelaksana</option>
                    <option value="staff umum">Staff Umum</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="golongan">Golongan</label>
                  <select name="id_golongan" id="golongan" class="form-control">
                    <?php foreach($golongan as $gol): ?>
                      <option value="<?= $gol['id'] ?>"><?= $gol['nama'] ?> (<?= $gol['detail'] ?>)</option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>