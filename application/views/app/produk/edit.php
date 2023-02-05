<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Produk</h1>
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
              <form action="<?= base_url("produk/do_edit/") . $produk['id'] ?>" method="post" enctype="multipart/form-data">
  
                <div class="form-group">
                  <label for="nama">Nama Produk</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk['nama'] ?>">
                </div>

                <div class="form-group">
                  <label for="harga">Harga Produk</label>
                  <input type="number" min="0" class="form-control" id="harga" name="harga" value="<?= $produk['harga'] ?>">
                </div>

                <div class="form-group">
                  <label for="detail">Detail</label>
                  <textarea name="detail" id="detail" class="form-control" rows="10"><?= $produk['detail'] ?></textarea>
                </div>
 
                <div class="form-group">
                  <label for="foto">Foto Produk</label>
                  <br>
                  <img src="<?= base_url("uploads/image/") . $produk['foto'] ?>" alt="Belum atur gambar">
                  <input type="file" class="form-control" id="foto" name="foto">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-lg">SIMPAN PERUBAHAN DATA</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>