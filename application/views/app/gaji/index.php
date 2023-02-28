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
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <select name="filter_bulan" id="filter_bulan" class="form-control">
                  <option value="1">JANUARI</option>
                  <option value="2">FEBRUARI</option>
                  <option value="3">MARET</option>
                  <option value="4">APRIL</option>
                  <option value="5">MEI</option>
                  <option value="6">JUNI</option>
                  <option value="7">JULI</option>
                  <option value="8">AGUSTUS</option>
                  <option value="9">SEPTEMBER</option>
                  <option value="10">OKTOBER</option>
                  <option value="11">NOPEMBER</option>
                  <option value="12">DESEMBER</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <select name="filter_golongan" id="filter_golongan" class="form-control">
                  <option value="">SEMUA</option>
                  <?php foreach($golongan as $gol): ?>
                    <option value="<?= $gol['id'] ?>"><?= $gol['nama'] ?> (<?= $gol['detail'] ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-4"></div>
          </div>
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
                    <td><?= $data['gaji'] ?></td>
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