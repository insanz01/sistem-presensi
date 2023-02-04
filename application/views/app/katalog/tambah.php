<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Katalog</h1>
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
              <form action="<?= base_url("katalog/do_add") ?>" method="post" enctype="multipart/form-data">
  
                <div class="form-group">
                  <label for="id_produk">Produk</label>
                  <select name="id_produk" id="id_produk" class="form-control">
                    <?php foreach($produk as $data): ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="id_cabang">Cabang</label>
                  <select name="id_cabang" id="id_cabang" class="form-control">
                    <?php foreach($cabang as $data): ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
 
                <!-- <div class="form-group">
                  <label for="file_katalog">File katalog</label>
                  <input type="file" class="form-control" id="file_katalog" name="file_katalog">
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