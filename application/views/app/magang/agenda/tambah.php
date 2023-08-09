<style>
  #map {
    height: 500px;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Agenda Kegiatan</h1>
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
        <?php if($this->session->flashdata('pesan')): ?>
          <div class="col-7 mx-auto text-center mb-2">
            <?= $this->session->flashdata('pesan') ?>
          </div>
        <?php endif; ?>
        <div class="col-9 mx-auto">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url("magang/do_add_agenda") ?>" method="post">
                <h3>Agenda Kegiatan</h3>
                <div class="form-group">
                  <label for="kegiatan">Catatan Agenda Kegiatan</label>
                  <textarea name="kegiatan" id="kegiatan" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <!-- <div class="form-group">
                  <label for="presensi">Masukan NIP Anda</label>
                  <input type="text" class="form-control" name="NIP">
                </div> -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">TAMBAH AGENDA</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-9 mx-auto">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered tabel2">
                <thead>
                  <th>#</th>
                  <th>Catatan</th>
                  <th>Tanggal Agenda</th>
                </thead>
                <tbody>
                  <?php $nomor = 1 ?>
                  <?php foreach($agenda as $p): ?>
                    <tr>
                      <td><?= $nomor++ ?></td>
                      <td>
                        <?= $p['kegiatan'] ?>
                      </td>
                      <td><?= date("d M Y", strtotime($p['created_at'])) ?></td>
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