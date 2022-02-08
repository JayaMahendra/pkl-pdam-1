<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php if ($userdata->photo == NULL) { ?>
          <img src="<?php echo base_url('assets/uploads/images/foto_profil/usr.png'); ?>" class="img-circle">
        <?php } else { ?>
          <img src="<?php echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); ?>" class="img-circle">
        <?php } ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('name') ?></p>
        <!-- Status -->
        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
      </div>
    </div>

    <!-- search form (Optional) -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php if ($userdata->role_id == 2) { ?>
        <li><a href="<?= base_url('/member/pengajuan') ?>"><i class="fa fa-users"></i> <span>Pengajuan</span></a></li>
      <?php } ?>
      <?php if ($userdata->role_id == 1) { ?>
      <li class="treeview" style="height: auto;">
        <a href="#">
          <i class="fa fa-share"></i> <span>Pengajuan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
          <li class="treeview" style="height: auto;">
            
              <li><a href="<?= base_url('/admin/validasi') ?>"><i class="fa fa-users"></i> <span>Pengajuan Baru</span></a></li>
              <li><a href="<?= base_url('/admin/validasi/index_setuju') ?>"><i class="fa fa-users"></i> <span>Disetujui</span></a></li>
              <li><a href="<?= base_url('/admin/validasi/index_riwayat') ?>"><i class="fa fa-users"></i> <span>Riwayat</span></a></li>
            
          </li>
        </ul>
      </li>
      <?php } ?>
            <!-- <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li> -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>