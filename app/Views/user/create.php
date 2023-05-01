<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-users me-1"></i>
        Tambah User
    </div>
    <div class="card-body">
        <form action="/user/save/" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email') ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username') ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-5">
                    <select class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="role" name="role">
                        <option selected value="" disabled>Pilih Role</option>
                        <option value="1">Kepala Dinas</option>
                        <option value="2">Kepala Bidang</option>
                        <option value="3">Admin Bidang</option>
                        <option value="4">Pemilik Gudang</option>
                    </select>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('role'); ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah User</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>