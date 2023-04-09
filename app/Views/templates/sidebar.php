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
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- dropdown akademik  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-school"></i>
            <span>Akademik</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub-Menu</h6>
                <a class="collapse-item" href="<?= base_url('guru') ?>">Data Guru</a>
                <a class="collapse-item" href="<?= base_url('siswa') ?>">Data Siswa</a>
                <a class="collapse-item" href="<?= base_url('kelas') ?>">Kelas</a>
                <a class="collapse-item" href="<?= base_url('mapel') ?>">Mata Pelajaran</a>
                <a class="collapse-item" href="<?= base_url('nilai') ?>">Input Nilai</a>
                <a class="collapse-item" href="<?= base_url('hasilbelajar') ?>">Hasil Belajar</a>
                <a class="collapse-item" href="<?= base_url('semester') ?>">Semester</a>
                <a class="collapse-item" href="<?= base_url('tahunajaran') ?>">Tahun Ajaran</a>

            </div>
        </div>
    </li>

    <!-- dropdown pengaturan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub-Menu</h6>
                <a class="collapse-item" href="<?= base_url() ?>">User</a>
            </div>
        </div>
    </li>

    <!-- drobdown info sekolah -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Info Sekolah</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub-Menu</h6>
                <a class="collapse-item" href="<?= base_url('pengumuman') ?>">Pengumuman</a>
                <!-- <a class="collapse-item" href="#">Info Sekolah</a>
                        <a class="collapse-item" href="#">Fasilitas</a>
                        <a class="collapse-item" href="#">Ekstrakurikuler</a>
                        <a class="collapse-item" href="#">Gallery</a>
                        <a class="collapse-item" href="#">Tentang Kami</a>
                        <a class="collapse-item" href="#">Kontak</a> -->
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth') ?>">
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