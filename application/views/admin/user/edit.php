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
                        <div class="card-header bg-dark ">
                            <h3 class="card-title"><?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <?= form_open("", ['class' => 'form-horizontal']); ?>
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username', $user['username']); ?>">
                                    <?= form_error('username') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama User</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" value="<?= set_value('username', $user['nama']); ?>">
                                    <?= form_error('nama') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis" class="col-sm-2 control-label">Jenis User</label>
                                <div class="col-sm-10">
                                    <select name="level" class="form-control">
                                        <option value="1" <?= $user['level'] == 1 ? "selected" : ""; ?>>Admin</option>
                                        <option value="2" <?= $user['level'] != 1 ? "selected" : ""; ?>>User</option>
                                    </select>
                                </div>
                                <?= form_error('level') ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Edit User</button>
                            <a href="<?= base_url('user'); ?>" class="btn btn-default">Batal</a>
                        </div>
                        <!-- /.card-footer -->
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>