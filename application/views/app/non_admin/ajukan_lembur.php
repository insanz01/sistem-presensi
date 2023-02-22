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
          <h1 class="m-0 text-dark">Ajukan Presensi</h1>
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
        <div class="col-7 mx-auto">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url("na/do_ajukan_presensi") ?>" method="post">
                <div class="form-group">
                  <label for="tanggal_lembur">Tanggal Lembur</label>
                  <input type="date" class="form-control" name="tanggal_lembur">
                </div>
                <div class="form-group">
                  <label for="durasi">Durasi</label>
                  <input type="number" class="form-control" min="0" name="durasi">
                </div>
                <div class="form-group">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type="time" class="form-control" name="jam_mulai">
                </div>
                <div class="form-group">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type="time" class="form-control" name="jam_selesai">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">AJUKAN LEMBUR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>