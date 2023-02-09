<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pinjam Barang</h1>
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
              <?php if($produk): ?>
                <h3><?= $produk['nama'] ?></h3>
                <hr>
                <p><?= $produk['detail'] ?></p>
                <p>Ketersediaan : <span class="font-weight-bold"><?= $produk['jumlah'] ?></span></p>
                <?php if($produk['jumlah'] > 0): ?>
                  <a href="#!" class="btn btn-success" data-toggle="modal" data-target="#pinjamModal" data-id="<?= $produk['id'] ?>" onclick="pilihProduk(this)">Booking Produk</a>
                <?php else: ?>
                  <a href="#!" class="btn btn-danger disabled">TIDAK TERSEDIA</a>
                <?php endif; ?>
              <?php else: ?>
                <h3>Barang belum dipilih</h3>
                <p>Silihkan masukan kode barang pada panel sebelah kanan</p>
              <?php endif; ?>
              <!-- <a href="#!" class="btn btn-primary">Booking Produk</a> -->
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url("transaksi/pinjam/check_produk") ?>" method="post">
                <div class="form-group">
                  <label for="kode_produk">Kode Produk</label>
                  <input type="text" name="kode_produk" id="kode_produk" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">CHECK KETERSEDIAAN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pinjamModalLabel">Sewa Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("transaksi/do_keluar") ?>" method="post">
        <div class="modal-body">
          <input type="hidden" id="id_produk-sewa" name="id_produk">
          <div class="form-group">
            <label for="KTP_penyewa">KTP Penyewa</label>
            <input type="text" class="form-control" name="KTP_penyewa" id="KTP_penyewa">
          </div>
          <div class="form-group">
            <label for="nama_penyewa">Nama Penyewa</label>
            <input type="text" class="form-control" name="nama_penyewa" id="nama_penyewa">
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah Item</label>
            <input type="number" min="1" class="form-control" name="jumlah" id="jumlah" value="1" max="<?= $produk['jumlah'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Sewa Item</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const pilihProduk = (target) => {
    const id = target.getAttribute('data-id');

    document.getElementById("id_produk-sewa").value = id;
  }
</script>