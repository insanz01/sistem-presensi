<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Cabang</h1>
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
        <div class="col-7">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url("cabang/do_add") ?>" method="post" enctype="multipart/form-data">
  
                <div class="form-group">
                  <label for="nama">Nama Cabang</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>

                <div class="form-group">
                  <label for="lokasi">Lokasi Cabang</label>
                  <input type="text" class="form-control" id="lokasi" name="lokasi">
                </div>
 
                <!-- <div class="form-group">
                  <label for="file_cabang">File Cabang</label>
                  <input type="file" class="form-control" id="file_cabang" name="file_cabang">
                </div> -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-lg">SIMPAN DATA</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>