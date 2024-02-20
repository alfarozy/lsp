<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/backoffice/dist/img/logo/pasamandev-light.svg" alt="AdminLTE Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/backoffice/dist/img/no-avatar.svg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open mt-3">
                    <a href="{{ route('siswa.dashboard') }}"
                        class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-header">Master data</li>

                <li class="nav-item">
                    <a href="{{ route('siswa.jadwal-saya') }}"
                        class="nav-link {{ request()->routeIs('siswa.jadwal-saya') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt
                        "></i>
                        <p>
                            Jadwal Saya
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('siswa.asesmen') }}"
                        class="nav-link {{ request()->routeIs('siswa.asesmen*') ? 'active' : '' }}">
                        <i class="nav-icon 
                        fas fa-list-ol
                        "></i>
                        <p>
                            Hasil Kelulusan
                        </p>
                    </a>
                </li>

                <li class="nav-header">Pengguna</li>
                <li class="nav-item">
                    <a href="{{ route('siswa.profile') }}"
                        class="nav-link {{ request()->routeIs('siswa.profile.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>
                            Profil saya
                        </p>
                    </a>
                </li>
                {{--
                <li class="nav-item">
                    <a href="{{ route('update-password') }}"
                        class="nav-link {{ request()->routeIs('update-password.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-unlock-alt"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('siswa.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    {{-- <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#logout"
                        class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> --}}
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
