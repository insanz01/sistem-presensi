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
          <h1 class="m-0 text-dark">Presensi</h1>
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
              <form action="<?= base_url("na/do_presensi") ?>" method="post">
                <h3>Presensi</h3>
                <div class="form-group">
                  <label for="kategori_presensi">Kategori Presensi</label>
                  <select name="kategori_presensi" id="kategori_presensi" class="form-control">
                    <option value="">- PILIH -</option>
                    <?php foreach($kategori_presensi as $kategori): ?>
                      <?php if($kategori['id'] == 5 || $kategori['id'] == 6): ?>
                        <?php if($this->session->userdata("SESS_PRESENSI_MAGANGID")): ?>
                        <?php else: ?>
                          <option value="<?= $kategori['id'] ?>">
                            <?= $kategori['nama'] ?>
                          </option>
                        <?php endif; ?>
                      <?php else: ?>
                        <option value="<?= $kategori['id'] ?>">
                          <?= $kategori['nama'] ?>
                        </option>
                      <?php endif ?>
                    <?php endforeach; ?>
                  </select>
                </div>

                <!-- <div class="form-group">
                  <label for="presensi">Masukan NIP Anda</label>
                  <input type="text" class="form-control" name="NIP">
                </div> -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">PRESENSI</button>
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
                  <th>Jam Presensi</th>
                  <th>Tanggal Presensi</th>
                  <th>Tipe Presensi</th>
                </thead>
                <tbody>
                  <?php $nomor = 1 ?>
                  <?php foreach($presensi as $p): ?>
                    <tr>
                      <td><?= $nomor++ ?></td>
                      <td><?= date('H:i:s', strtotime($p['created_at'])) ?></td>
                      <td><?= date("d M Y", strtotime($p['created_at'])) ?></td>
                      <td>
                        <?= $p['tipe_presensi'] ?>
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