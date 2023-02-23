<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Karyawan</h1>
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
              <form action="<?= base_url("karyawan/do_edit") . $id ?>" method="post">
                <div class="form-group">
                  <label for="NIP">NIP</label>
                  <input type="text" name="NIP" id="NIP" class="form-control" value="<?= $karyawan['NIP'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="nama">Nama Karyawan</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?= $karyawan['nama'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="tipe_karyawan">Tipe Karyawan</label>
                  <select name="tipe_karyawan" id="tipe_karyawan" class="form-control">
                    <option value="">- PILIH -</option>
                    <?php foreach($tipe_karyawan as $data): ?>
                    <option value="<?= $data['id'] ?>" <?= ($data['id'] == $karyawan['tipe_karyawan']) ? 'selected' : '' ?>><?= $data['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= $karyawan['email'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="nomor_hp">Nomor HP</label>
                  <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="<?= $karyawan['nomor_hp'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-control" required cols="30" rows="10"><?= $karyawan["alamat"] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $karyawan['jabatan'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $karyawan['tempat_lahir'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $karyawan['tanggal_lahir'] ?>" required>
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