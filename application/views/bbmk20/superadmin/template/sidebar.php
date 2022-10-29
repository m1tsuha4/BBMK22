 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="<?php echo base_url(); ?>/assets2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Dashboard Superadmin BBMK </span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?php echo base_url(); ?>/assets2/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= $this->session->userdata("superadmin") ?></a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                 </li>
                 <li class="nav-header">Menu</li>
                 <li class="nav-item">
                     <a href="<?= base_url(); ?>superadmin20/list" class="nav-link">
                         <i class="fa fa-graduation-cap"></i>
                         <p class="text">Peserta</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url(); ?>superadmin20/statistik" class="nav-link">
                         <i class="fa fa-graduation-cap"></i>
                         <p class="text">Statistik BBMK 2021</p>
                     </a>
                 </li>

                 <?php
                    if (
                        @$this->session->userdata("superadmin") and @$this->session->userdata("superadmin") == "fadhil"
                    ) {
                    ?>
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>superadmin20/peserta" class="nav-link">
                             <i class="fa fa-user"></i>
                             <p>CRUD Peserta</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>superadmin20/lihatukm" class="nav-link">
                             <i class="fa fa-book"></i>
                             <p>UKM</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>superadmin20/inputUKM" class="nav-link">
                             <i class="fa fa-university"></i>
                             <p>Input UKM</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>superadmin20/lihatUKM" class="nav-link">
                             <i class="fa fa-university"></i>
                             <p>Lihat UKM</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>superadmin20/lihatdokumentasi" class="nav-link">
                             <i class="fa fa-lock"></i>
                             <p>Dokumentasi</p>
                         </a>
                     </li>

                 <?php } ?>
                 <li class="nav-item">
                     <a href="<?= base_url(); ?>superadmin20/setting" class="nav-link">
                         <i class="fa fa-lock"></i>
                         <p>Setting</p>
                     </a>
                 </li>
                 <li class="nav-item">

                     <a class="nav-link text-danger" href="<?= base_url(); ?>superadmin20/logout">
                         <i class="fas fa-power-off"></i> Logout
                     </a>


                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>