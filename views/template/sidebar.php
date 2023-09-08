<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-globe"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kerusakan Sektor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading" style="margin-top: 20px;">
        Menu
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="data_user.php">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#infospk" aria-expanded="true" aria-controls="infospk">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Info</span>
        </a>
        <div id="infospk" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Info</h6>
                <a class="collapse-item" href="info_kriteria.php">Kriteria</a>
                <a class="collapse-item" href="info_alternatif.php">Alternatif</a>
                <a class="collapse-item" href="info_bobot.php">Bobot</a>
                <a class="collapse-item" href="info_skala.php">Skala Penilaian</a>
                <!-- <a class="collapse-item" href="info_matrix.php">Matrix Keputusan</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#view" aria-expanded="true" aria-controls="view">
        <i class="fas fa-fw fa-eye"></i>
        <span>View</span>
    </a>
    <div id="view" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View</h6>
            <a class="collapse-item" href="view_matrix.php">Matrix Keputusan</a>
            <a class="collapse-item" href="view_pembagi.php">Pembagi</a>
            <a class="collapse-item" href="view_normalisasi.php">Normalisasi</a>
            <a class="collapse-item" href="view_terbobot.php">Normalisasi Terbobot</a>
            <a class="collapse-item" href="view_max_min.php">Maksimum Minimum</a>
            <a class="collapse-item" href="view_sip_sin.php">Solusi Ideal +/-</a>
            <a class="collapse-item" href="view_nilai_v.php">Nilai V</a>
        </div>
    </div>
</li> -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hasil" aria-expanded="true" aria-controls="hasil">
            <i class="fas fa-fw fa-poll"></i>
            <span>Penentuan</span>
        </a>
        <div id="hasil" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Penentuan</h6>
                <a class="collapse-item" href="p_input.php">Data Kerusakan</a>
                <!-- <a class="collapse-item" href="input_matrix.php">Input Penilaian</a> -->
                <!-- <a class="collapse-item" href="p_data.php">Data Input</a> -->
                <a class="collapse-item" href="p_hasil.php">Hasil Input</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="profil.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->