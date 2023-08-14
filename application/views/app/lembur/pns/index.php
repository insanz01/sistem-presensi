<style>
  th, td {
    font-size: 0.8em;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Lembur Pegawai Negeri Sipil</h1>
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
      <form id="form_lembur" action="<?= base_url("lembur/pns") ?>" method="post">
        <div class="row mb-2">
          <div class="col-4">
            <div class="form-group">
              <select name="filter_bulan" id="filter_bulan" class="form-control" onchange="submitFilter(this)">
                <option value="0" <?= ($filter_bulan == "0") ? "selected": "" ?>>SEMUA</option>
                <option value="1" <?= ($filter_bulan == "1") ? "selected": "" ?>>JANUARI</option>
                <option value="2" <?= ($filter_bulan == "2") ? "selected": "" ?>>FEBRUARI</option>
                <option value="3" <?= ($filter_bulan == "3") ? "selected": "" ?>>MARET</option>
                <option value="4" <?= ($filter_bulan == "4") ? "selected": "" ?>>APRIL</option>
                <option value="5" <?= ($filter_bulan == "5") ? "selected": "" ?>>MEI</option>
                <option value="6" <?= ($filter_bulan == "6") ? "selected": "" ?>>JUNI</option>
                <option value="7" <?= ($filter_bulan == "7") ? "selected": "" ?>>JULI</option>
                <option value="8" <?= ($filter_bulan == "8") ? "selected": "" ?>>AGUSTUS</option>
                <option value="9" <?= ($filter_bulan == "9") ? "selected": "" ?>>SEPTEMBER</option>
                <option value="10" <?= ($filter_bulan == "10") ? "selected": "" ?>>OKTOBER</option>
                <option value="11" <?= ($filter_bulan == "11") ? "selected": "" ?>>NOPEMBER</option>
                <option value="12" <?= ($filter_bulan == "12") ? "selected": "" ?>>DESEMBER</option>
              </select>
            </div>
          </div>
          <div class="col-4"></div>
          <div class="col-4">
            <a href="<?= base_url("print/lembur/pns") ?>" class="btn btn-primary float-right" target="_blank">PRINT LAPORAN</a>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-12 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama Karyawan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Tanggal Lembur</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($lembur as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['NIP'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jam_mulai'] ?></td>
                    <td><?= $data['jam_selesai'] ?></td>
                    <td><?= $data['tanggal_lembur'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                      <?php if($data['file_bukti']): ?>
                        <a href="<?= base_url('uploads/') . $data['file_bukti'] ?>" target="_blank" download>lihat file</a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($data['status'] == 1): ?>
                        diterima
                      <?php elseif($data['status'] == -1): ?>
                        ditolak
                      <?php else: ?>
                        menunggu
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($data['status'] == 0): ?>
                        <a href="<?= base_url("lembur/status/") . $data['id'] . '/setuju/pns' ?>" class="badge badge-sm badge-success" role="button">Setuju</a>
                        <a href="<?= base_url("lembur/status/")  . $data['id'] . '/tolak/pns' ?>" class="badge badge-sm badge-danger" role="button">Tolak</a>
                      <?php endif; ?>
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

<script>
  const submitFilter = (target) => {
    document.getElementById("form_lembur").submit();
  }
</script>