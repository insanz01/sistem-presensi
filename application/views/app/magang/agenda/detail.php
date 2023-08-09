<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail Agenda Kegiatan</h1>
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
          <a href="<?= base_url("magang/add_penilaian") ?>" class="btn btn-primary float-right mx-2" role="button">
            PENILAIAN
          </a>
          <a href="<?= base_url("print/agenda_kegiatan/") . $id ?>" target="_blank" class="btn btn-info float-right mx-2" role="button">
            <i class="fas fa-fw fa-print"></i> PRINT
          </a>
        </div>
        <div class="col-10 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-hovered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; ?>
                  <?php foreach($agenda as $data): ?>
                  <tr>
                    <td><?= $nomor++ ?></td>
                    <td>
                      <p>
                        <?= $data['kegiatan'] ?>
                      </p>
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