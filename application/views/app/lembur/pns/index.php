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
      <form id="lemburForm" action="<?= base_url("lembur/pns") ?>" method="post">
        <div class="row mb-2">
          <div class="col-4"></div>
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