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
      <div class="row">
        <div class="col-10 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama Karyawan</th>
                    <th>Durasi Lembur (Jam)</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Tanggal Lembur</th>
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
                    <td><?= $data['durasi'] ?></td>
                    <td><?= $data['jam_mulai'] ?></td>
                    <td><?= $data['jam_selesai'] ?></td>
                    <td><?= $data['tanggal_lembur'] ?></td>
                    <td>
                      <a href="<?= base_url("lembur/status/") . $data['id'] . '/setuju' ?>" class="badge badge-sm badge-success" role="button">Setuju</a>
                      <a href="<?= base_url("lembur/status/pns/")  . $data['id'] . '/tolak' ?>" class="badge badge-sm badge-danger" role="button">Tolak</a>
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