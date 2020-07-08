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
                        <li class="breadcrumb-item active"><?= $title; ?></li>
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex">
                                    <h3 class="card-title align-self-center">Tabel <?= $title; ?></h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= base_url('biaya/tambahBiaya') ?>" class="btn btn-primary mb-3">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Kendaraan</th>
                                        <th scope="col">Biaya</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($biaya as $b) :  ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $b['jenis']; ?></td>
                                            <td><?= $b['biaya']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="<?= base_url('biaya/ubahBiaya/') . $b['id_biaya']; ?>" class="btn btn-secondary  btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a onclick="return confirm('Yakin?')" href="<?= base_url('biaya/hapusBiaya/') . $b['id_biaya']; ?>" class="btn btn-secondary btn-default btn-sm"><i class="fas fa-trash-alt"></i></a>
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