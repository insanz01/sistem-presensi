<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Penilaian</h1>
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
              <form action="<?= base_url("magang/do_edit_penilaian/") . $id ?>" method="post">
                <input type="hidden" name="id_magang" value="<?= $penilaian['id_magang'] ?>">
                <div class="form-group">
                  <label for="">Nama Karyawan Magang</label>
                  <input type="text" class="form-control" value="<?= $penilaian['nama'] ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="">Disiplin Kerja</label>
                  <input type="number" class="form-control" id="disiplin_kerja" name="disiplin_kerja" value="<?= $penilaian['disiplin_kerja'] ?>">
                </div>

                <div class="form-group">
                  <label for="">Komunikasi</label>
                  <input type="number" class="form-control" id="komunikasi" name="komunikasi" value="<?= $penilaian['komunikasi'] ?>">
                </div>

                <div class="form-group">
                  <label for="">Motivasi</label>
                  <input type="number" class="form-control" id="motivasi" name="motivasi" value="<?= $penilaian['motivasi'] ?>">
                </div>

                <div class="form-group">
                  <label for="">Inisiatif</label>
                  <input type="number" class="form-control" id="inisiatif" name="inisiatif" value="<?= $penilaian['inisiatif'] ?>">
                </div>

                <div class="form-group">
                  <label for="">Kerjasama</label>
                  <input type="number" class="form-control" id="kerjasama" name="kerjasama" value="<?= $penilaian['kerjasama'] ?>">
                </div>

                <div class="form-group">
                  <label for="">Etika</label>
                  <input type="number" class="form-control" id="etika" name="etika" value="<?= $penilaian['etika'] ?>">
                </div>

                <div class="form-group">
                  <label for="">Tanggung Jawab</label>
                  <input type="number" class="form-control" id="tanggung_jawab" name="tanggung_jawab" value="<?= $penilaian['tanggung_jawab'] ?>">
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>