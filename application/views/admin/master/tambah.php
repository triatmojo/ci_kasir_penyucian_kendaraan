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
                        <li class="breadcrumb-item active">Starter Page</li>
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
                        <div class="card-header bg-dark">
                            <h3 class="card-title"><?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body ">
                            <form class="form-horizontal" action="<?= base_url('biaya/tambahBiaya') ?>" method="post">
                                <div class="form-group row">
                                    <label for="jenis_kendaraan" class="col-sm-42 col-form-label">Jenis Kendaraan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" placeholder="Jenis Kendaraan">
                                        <?= form_error('jenis_kendaraan', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                                        <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-info">Tambah Biaya</button>
                            <a href="<?= base_url('biaya'); ?>" class="btn btn-default">Batal</a>
                        </div>
                        <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>