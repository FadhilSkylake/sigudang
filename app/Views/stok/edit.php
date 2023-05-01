<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-users me-1"></i>
        Edit Stok
    </div>
    <div class="card-body">
        <form action="/stok/update/<?= $id; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row">
                <input type="hidden" name="gudang_id">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" autofocus value="<?= (old('nama_barang')) ? old('nama_barang') : $stok['nama_barang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama_barang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>