<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Tunjangan</h1>
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
              <form action="<?= base_url("tunjangan/do_edit/") . $id ?>" method="post">
                <div class="form-group">
                  <label for="id_karyawan">Nama Karyawan</label>
                  <select name="id_karyawan" id="id_karyawan" class="form-control">
                    <?php foreach($karyawan as $k): ?>
                      <option value="<?= $k['id'] ?>" <?= $k['id'] == $tunjangan['id_karyawan'] ? 'selected': '' ?>><?= $k['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nominal">Nominal Tunjangan</label>
                  <input type="number" name="nominal" id="nominal" class="form-control" value="<?= $tunjangan['nominal'] ?>">
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