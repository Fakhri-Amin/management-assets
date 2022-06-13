<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Menu
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <!-- menu  -->
                        <a class="nav-link" href="/tanah_dan_bangunan">Tanah Dan Bangunan</a>
                        <a class="nav-link" href="/kendaraan_bermotor">Kendaraan Bermotor</a>
                        <a class="nav-link" href="/peralatan_dan_mesin">Peralatan Dan Mesin</a>
                        <a class="nav-link" href="/persediaan">Persediaan</a>
                        <a class="nav-link" href="/laboratorium">Laboratorium</a>
                        <a class="nav-link" href="/meubellair">Meubellair</a>
                        <a class="nav-link" href="/aset_lainnya">Aset Lainnya</a>

                        <?php if (in_groups(['admin-master', 'admin-bmn-unkhair'])) : ?>
                            <a class="nav-link" href="/admin_bmn">Admin BMN</a>
                            <a class="nav-link" href="/laporan_yang_dibutuhkan">Laporan Yang Dibutuhkan</a>
                        <?php endif; ?>
                        <!-- <a class="nav-link" href="/logout">Logout</a> -->
                    </nav>
                </div>
                <hr class="dropdown-divider" />

                <?php if (in_groups(['admin-master', 'admin-bmn-unkhair'])) : ?>
                    <a class="nav-link" href="/user_list">
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        User List
                    </a>
                    <a class="nav-link" href="/user_type">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        User Type
                    </a>
                    <hr class="dropdown-divider" />
                <?php endif; ?>
                <a class="nav-link" href="/logout">
                    <div class="sb-nav-link-icon">
                        <i class="bi bi-box-arrow-right"></i>
                    </div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Login sebagai :</div>
            <?= User()->username; ?>
        </div>
    </nav>
</div>