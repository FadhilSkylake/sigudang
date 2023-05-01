<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6 class="m-0">User's Tabel</h6>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="/user/create" class="btn btn-primary me-2">Tambah User</a>
                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">

                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder ps-2">#</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder ps-2">Email</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder ps-2">Username</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder ps-2">Roles</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder ps-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user as $u) : {
                                    } ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $u['email']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $u['username']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $u['role']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="/user/edit/<?= $u['id']; ?>" class="btn btn-warning font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                                                EDIT
                                            </a>
                                            <form action="/user/<?= $u['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                            </form>
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
<?= $this->endSection(); ?>