<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-users me-1"></i>
        Detail Laporan Gudang <?= $laporan['pemilik_gudang']; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <dl class="row">
                    <dt class="col-sm-3">Nama Gudang</dt>
                    <dd class="col-sm-9"><?= $laporan['nama_gudang']; ?></dd>
                    <dt class="col-sm-3">Nama Pemilik</dt>
                    <dd class="col-sm-9"><?= $laporan['pemilik_gudang']; ?></dd>
                    <dt class="col-sm-3">Alamat Gudang</dt>
                    <dd class="col-sm-9"><?= $laporan['alamat_gudang']; ?></dd>
                    <dt class="col-sm-3">Luas Gudang</dt>
                    <dd class="col-sm-9"><?= $laporan['luas_gudang']; ?></dd>
                    <dt class="col-sm-3">No Gudang</dt>
                    <dd class="col-sm-9"><?= $laporan['no_gudang']; ?></dd>
                    <dt class="col-sm-3">Tanggal Terdaftar</dt>
                    <dd class="col-sm-9"><?= $laporan['tgl_terdaftar']; ?></dd>
                    <dt class="col-sm-3">Jumlah</dt>
                    <dd class="col-sm-9"><?= $laporan['jumlah']; ?></dd>
                    <dt class="col-sm-3">Jenis Barang</dt>
                    <dd class="col-sm-9"><?= $laporan['jenis_barang']; ?></dd>
                </dl>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end mb-3">
                    <a href="/laporan/cetak/<?= $laporan['id_gudang']; ?>" class="btn btn-success btn-lg">Cetak Laporan</a>
                </div>
            </div>
        </div>

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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>