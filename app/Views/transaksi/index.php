<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6 class="m-0">Tabel Transaksi</h6>
                    <div class="d-flex justify-content-end mb-3">
                        <?php if (session()->has('role') && (session('role') === 'Pemilik Gudang')) :  ?>
                            <a href="/transaksi/create" class="btn btn-primary me-2">Transaksi</a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Gudang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemilik Gudang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Transaksi</th>
                                    <?php if (session()->has('role') && (session('role') === 'Pemilik Gudang')) :  ?>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($transaksi as $t) : {
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
                                                    <h6 class="mb-0 text-sm"><?= $t['nama_gudang']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $t['pemilik_gudang']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $t['nama_barang']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $t['jumlah_stok']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $t['status']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $t['tgl']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <?php if (session()->has('role') && (session('role') === 'Pemilik Gudang')) :  ?>
                                            <td class="align-middle">
                                                <a href="/transaksi/edit/<?= $t['id_transaksi']; ?>" class="btn btn-warning btn-sm text-secondary font-weight-bold text-xs">
                                                    Edit
                                                </a>
                                                <br>
                                                <form action="/transaksi/<?= $t['id_transaksi']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                                </form>
                                            </td>
                                        <?php endif ?>
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