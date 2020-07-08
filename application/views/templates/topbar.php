<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <ul class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-icon" href="#" data-toggle="dropdown">
                <i class="fas fa-user fa-fw"></i>
                <?= $this->session->userdata('username'); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </ul>
    </ul>
</nav>