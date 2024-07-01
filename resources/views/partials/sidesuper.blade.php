<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary
   sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <img
                src="https://i0.wp.com/dlh.kalselprov.go.id/web/wp-content/uploads/2021/09/LOGO-PROVINSI-KALIMANTAN-SELATAN.png?fit=676%2C946&ssl=1"height=40px;>
        </div>
        <div class="sidebar-brand-text mx-3">DB PPKLH <sub> </sub></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="/dashboard">
            <i class="bx bx-home nav_icon"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Akun
    </div>

    <!-- Nav Item - User Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bx bx-user "></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded ">
                <h6 class="collapse-header">Kelola Akun</h6>
                <a class="collapse-item" href="/user">Daftar Admin</a>
                <a class="collapse-item" href="/adduser">Kelola Admin</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pemulihan lahan
    </div>

    <!-- Nav Item - Lahan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Lahan</span></a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Lahan</h6>
                <a class="collapse-item" href="land_recovery_locations">Daftar Tabel Lahan</a>
                <a class="collapse-item" href="addlahan">Input Data Lahan</a>
                {{-- <h6 class="collapse-header">Other Pages:</h6> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - lokasi lahan Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/lokasi">
            <i class="bx bx-current-location"></i>
            <span>Lokasi Lahan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lainnya
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item ">
        <a class="nav-link" href="/manual">
            <i class="bx bx-bookmark"></i>
            <span>Manual Pengguna</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    {{-- Nav item - Sign out --}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="bx bx-log-out"></i>
            <span>SignOut</span></a>
    </li>

</ul>
<!-- End of Sidebar -->
