<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header px-2">
                            <div class="row p-0 m-0">
                                <div class="col d-flex">
                                    <h3 class="card-title align-self-center">Tabel <?= $title; ?></h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No. Nota</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Total Bayar</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($transaksi as $t) :  ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $t['no_nota']; ?></td>
                                            <td><?= $t['nama']; ?></td>
                                            <td><?= $t['jenis']; ?></td>
                                            <td><?= $t['total']; ?></td>
                                            <td><?= $t['tanggal']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a onclick="return confirm('Yakin?')" href="<?= base_url('transaksi/hapusTransaksi/') . $t['id_transaksi']; ?>" class="btn btn-secondary btn-default btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>