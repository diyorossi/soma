<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | SMAgency</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-green: #1a4d2e;
            --dark-green: #143d24;
            --light-green: #2d6a4f;
            --accent-green: #40916c;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--primary-green);
            color: #fff;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 1.5rem;
            background: var(--dark-green);
            text-align: center;
        }

        .sidebar-brand {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-item {
            padding: 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-left-color: #fff;
        }

        .sidebar-link i {
            width: 24px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 1rem 0;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .top-navbar {
            background: #fff;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .toggle-sidebar {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--primary-green);
        }

        .user-dropdown .dropdown-toggle {
            background: none;
            border: none;
            color: #333;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background: var(--primary-green);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1.5rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem;
            font-weight: 600;
            color: #333;
            border-radius: 10px 10px 0 0 !important;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Stats Cards */
        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(26, 77, 46, 0.1);
            color: var(--primary-green);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .stat-info h4 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: #333;
        }

        .stat-info p {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary-green);
            border-color: var(--primary-green);
            color: #fff;
        }

        .btn-primary-custom:hover {
            background: var(--dark-green);
            border-color: var(--dark-green);
            color: #fff;
        }

        .btn-outline-custom {
            border-color: var(--primary-green);
            color: var(--primary-green);
        }

        .btn-outline-custom:hover {
            background: var(--primary-green);
            border-color: var(--primary-green);
            color: #fff;
        }

        /* Tables */
        .table-custom {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .table-custom thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            color: #333;
            padding: 1rem;
        }

        .table-custom tbody td {
            padding: 1rem;
            vertical-align: middle;
        }

        /* Form Styles */
        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(26, 77, 46, 0.25);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-sidebar {
                display: block;
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="fas fa-layer-group me-2"></i>SMAgency
        </a>
    </div>
    
    <div class="sidebar-menu">
        <div class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.hero.index') }}" class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                <i class="fas fa-home"></i>Hero Section
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                <i class="fas fa-info-circle"></i>About Section
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.whatwedo.index') }}" class="sidebar-link {{ request()->routeIs('admin.whatwedo.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>What We Do
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-cogs"></i>Services
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.portfolio.index') }}" class="sidebar-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>Portfolio
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.contact.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                <i class="fas fa-address-card"></i>Contact Info
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>Messages
                @php
                    $unreadCount = App\Models\ContactMessage::getUnreadCount();
                @endphp
                @if($unreadCount > 0)
                    <span class="badge bg-danger ms-auto">{{ $unreadCount }}</span>
                @endif
            </a>
        </div>
        
        <div class="sidebar-divider"></div>
        
        <div class="sidebar-item">
            <a href="{{ route('landing') }}" class="sidebar-link" target="_blank">
                <i class="fas fa-external-link-alt"></i>View Website
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a>
        </div>
    </div>
</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Navbar -->
    <div class="top-navbar">
        <button class="toggle-sidebar" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="user-dropdown dropdown">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="fas fa-chevron-down ms-2" style="font-size: 0.75rem;"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Content Area -->
    <div class="content-area">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // CSRF Token for AJAX
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Toggle Sidebar
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('sidebarOverlay').classList.toggle('active');
    });

    document.getElementById('sidebarOverlay').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('sidebarOverlay').classList.remove('active');
    });

    // Show success message
    function showSuccess(message) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            confirmButtonColor: '#1a4d2e'
        });
    }

    // Show error message
    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            confirmButtonColor: '#1a4d2e'
        });
    }

    // Confirm delete
    function confirmDelete(callback) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1a4d2e',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                callback();
            }
        });
    }
</script>

@yield('scripts')

</body>
</html>