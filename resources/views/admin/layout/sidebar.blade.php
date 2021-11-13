<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <img src="{{ asset('plugins/mazer/images/logo/logo.png') }}" alt="logo">
                </div>
                <div class="toggler">
                    <a role="button" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <!-- user -->
                <li class="sidebar-item has-sub">
                    <a role="button" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i><span>{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="/admin/admin">Profil</a>
                        </li>
                        <li class="submenu-item">
                            <a role="button" class='btn-logout'>Logout</a>
                        </li>
                    </ul>
                </li>

                <!-- menu -->
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="/admin/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i><span>Dashboard</span>
                    </a>
                </li>

                <!-- master data -->
                <li class="sidebar-title">Master Data</li>
                <li class="sidebar-item has-sub">
                    <a role="button" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i><span>Pengguna</span>
                    </a>
                    <ul class="submenu {{ Request::is('admin/admin*', 'admin/tamu*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Request::is('admin/admin*') ? 'active' : '' }}">
                            <a href="/admin/admin">Admin</a>
                        </li>
                        <li class="submenu-item {{ Request::is('admin/tamu*') ? 'active' : '' }}">
                            <a href="/admin/tamu">Tamu</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub">
                    <a role="button" class='sidebar-link'>
                        <i class="bi bi-lamp-fill"></i><span>Kamar</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="/admin/kategori-kamar">Kategori</a>
                        </li>
                        <li class="submenu-item">
                            <a href="/admin/list-kamar">List Kamar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
