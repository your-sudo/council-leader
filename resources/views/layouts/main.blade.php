<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/admin.css')
</head>
<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <i class="fas fa-tachometer-alt"></i>
                <span>Admin aw aw</span>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('dashboardadmin') }}" class="nav-link {{ request()->is('dashboardadmin') ? 'active' : '' }} " data-nama="dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manajemenkandidat') }}" class="nav-link {{ request()->is('manajemenkandidat') ? 'active' : '' }}" data-nama="manajemenKandidat">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Kandidat</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('manajemenSiswa') }}" class="nav-link {{ request()->is('manajemenSiswa') ? 'active' : '' }}" data-nama="manajemenSiswa">
                    <i class="fas fa-users"></i>
                    <span>Siswa</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>

    @vite('resources/js/admin.js')
</body>
</html>
