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
                            <?= form_open("", ['class' => 'form-horizontal']); ?>
                            <div class="form-group row">
                                <label for="jenis" class="col-sm-4 col-form-label">Jenis Kendaraan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Kendaraan" value="<?= set_value('jenis', $biaya['jenis']); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="biaya" class="col-sm-4 col-form-label">biaya</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="biaya" name="biaya" placeholder="harga" value="<?= set_value('biaya', $biaya['biaya']); ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="<?= base_url('biaya'); ?>" class="btn btn-default">Batal</a>
                        </div>
                        <!-- /.card-footer -->
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>