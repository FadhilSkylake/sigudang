<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <?php if (session()->has('role') && (session('role') === 'Admin Bidang' || session('role') === 'Kepala Bidang' || session('role') === 'Kepala Dinas')) : ?>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Gudang</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= $gudang; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif (session()->has('role') && (session('role') === 'Pemilik Gudang')) : ?>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Barang</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= $stok_count; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

    </div>
</div>
<?= $this->endSection(); ?>