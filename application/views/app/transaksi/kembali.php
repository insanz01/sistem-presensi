<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Kembalikan Barang</h1>
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
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <table class="table table-print">
                <thead>
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Tanggal Sewa</th>
                </thead>
                <tbody>
                  <?php $nomor = 1 ?>
                  <?php foreach($produk as $data): ?>
                    <tr>
                      <td><?= $nomor++ ?></td>
                      <td><?= $data['nama_produk'] ?></td>
                      <td><?= $data['merk'] ?></td>
                      <td><?= $data['harga'] ?></td>
                      <td><?= $data['jumlah'] ?></td>
                      <td><?= $data['tanggal_sewa'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php if($produk): ?>
                <form action="<?= base_url("transaksi/do_kembali") ?>" method="post">
                  <input type="hidden" name="KTP_penyewa" value="KTP_penyewa">
                  <button type="submit" class="btn btn-primary btn-block mt-2">KEMBALIKAN SEWA</button>
                </form>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="cek_item">KTP Penyewa</label>
                <input type="text" name="KTP_penyewa" id="KTP_penyewa" class="form-control">
              </div>  
              <div class="form-group">
                <button class="btn btn-primary btn-block">CHECK KTP</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
