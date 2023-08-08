<style>
  .bg-custom-side {
    background-color: #594545;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-custom-side">
  <!-- Brand Logo -->
  <a href="<?= base_url('profile') ?>" class="brand-link">
    <img src="<?= base_url() ?>assets/bahan/sipetruk_Transparent.png" alt="Panel Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Panel Console</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar bg-custom-side">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/image/profile/user.png" class="objectPicture" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url() ?>" class="d-block"><?= 'Administrator' ?> </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- tambah class menu-open untuk secara otomatis membuka -->
        <li class="nav-item">
          <a href="<?= base_url() ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              DASHBOARD
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>

        <?php if($this->session->userdata("SESS_PRESENSI_ROLEID") == 1): ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                MASTER DATA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('karyawan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tunjangan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Tunjangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('potongan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Potongan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                LAPORAN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('gaji') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Gaji Pegawai</p>
                </a>
              </li>  

              <li class="nav-item">
                <a href="<?= base_url('presensi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Presensi Pegawai</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?= base_url('presensi/magang') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Presensi Magang</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                LEMBUR
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('lembur/pns') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Lembur PNS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('lembur/honorer') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Lembur Honorer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('setting/jadwal') ?>" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                PENGATURAN
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                MAGANG
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- <a href="<?= base_url('magang/agenda') ?>" class="nav-link"> -->
                <a href="#!" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Agenda Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <!-- <a href="<?= base_url('magang/penilaian') ?>" class="nav-link"> -->
                <a href="#!" class="nav-link">
                  <i class="far fa-circle nav-icon ml-3"></i>
                  <p>Penilaian</p>
                </a>
              </li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="<?= base_url("na/presensi") ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                PRESENSI
              </p>
            </a>
          </li>
          <?php if($this->session->userdata("SESS_PRESENSI_ROLEID") == 4): ?>
            <li class="nav-item">
              <a href="<?= base_url("na/logbook") ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  AGENDA KEGIATAN
                </p>
              </a>
            </li>
          <?php endif; ?>
          <?php if($this->session->userdata("SESS_PRESENSI_ROLEID") != 4 AND $this->session->userdata("SESS_PRESENSI_ROLEID") != 1): ?>
          <li class="nav-item">
            <a href="<?= base_url("na/ajukan_lembur") ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                AJUKAN LEMBUR
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("na/logbook") ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                LOG BOOK
              </p>
            </a>
          </li>
          <?php endif; ?>
        <?php endif; ?>

        <!-- <li class="nav-item">
          <a href="<?= base_url('admin/laporan') ?>" target="_blank" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Print Laporan
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li> -->

        <!-- <li class="nav-item">
            <a href="<?= base_url('panel/pengaturan') ?>" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li> -->

        <li class="nav-item my-4">
          <a href="<?= base_url('auth/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Keluar
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>