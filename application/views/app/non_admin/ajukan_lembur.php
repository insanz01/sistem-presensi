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
          <h1 class="m-0 text-dark">Ajukan Lembur</h1>
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
        <div class="col-7 mx-auto">
          <div class="card">
            <div class="card-body">
              <form action="<?= base_url("na/do_ajukan_lembur") ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="tanggal_lembur">Tanggal Lembur</label>
                  <input type="date" class="form-control" name="tanggal_lembur">
                </div>
                <div class="form-group">
                  <label for="durasi">Durasi (jam)</label>
                  <input type="number" class="form-control" min="0" name="durasi">
                </div>
                <div class="form-group">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type="time" class="form-control" name="jam_mulai">
                </div>
                <div class="form-group">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type="time" class="form-control" name="jam_selesai">
                </div>
                <div class="form-group">
                  <label for="keterangan">Alasan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="file_bukti">Bukti</label>
                  <input type="file" class="form-control" name="file_bukti" id="file_bukti">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">AJUKAN LEMBUR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>