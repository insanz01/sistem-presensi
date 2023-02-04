<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Cabang</h1>
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
        <div class="col-12 mb-3">
          <div class="form-group">
            <select name="" id="" class="form-control">
              <option value="">Cabang Satu</option>
              <option value="">Cabang Dua</option>
            </select>
          </div>
          <div class="form-group">
            <a href="#!" class="btn btn-primary float-right">TAMBAH DATA</a>
          </div>
        </div>
        <div class="col-12">
          <table class="table table-print">
            <thead>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Nama Cabang</th>
              <!-- <th>File</th> -->
              <th>Aksi</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Helm</td>
                <td>Yogyakarta</td>
                <td>
                  <a href="#!" class="badge badge-info badge-sm">edit</a>
                  <a href="#!" class="badge badge-danger badge-sm">hapus</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Buff</td>
                <td>Yogyakarta</td>
                <td>
                  <a href="#!" class="badge badge-info badge-sm">edit</a>
                  <a href="#!" class="badge badge-danger badge-sm">hapus</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal -->
<div class="modal fade" id="hapusModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('katalog/delete') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="id-delete">
          <p>
            Apakah anda yakin ingin menghapus data ini ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const hapusData = (target) => {
    const id = target.getAttribute("data-id");

    document.getElementById("id-delete").value = id;
  }
</script>