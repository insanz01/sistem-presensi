<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tunjangan</h1>
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
          <a href="<?= base_url("tunjangan/add") ?>" class="btn btn-primary float-right" role="button">TAMBAH TUNJANGAN</a>
        </div>
        <div class="col-10 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Tunjangan</th>
                    <th>Nilai (%)</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($tunjangan as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nilai'] ?></td>
                    <td>
                      <!-- <a href="<?= base_url("karyawan/edit/") . $data['id'] ?>" class="badge badge-info badge-sm badge-pill">edit</a> -->
                      <!-- <a href="<?= base_url("karyawan/delete/") . $data['id'] ?>" class="badge badge-danger badge-sm badge-pill">hapus</a> -->
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