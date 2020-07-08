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
                        <div class="card-header">
                            <div class="row p-0">
                                <div class="col d-flex">
                                    <h3 class="card-title align-self-center">Table <?= $title; ?></h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= base_url('user/tambahUser') ?>" class="btn btn-primary mb-3">Tambah Data User</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Aktif</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($user as $u) :  ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $u['username']; ?></td>
                                            <td><?= $u['nama']; ?></td>
                                            <td><?= $u['level'] == 1 ? "admin" : "user" ?></td>
                                            <td>
                                                <div class="badge badge-<?= $u['active'] == 1 ? 'success' : 'danger'; ?>"><?= $u['active'] == 1 ? 'Aktif' : 'Nonaktif'; ?></div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="<?= base_url('user/toggle/') . $u['id_user']; ?>" data-toggle="tooltip" data-placement="top" title="<?= !$u['active'] ? "Aktif" : "Nonaktif"; ?>kan User" class="btn btn-default btn-sm">
                                                        <i class="fas fa-power-off"></i>
                                                    </a>
                                                    <a href="<?= base_url('user/ubahUser/') . $u['id_user']; ?>" class="btn btn-secondary  btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a onclick="return confirm('Yakin?')" href="<?= base_url('user/hapusUser/') . $u['id_user']; ?>" class="btn btn-secondary btn-default btn-sm"><i class="fas fa-trash-alt"></i></a>
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