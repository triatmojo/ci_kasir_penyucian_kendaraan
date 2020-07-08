<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
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
                        <div class="card-header">
                            <h3 class="card-title"><?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= base_url('transaksi/tambah') ?>" method="post">
                            <div class="card-body ">
                                <div class="form-group">
                                    <label for="no_nota">Nomor Nota</label>
                                    <input readonly value="<?= $no_nota ?>" type="text" class="form-control" id="no_nota" name="no_nota" placeholder="No Nota">
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Kendaraan</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <?php foreach ($biaya as $row) : ?>
                                            <option <?= set_select('jenis', $row['biaya']) ?> value="<?= $row['biaya'] ?>"><?= $row['jenis'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="biaya">Biaya</label>
                                    <input readonly value="<?= set_value('biaya') ?>" type="number" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
                                </div>
                                <div class="form-group">
                                    <label for="bayar">Bayar</label>
                                    <input type="number" value="<?= set_value('bayar') ?>" class="form-control" id="bayar" name="bayar" placeholder="Bayar">
                                    <?= form_error('bayar', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="kembali">Kembali</label>
                                    <input readonly type="number" value="<?= set_value('kembali') ?>" class="form-control" id="kembali" name="kembali" placeholder="Kembali">
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input readonly type="number" value="<?= set_value('total') ?>" class="form-control" id="total" name="total" placeholder="Total">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" value="<?= set_value('nama') ?>" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="<?= base_url('transaksi'); ?>" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    transaksi = true;
</script>