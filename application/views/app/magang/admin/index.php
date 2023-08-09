<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Magang</h1>
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
        <div class="col-10 mx-auto mb-2">
          <a href="<?= base_url("magang/add") ?>" class="btn btn-primary float-right" role="button">TAMBAH MAGANG</a>
          <!-- <a href="<?= base_url("print/magang") ?>" target="_blank" class="btn btn-info float-right mx-2" role="button">
            <i class="fas fa-fw fa-print"></i> PRINT
          </a> -->
          </div>
        <div class="col-10 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($magang as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['nomor_hp'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                      <a href="<?= base_url("magang/edit/") . $data['id'] ?>" class="badge badge-info badge-sm badge-pill">edit</a>
                      <a href="<?= base_url("magang/delete/") . $data['id'] ?>" class="badge badge-danger badge-sm badge-pill">hapus</a>
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