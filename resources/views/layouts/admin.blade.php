<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | SOMA</title>
    
    <!-- Preconnect -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-black: #0a0a0a;
            --color-dark: #1a1a1a;
            --color-gray: #6b6b6b;
            --color-light: #f5f5f5;
            --color-lighter: #fafafa;
            --color-white: #ffffff;
            --color-accent: #c9a96e;
            --color-accent-hover: #b8935a;
            --font-display: 'Playfair Display', serif;
            --font-body: 'DM Sans', sans-serif;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --sidebar-width: 280px;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: var(--color-lighter);
            color: var(--color-dark);
            font-size: 15px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 500;
            line-height: 1.3;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--color-white);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            z-index: 1000;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }

        .sidebar-brand {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-black);
            text-decoration: none;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-brand i {
            color: var(--color-accent);
        }

        .sidebar-menu {
            padding: 1.5rem 1rem;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-menu-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--color-gray);
            padding: 0 0.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .sidebar-item {
            margin-bottom: 0.25rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--color-gray);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .sidebar-link:hover {
            background: var(--color-light);
            color: var(--color-dark);
        }

        .sidebar-link.active {
            background: var(--color-black);
            color: var(--color-white);
        }

        .sidebar-link.active i {
            color: var(--color-accent);
        }

        .sidebar-link i {
            width: 20px;
            font-size: 0.95rem;
            text-align: center;
            color: inherit;
            transition: var(--transition);
        }

        .sidebar-link .badge {
            margin-left: auto;
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.04);
        }

        .sidebar-footer-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--color-gray);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .sidebar-footer-link:hover {
            background: #fee;
            color: #c00;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: var(--transition);
        }

        /* Top Navbar */
        .top-navbar {
            background: var(--color-white);
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .top-navbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .toggle-sidebar {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--color-dark);
            padding: 0.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .toggle-sidebar:hover {
            color: var(--color-accent);
        }

        .page-heading {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--color-dark);
            margin: 0;
        }

        .top-navbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-dropdown .dropdown-toggle {
            background: none;
            border: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            transition: var(--transition);
        }

        .user-dropdown .dropdown-toggle:hover {
            background: var(--color-light);
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: var(--color-black);
            color: var(--color-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .user-name {
            font-weight: 500;
            color: var(--color-dark);
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--color-gray);
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: var(--color-gray);
            margin: 0;
        }

        /* Cards */
        .card {
            background: var(--color-white);
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            color: var(--color-dark);
            font-size: 1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--color-white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            background: var(--color-light);
            color: var(--color-dark);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .stat-info h4 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--color-dark);
        }

        .stat-info p {
            color: var(--color-gray);
            margin: 0;
            font-size: 0.85rem;
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--color-black);
            border-color: var(--color-black);
            color: var(--color-white);
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            transition: var(--transition);
        }

        .btn-primary-custom:hover {
            background: var(--color-accent);
            border-color: var(--color-accent);
            color: var(--color-white);
        }

        .btn-outline-custom {
            border: 1px solid var(--color-black);
            color: var(--color-black);
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            transition: var(--transition);
        }

        .btn-outline-custom:hover {
            background: var(--color-black);
            border-color: var(--color-black);
            color: var(--color-white);
        }

        .btn-accent {
            background: var(--color-accent);
            border-color: var(--color-accent);
            color: var(--color-white);
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            transition: var(--transition);
        }

        .btn-accent:hover {
            background: var(--color-accent-hover);
            border-color: var(--color-accent-hover);
            color: var(--color-white);
        }

        /* Tables */
        .table-custom {
            background: var(--color-white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table-custom thead th {
            background: var(--color-light);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            font-weight: 600;
            color: var(--color-dark);
            padding: 1rem 1.25rem;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .table-custom tbody td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        .table-custom tbody tr:hover {
            background: var(--color-lighter);
        }

        /* Form Styles */
        .form-label {
            font-weight: 500;
            color: var(--color-dark);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-accent);
            box-shadow: 0 0 0 3px rgba(201, 169, 110, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Image Preview */
        .image-preview {
            width: 100%;
            max-width: 300px;
            border-radius: 8px;
            overflow: hidden;
            background: var(--color-light);
        }

        .image-preview img {
            width: 100%;
            height: auto;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .status-badge.success {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }

        .status-badge.warning {
            background: rgba(234, 179, 8, 0.1);
            color: #ca8a04;
        }

        .status-badge.danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
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

            .user-name, .user-role {
                display: none;
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
            }

            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }

        @media (max-width: 768px) {
            .content-area {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .top-navbar {
                padding: 1rem;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.4s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="fas fa-s"></i>SOMA
        </a>
    </div>
    
    <div class="sidebar-menu">
        <div class="sidebar-menu-label">Menu</div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th"></i>Dashboard
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.hero.index') }}" class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                <i class="fas fa-house"></i>Hero Section
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                <i class="fas fa-user"></i>About Section
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.whatwedo.index') }}" class="sidebar-link {{ request()->routeIs('admin.whatwedo.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>What We Do
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-stream"></i>Services
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.portfolio.index') }}" class="sidebar-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>Portfolio
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.contact.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                <i class="fas fa-address-book"></i>Contact Info
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>Messages
                @php
                    $unreadCount = App\Models\ContactMessage::getUnreadCount();
                @endphp
                @if($unreadCount > 0)
                    <span class="badge bg-danger">{{ $unreadCount }}</span>
                @endif
            </a>
        </div>
    </div>
    
    <div class="sidebar-footer">
        <a href="{{ route('landing') }}" class="sidebar-footer-link" target="_blank">
            <i class="fas fa-external-link-alt"></i>View Website
        </a>
        
        <a href="#" class="sidebar-footer-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>Logout
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Navbar -->
    <div class="top-navbar">
        <div class="top-navbar-left">
            <button class="toggle-sidebar" id="toggleSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <h2 class="page-heading">@yield('page-title', 'Dashboard')</h2>
        </div>
        
        <div class="top-navbar-right">
            <div class="user-dropdown dropdown">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
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
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('sidebarOverlay').classList.toggle('active');
    });

    document.getElementById('sidebarOverlay').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('sidebarOverlay').classList.remove('active');
    });

    function showSuccess(message) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            confirmButtonColor: '#0a0a0a'
        });
    }

    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            confirmButtonColor: '#0a0a0a'
        });
    }

    function confirmDelete(callback) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0a0a0a',
            cancelButtonColor: '#dc2626',
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