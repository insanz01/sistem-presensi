<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Magang</h1>
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
              <form action="<?= base_url("magang/do_edit/") . $id ?>" method="post">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?= $magang['nama'] ?>">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="<?= $magang['email'] ?>">
                </div>

                <div class="form-group">
                  <label for="nomor_hp">Nomor HP</label>
                  <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="<?= $magang['nomor_hp'] ?>">
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"><?= $magang['alamat'] ?></textarea>
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