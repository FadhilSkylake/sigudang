<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-users me-1"></i>
        Tambah Transaksi
    </div>
    <div class="card-body">
        <?php if (session('pesan')) { ?>
            <div class="alert alert-danger" role="alert">
                <?= session('pesan'); ?>
            </div>
        <?php } ?>
        <form action="/transaksi/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="gudang_id">
            <div class="form-group row">
                <label for="stok_id" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-5">
                    <select autofocus class="form-control <?= ($validation->hasError('stok_id')) ? 'is-invalid' : ''; ?>" id="stok_id" name="stok_id" required>
                        <option selected value="" disabled>Pilih Barang</option>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $t) : {
                            } ?>
                            <option value="<?= $t['id_stok'] ?>" <?= old('stok_id') == $t['id_stok'] ? 'selected' : ''; ?>><?= $t['nama_barang']; ?></option>

                        <?php endforeach; ?>
                    </select>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('stok_id'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah_stok" class="col-sm-2 col-form-label">Masukkan Jumlah</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control <?= ($validation->hasError('jumlah_stok')) ? 'is-invalid' : ''; ?>" id="jumlah_stok" name="jumlah_stok" value="<?= old('jumlah_stok');  ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jumlah_stok'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status">
                        <option selected value="" disabled>Pilih Status </option>
                        <option value="1" <?= old('status') == '1' ? 'selected' : ''; ?>>BERTAMBAH</option>
                        <option value="2" <?= old('status') == '2' ? 'selected' : '';  ?>>BERKURANG</option>
                    </select>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('status'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control <?= ($validation->hasError('tgl')) ? 'is-invalid' : ''; ?>" id="tgl" name="tgl" value="<?= old('tgl'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tgl'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>