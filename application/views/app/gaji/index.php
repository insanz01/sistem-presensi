<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Gaji Pegawai</h1>
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
        <!-- <div class="col-10 mx-auto mb-2">
          <a href="<?= base_url("gaji/add") ?>" class="btn btn-primary float-right" role="button">TAMBAH GAJI</a>
        </div> -->
        <div class="col-12">
          <form id="form_gaji" action="<?= base_url("gaji") ?>" method="post">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <select name="filter_bulan" id="filter_bulan" class="form-control" onchange="submitFilter(this)">
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
              <div class="col-4">
                <div class="form-group">
                  <select name="filter_golongan" id="filter_golongan" class="form-control" onchange="submitFilter(this)">
                    <option value="">SEMUA</option>
                    <?php foreach($golongan as $gol): ?>
                      <option value="<?= $gol['id'] ?>" <?= ($gol['id'] == $filter_golongan) ? "selected": "" ?>><?= $gol['nama'] ?> (<?= $gol['detail'] ?>)</option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <a href="<?= base_url("print/gaji") ?>" class="btn btn-primary float-right" role="button" target="_blank">PRINT LAPORAN</a>
              </div>
            </div>
          </form>
        </div>
        <div class="col-12 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped tabel2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Pegawai</th>
                    <th>Tipe</th>
                    <th>Email</th>
                    <th>Golongan</th>
                    <th>Jumlah Keterlambatan</th>
                    <th>Tunjangan</th>
                    <th>Gaji Bulan ini</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($gaji as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tipe'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['golongan'] ?></td>
                    <td><?= $data['jumlah_terlambat'] ?></td>
                    <td><?= number_format($data['tunjangan'], 0, ',', '.') ?></td>
                    <td><?= number_format($data['gaji_bulan_ini'], 0, ',', '.') ?></td>
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
    document.getElementById("form_gaji").submit();
  }
</script>