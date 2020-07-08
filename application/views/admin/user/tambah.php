<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title"><?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form class="form-horizontal" action="<?= base_url('user/tambahUser'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama User</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-4 col-form-label">Alamat </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" rows="4"></textarea>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Nomor" class="col-sm-4 col-form-label">Nomor Hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Nomor" name="nomor" placeholder="Nomor Hp">
                                        <?= form_error('nomor', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis" class="col-sm-2 control-label">Jenis User</label>
                                    <div class="col-sm-10">
                                        <select name="level" class="form-control">
                                            <option value="">--- Pilih Jenis User ---</option>
                                            <option value="2">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <?= form_error('level', '<small class="text-danger">', '</small>') ?>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-info">Tambah User</button>
                            <a href="<?= base_url('user'); ?>" class="btn btn-default">Batal</a>
                        </div>
                        <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>