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
          <h1 class="m-0 text-dark">Dashboard</h1>
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
              <form action="<?= base_url("na/do_presensi") ?>" method="post">
                <h3>Presensi</h3>
                <div class="form-group">
                  <label for="presensi">Masukan NIP Anda</label>
                  <input type="text" class="form-control" name="NIP">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">PRESENSI</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>