<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-users me-1"></i>
        Detail Gudang
    </div>
    <div class="card-body">
        <form action="/gudang/update/<?= $id; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="nama_gudang" class="col-sm-2 col-form-label">Nama Gudang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_gudang')) ? 'is-invalid' : ''; ?>" id="nama_gudang" name="nama_gudang" autofocus value="<?= (old('nama_gudang')) ? old('nama_gudang') : $gudang['nama_gudang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama_gudang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="alamat_gudang" class="col-sm-2 col-form-label">Alamat Gudang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control <?= ($validation->hasError('alamat_gudang')) ? 'is-invalid' : ''; ?>" id="alamat_gudang" name="alamat_gudang" value="<?= (old('alamat_gudang')) ? old('alamat_gudang') : $gudang['alamat_gudang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('alamat_gudang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="luas_gudang" class="col-sm-2 col-form-label">Luas Gudang</label>
                <div class="col-sm-5">
                    <input type="luas_gudang" class="form-control <?= ($validation->hasError('luas_gudang')) ? 'is-invalid' : ''; ?>" id="luas_gudang" name="luas_gudang" value="<?= (old('luas_gudang')) ? old('luas_gudang') : $gudang['luas_gudang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('luas_gudang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="no_gudang" class="col-sm-2 col-form-label">No Gudang</label>
                <div class="col-sm-5">
                    <input type="no_gudang" class="form-control <?= ($validation->hasError('no_gudang')) ? 'is-invalid' : ''; ?>" id="no_gudang" name="no_gudang" value="<?= (old('no_gudang')) ? old('no_gudang') : $gudang['no_gudang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('no_gudang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="tgl_terdaftar" class="col-sm-2 col-form-label">Tanggal Terdaftar</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control <?= ($validation->hasError('tgl_terdaftar')) ? 'is-invalid' : ''; ?>" id="tgl_terdaftar" name="tgl_terdaftar" value="<?= (old('tgl_terdaftar')) ? old('tgl_terdaftar') : $gudang['tgl_terdaftar'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('tgl_terdaftar'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-5">
                    <input type="jumlah" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $gudang['jumlah'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jumlah'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                <div class="col-sm-5">
                    <input type="jenis_barang" class="form-control <?= ($validation->hasError('jenis_barang')) ? 'is-invalid' : ''; ?>" id="jenis_barang" name="jenis_barang" value="<?= (old('jenis_barang')) ? old('jenis_barang') : $gudang['jenis_barang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('jenis_barang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="pemilik_gudang" class="col-sm-2 col-form-label">Pemilik Gudang</label>
                <div class="col-sm-5">
                    <input type="pemilik_gudang" class="form-control <?= ($validation->hasError('pemilik_gudang')) ? 'is-invalid' : ''; ?>" id="pemilik_gudang" name="pemilik_gudang" value="<?= (old('pemilik_gudang')) ? old('pemilik_gudang') : $gudang['pemilik_gudang'] ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('pemilik_gudang'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <?php if (session()->has('role') && (session('role') === 'Pemilik Gudang')) :  ?>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                <?php endif ?>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>