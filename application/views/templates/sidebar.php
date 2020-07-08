 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-dark elevation-1">
     <!-- Brand Logo -->
     <a href="" class="brand-link text-center navbar-dark text-white">
         <span class="brand-text font-weight-light">Auto Body Beauty</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column  nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="<?= base_url('admin'); ?>" class="nav-link <?= active_menu('admin') ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p> Dashboard</p>
                     </a>
                 </li>
                 <?php if (is_role(1, false)) : ?>
                     <li class="nav-item has-treeview <?= menu_open(['biaya', 'user']); ?>">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-database"></i>
                             <p>
                                 Data Master
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('biaya'); ?>" class="nav-link <?= active_menu('biaya'); ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Data Biaya</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= base_url('user'); ?>" class="nav-link <?= active_menu('user'); ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Data User</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 <?php endif; ?>
                 <li class="nav-item">
                     <a href="<?= base_url('transaksi'); ?>" class="nav-link <?= active_menu('transaksi'); ?>">
                         <i class="nav-icon fas fa-cash-register"></i>
                         <p>Transaksi</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan'); ?>" class="nav-link <?= active_menu('laporan'); ?>">
                         <i class="nav-icon fas fa-print"></i>
                         <p>Laporan</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-sign-out-alt"></i>
                         <p>Logout</p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>