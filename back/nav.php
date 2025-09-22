<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Users</div>
            <a class="nav-link" href="page/admin/admin.php">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                Data Admin
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Data Pengguna
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="page/murid/murid.php">Murid</a>
                    <a class="nav-link" href="page/guru/guru.php">Guru</a>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Koperasi</div>
            <a class="nav-link" href="page/barang/barang.php">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                Data Barang
            </a>
            <a class="nav-link" href="page/history/history_pembelian.php">
                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                History Pembelian
            </a>
            <div class="sb-sidenav-menu-heading">Website</div>
            <a class="nav-link" href="../front/index.html">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-pager"></i></div>
                Web Sekolah
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?php echo $_SESSION["email"]; ?>
    </div>
</nav>