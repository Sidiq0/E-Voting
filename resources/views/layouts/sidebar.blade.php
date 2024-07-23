<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Voting System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">ACCOUNT SETTINGS</li>
                @if (Auth::check() && Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ url('/admin/students') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola Mahasiswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/candidates') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Kelola Kandidat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/votes') }}" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat Vote
                        </p>
                    </a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role === 'user')
                <li class="nav-item">
                    <a href="{{ url('/vote') }}" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Vote
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('/profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user mr-2"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
