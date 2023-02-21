<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Karyawan</h1>
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
                  <label for="NIK">NIK</label>
                  <input type="text" name="NIK" id="NIK" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="nama">Nama Karyawan</label>
                  <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="tipe_karyawan">Tipe Karyawan</label>
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