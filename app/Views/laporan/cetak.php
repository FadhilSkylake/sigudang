<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>

<body>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Detail Laporan Gudang <?= $laporan['nama_gudang']; ?>
        </div>
        <br>
        <div class="card-body">
            <table border="1" style="border-collapse: collapse;" width="100%" id="table">
                <tr>
                    <td width="20%">Nama Pemilik</td>
                    <td width="1%">:</td>
                    <td><?= $laporan['pemilik_gudang']; ?></td>
                </tr>
                <tr>
                    <td>Nama Gudang</td>
                    <td>:</td>
                    <td><?= $laporan['nama_gudang']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Gudang</td>
                    <td>:</td>
                    <td><?= $laporan['alamat_gudang']; ?></td>
                </tr>
                <tr>
                    <td>Luas Gudang</td>
                    <td>:</td>
                    <td><?= $laporan['luas_gudang']; ?></td>
                </tr>
                <tr>
                    <td>No. Gudang</td>
                    <td>:</td>
                    <td><?= $laporan['no_gudang']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Terdaftar</td>
                    <td>:</td>
                    <td><?= $laporan['tgl_terdaftar']; ?></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>:</td>
                    <td><?= $laporan['jumlah']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Barang</td>
                    <td>:</td>
                    <td><?= $laporan['jenis_barang']; ?></td>
                </tr>

            </table>
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
</body>

</html>