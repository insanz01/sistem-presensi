<style>
  th, td {
    font-size: 0.8em !important;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Presensi Pegawai</h1>
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
      <form id="presensiForm" action="<?= base_url("presensi") ?>" method="post">
        <div class="row mb-2">
          <div class="col-4">
            <div class="form-group">
              <select name="filter_karyawan" id="filter_karyawan" class="form-control" onchange="filterKaryawan(this)">
                <option value="" <?= ($filter_karyawan == "") ? "selected" : "" ?>>TAMPIL SEMUA</option>
                <option value="pns" <?= ($filter_karyawan == "pns") ? "selected" : "" ?>>PEGAWAI NEGERI SIPIL</option>
                <option value="honorer" <?= ($filter_karyawan == "honorer") ? "selected" : "" ?>>PEGAWAI HONORER</option>
              </select>
            </div>
          </div>
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
            <a href="<?= base_url("print/presensi") ?>" class="btn btn-primary float-right" target="_blank">PRINT LAPORAN</a>
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
                    <th>NIP</th>
                    <th>Nama Karyawan</th>
                    <th>Tipe Karyawan</th>
                    <th>Terlambat</th>
                    <th>Jam Masuk</th>
                    <th>Logbook</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($presensi as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['NIP'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td>
                      <?php if($data['tipe_karyawan'] == 1): ?>
                        Pegawai Negeri Sipil
                      <?php else: ?>
                        Honorer
                      <?php endif; ?>
                    </td>
                    <td>
                      <?= ($data['terlambat']) ? 'Ya' : 'Tidak' ?>
                    </td>
                    <td><?= $data['created_at'] ?></td>
                    <td>
                      <?= $data['catatan'] ?>
                      <!-- <a href="<?= base_url("presensi/logbook/") . $data['id'] ?>" class="badge badge-sm badge-primary" role="button">detail</a> -->
                    </td>
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
  const filterKaryawan = (target) => {
    document.getElementById("presensiForm").submit();
  }

  const filterAbsen = (target) => {
    document.getElementById("presensiForm").submit();
  }
</script>