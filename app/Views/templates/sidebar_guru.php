<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-1">SIA-SMARIGO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- dropdown akademik  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-school"></i>
            <span>Pembelajaran</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub-Menu</h6>
                <a class="collapse-item" href="<?= base_url('guru_jadwal') ?>">Mata Pelajaran</a>
                <a class="collapse-item" href="<?= base_url('PenilaianAkademik') ?>">Input Nilai</a>
                <a class="collapse-item" href="<?= base_url('DeskripsiNilaiAkhir') ?>">Deskripsi Nilai Akhir</a>
                <a class="collapse-item" href="<?= base_url('HasilBelajar') ?>">Hasil Belajar</a>
                <a class="collapse-item" href="<?= base_url('guru_profil') ?>">Profil</a>
            </div>
        </div>
    </li>
    <?php if (isset(session('log_auth')['waliKelas'])) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuWaliKelas" aria-expanded="true" aria-controls="menuWaliKelas">
                <i class="fas fa-fw fa-school"></i>
                <span>Kelas <?= session('log_auth')['waliKelas']['namaKelas']  ?></span></a>
            </a>
            <div id="menuWaliKelas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sub-Menu</h6>
                    <a class="collapse-item" href="<?= base_url('PenilaianNonAkademik') ?>">Penilaian Non Akademik</a>
                    <a class="collapse-item" href="<?= base_url('ERaport') ?>">E-Raport</a>
                </div>
            </div>
        </li>
    <?php endif ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>