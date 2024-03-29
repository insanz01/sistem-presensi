<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Presensi Magang</h1>
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
      <form id="presensiForm" action="<?= base_url("presensi/magang") ?>" method="post">
        <div class="row mb-2">
          <div class="col-4">
            <div class="form-group">
              <select name="filter_absen" id="filter_absen" class="form-control" onchange="filterAbsen(this)">
                <option value="" <?= ($filter_absen == "") ? "selected" : "" ?>>TAMPIL SEMUA</option>
                <!-- <option value="absen">PEGAWAI ABSEN</option> -->
                <option value="terlambat" <?= ($filter_absen == "terlambat") ? "selected" : "" ?>>PRESENSI TERLAMBAT</option>
                <option value="ontime" <?= ($filter_absen == "ontime") ? "selected" : "" ?>>PRESENSI TEPAT WAKTU</option>
              </select>
            </div>
          </div>
          <div class="col-4">
          </div>
          <div class="col-4">
            <a href="<?= base_url("print/presensi/magang") ?>" class="btn btn-primary float-right" target="_blank">PRINT LAPORAN</a>
          </div>
        </div>
      </form>
      <div class="row">
        <!-- <div class="col-10 mx-auto mb-2">
          <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#filterModal">FILTER LAPORAN</button>
        </div> -->
        <div class="col-12 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped tabel2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Nama Karyawan</th>
                    <th>Tipe Karyawan</th>
                    <th>Terlambat</th>
                    <th>Jam Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($presensi as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= "Pegawai Magang" ?></td>
                    <td>
                      <?= ($data['terlambat']) ? 'Ya' : 'Tidak' ?>
                    </td>
                    <td><?= $data['created_at'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLabel">Filter Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("laporan/bpd") ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal</label>
            <input type="date" class="form-control" name="tanggal_awal">
          </div>
          <div class="form-group">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            <input type="date" class="form-control" name="tanggal_akhir">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

  const filterAbsen = (target) => {
    document.getElementById("presensiForm").submit();
  }
</script>