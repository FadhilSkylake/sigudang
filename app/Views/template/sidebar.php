<aside class="sidenav navbar navbar-vertical navbar-expand-lg border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0">
            <img src="<?= base_url(); ?>/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">DKUPP</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">
                    <h7 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder ">HALO <?= session('username'); ?></h7>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link  <?= uri_string() == 'dashboard' ? 'active' : ''; ?>">
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <?php if (session()->has('role') && (session('role') === 'Admin Bidang')) :  ?>
                <li class="nav-item">
                    <a href="/user" class="nav-link  <?= uri_string() == 'user' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/gudang" class="nav-link  <?= uri_string() == 'gudang' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Gudang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/stok" class="nav-link  <?= uri_string() == 'stok' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Stok Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/transaksi" class="nav-link  <?= uri_string() == 'transaksi' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporan" class="nav-link  <?= uri_string() == 'laporan' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
            <?php elseif (session()->has('role') && ( session('role') === 'Pemilik Gudang')) : ?>
                <li class="nav-item">
                    <a href="/gudang" class="nav-link  <?= uri_string() == 'gudang' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Gudang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/stok" class="nav-link  <?= uri_string() == 'stok' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Stok Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/transaksi" class="nav-link  <?= uri_string() == 'transaksi' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporan" class="nav-link  <?= uri_string() == 'laporan' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
            <?php elseif (session()->has('role') && (session('role') === 'Admin Bidang' || session('role') === 'Pemilik Gudang' || session('role') === 'Kepala Bidang' || session('role') === 'Kepala Dinas')) : ?>
                <li class="nav-item">
                    <a href="/laporan" class="nav-link  <?= uri_string() == 'laporan' ? 'active' : ''; ?>">
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
            <?php endif ?>
            <li class="nav-item mt-3">
                <a class="nav-link" href="/logout">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">LOGOUT</h6>
                </a>
            </li>
        </ul>
    </div>
</aside>