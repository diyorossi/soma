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
    <!-- Google Fonts - Neo-Brutalist -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           NEO-BRUTALIST ADMIN DESIGN SYSTEM
           ============================================ */
        :root {
            --color-bg: #FFFDF5;
            --color-black: #0D0D0D;
            --color-dark: #1A1A1A;
            --color-gray: #555555;
            --color-light-gray: #E8E8E8;
            --color-white: #FFFFFF;
            --color-pink: #FF5277;
            --color-yellow: #FFE156;
            --color-cyan: #00C2FF;
            --color-lime: #CCFF00;
            --color-orange: #FF8A3D;
            --font-display: 'Space Mono', monospace;
            --font-body: 'Space Grotesk', sans-serif;
            --border: 3px solid var(--color-black);
            --border-thin: 2px solid var(--color-black);
            --shadow: 5px 5px 0px var(--color-black);
            --shadow-sm: 3px 3px 0px var(--color-black);
            --shadow-lg: 8px 8px 0px var(--color-black);
            --transition: all 0.15s ease;
            --sidebar-width: 270px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: var(--color-bg);
            color: var(--color-dark);
            font-size: 15px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 700;
            line-height: 1.3;
            text-transform: uppercase;
        }

        ::selection {
            background: var(--color-yellow);
            color: var(--color-black);
        }

        /* ============================================
           SIDEBAR
           ============================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--color-black);
            border-right: var(--border);
            z-index: 1000;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 1.5rem 1.25rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-white);
            text-decoration: none;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
        }

        .sidebar-brand i {
            color: var(--color-yellow);
        }

        .sidebar-menu {
            padding: 1.25rem 0.75rem;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-menu-label {
            font-family: var(--font-display);
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: rgba(255, 255, 255, 0.35);
            padding: 0 0.5rem;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }

        .sidebar-item {
            margin-bottom: 0.2rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 0.85rem;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            border-radius: 0;
            font-size: 0.85rem;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            border: 2px solid transparent;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--color-white);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-link.active {
            background: var(--color-yellow);
            color: var(--color-black);
            border-color: var(--color-yellow);
            font-weight: 700;
        }

        .sidebar-link.active i {
            color: var(--color-black);
        }

        .sidebar-link i {
            width: 20px;
            font-size: 0.9rem;
            text-align: center;
            color: inherit;
            transition: var(--transition);
        }

        .sidebar-link .badge {
            margin-left: auto;
            font-family: var(--font-display);
            font-size: 0.65rem;
            padding: 0.2rem 0.5rem;
            border-radius: 0;
            font-weight: 700;
            border: 2px solid currentColor;
        }

        .sidebar-footer {
            padding: 0.75rem 1rem;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-footer-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            border-radius: 0;
            font-size: 0.85rem;
            font-weight: 500;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .sidebar-footer-link:hover {
            background: rgba(255, 82, 119, 0.15);
            color: var(--color-pink);
            border-color: var(--color-pink);
        }

        /* ============================================
           MAIN CONTENT
           ============================================ */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: var(--transition);
        }

        /* ============================================
           TOP NAVBAR
           ============================================ */
        .top-navbar {
            background: var(--color-white);
            padding: 0.85rem 1.75rem;
            border-bottom: var(--border);
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
            background: var(--color-yellow);
            border: var(--border-thin);
            font-size: 1.1rem;
            color: var(--color-black);
            padding: 0.35rem 0.55rem;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .toggle-sidebar:hover {
            background: var(--color-pink);
            color: var(--color-white);
            transform: translate(-1px, -1px);
        }

        .toggle-sidebar:active {
            box-shadow: none;
            transform: translate(3px, 3px);
        }

        .page-heading {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--color-dark);
            margin: 0;
            text-transform: uppercase;
        }

        .top-navbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-dropdown .dropdown-toggle {
            background: none;
            border: var(--border-thin);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.4rem 0.8rem;
            border-radius: 0;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .user-dropdown .dropdown-toggle:hover {
            background: var(--color-bg);
            transform: translate(-1px, -1px);
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        .user-dropdown .dropdown-menu {
            border: var(--border);
            border-radius: 0;
            box-shadow: var(--shadow);
            padding: 0;
            overflow: hidden;
        }

        .user-dropdown .dropdown-item {
            font-family: var(--font-body);
            font-size: 0.85rem;
            padding: 0.65rem 1rem;
            transition: var(--transition);
        }

        .user-dropdown .dropdown-item:hover {
            background: var(--color-pink);
            color: var(--color-white);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: var(--color-black);
            color: var(--color-yellow);
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            border: 2px solid var(--color-black);
        }

        .user-name {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--color-dark);
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--color-gray);
        }

        /* ============================================
           CONTENT AREA
           ============================================ */
        .content-area {
            padding: 1.75rem;
        }

        /* Page Header / Title */
        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-header h1,
        .page-title {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: -0.02em;
        }

        .page-header p {
            color: var(--color-gray);
            margin: 0;
        }

        /* ============================================
           CARDS
           ============================================ */
        .card {
            background: var(--color-white);
            border: var(--border);
            border-radius: 0;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            transform: translate(-1px, -1px);
            box-shadow: 6px 6px 0px var(--color-black);
        }

        .card-header {
            background: var(--color-bg);
            border-bottom: var(--border);
            padding: 1rem 1.25rem;
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--color-dark);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .card-body {
            padding: 1.25rem;
        }

        /* ============================================
           STAT CARDS
           ============================================ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.75rem;
        }

        .stat-card {
            background: var(--color-white);
            border: var(--border);
            border-radius: 0;
            padding: 1.25rem;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            background: var(--color-yellow);
            color: var(--color-black);
            border: var(--border-thin);
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .stat-info h4 {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.15rem;
            color: var(--color-dark);
        }

        .stat-info p {
            color: var(--color-gray);
            margin: 0;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        /* ============================================
           BUTTONS
           ============================================ */
        .btn-primary-custom {
            background: var(--color-black);
            border: var(--border-thin);
            color: var(--color-white);
            padding: 0.6rem 1.2rem;
            font-family: var(--font-display);
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 0;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 0.03em;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary-custom:hover {
            background: var(--color-pink);
            border-color: var(--color-black);
            color: var(--color-white);
            transform: translate(-1px, -1px);
            box-shadow: var(--shadow);
        }

        .btn-primary-custom:active {
            box-shadow: none;
            transform: translate(3px, 3px);
        }

        .btn-outline-custom {
            border: var(--border-thin);
            color: var(--color-black);
            padding: 0.6rem 1.2rem;
            font-family: var(--font-display);
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 0;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 0.03em;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: var(--color-black);
            border-color: var(--color-black);
            color: var(--color-white);
        }

        .btn-accent {
            background: var(--color-yellow);
            border: var(--border-thin);
            color: var(--color-black);
            padding: 0.6rem 1.2rem;
            font-family: var(--font-display);
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 0;
            transition: var(--transition);
            text-transform: uppercase;
            box-shadow: var(--shadow-sm);
        }

        .btn-accent:hover {
            background: var(--color-pink);
            color: var(--color-white);
            transform: translate(-1px, -1px);
        }

        /* Bootstrap button overrides for brutalist */
        .btn {
            border-radius: 0;
        }

        .btn-sm {
            border-radius: 0;
        }

        .btn-outline-primary {
            border: var(--border-thin);
            border-radius: 0;
            color: var(--color-black);
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background: var(--color-cyan);
            border-color: var(--color-black);
            color: var(--color-black);
        }

        .btn-outline-danger {
            border: 2px solid var(--color-pink);
            border-radius: 0;
            color: var(--color-pink);
            font-weight: 600;
        }

        .btn-outline-danger:hover {
            background: var(--color-pink);
            border-color: var(--color-pink);
            color: var(--color-white);
        }

        .btn-outline-secondary {
            border: var(--border-thin);
            border-radius: 0;
            color: var(--color-black);
        }

        .btn-outline-secondary:hover {
            background: var(--color-black);
            border-color: var(--color-black);
            color: var(--color-white);
        }

        /* ============================================
           TABLES
           ============================================ */
        .table-custom {
            background: var(--color-white);
            border: var(--border);
            border-radius: 0;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table-custom thead th,
        .table thead th {
            background: var(--color-black);
            color: var(--color-yellow);
            border-bottom: var(--border);
            font-family: var(--font-display);
            font-weight: 700;
            padding: 0.85rem 1.1rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .table-custom tbody td,
        .table tbody td {
            padding: 0.85rem 1.1rem;
            vertical-align: middle;
            border-bottom: 2px solid var(--color-light-gray);
            font-size: 0.9rem;
        }

        .table-custom tbody tr:last-child td,
        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-custom tbody tr:hover,
        .table-hover tbody tr:hover {
            background: rgba(255, 225, 86, 0.1) !important;
        }

        .table-warning {
            background: rgba(255, 225, 86, 0.15) !important;
        }

        /* ============================================
           FORMS
           ============================================ */
        .form-label {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 0.4rem;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .form-control, .form-select {
            padding: 0.7rem 0.9rem;
            border: var(--border-thin);
            border-radius: 0;
            font-family: var(--font-body);
            font-size: 0.95rem;
            transition: var(--transition);
            background: var(--color-bg);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-pink);
            box-shadow: 3px 3px 0 var(--color-pink);
            background: var(--color-white);
            outline: none;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-check-input {
            border: var(--border-thin);
            border-radius: 0;
        }

        .form-check-input:checked {
            background-color: var(--color-black);
            border-color: var(--color-black);
        }

        .form-check-input:focus {
            box-shadow: 2px 2px 0 var(--color-pink);
        }

        /* ============================================
           IMAGE PREVIEW
           ============================================ */
        .image-preview {
            width: 100%;
            max-width: 300px;
            border: var(--border);
            border-radius: 0;
            overflow: hidden;
            background: var(--color-light-gray);
            box-shadow: var(--shadow-sm);
        }

        .image-preview img {
            width: 100%;
            height: auto;
        }

        /* ============================================
           STATUS BADGES
           ============================================ */
        .badge {
            border-radius: 0;
            font-family: var(--font-display);
            font-weight: 700;
            letter-spacing: 0.03em;
            font-size: 0.7rem;
        }

        .badge.bg-success {
            background: var(--color-lime) !important;
            color: var(--color-black) !important;
            border: 2px solid var(--color-black);
        }

        .badge.bg-warning {
            background: var(--color-yellow) !important;
            color: var(--color-black) !important;
            border: 2px solid var(--color-black);
        }

        .badge.bg-danger {
            background: var(--color-pink) !important;
            color: var(--color-white) !important;
            border: 2px solid var(--color-black);
        }

        .badge.bg-secondary {
            background: var(--color-light-gray) !important;
            color: var(--color-black) !important;
            border: 2px solid var(--color-black);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.3rem 0.65rem;
            border-radius: 0;
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            border: 2px solid var(--color-black);
        }

        .status-badge.success {
            background: var(--color-lime);
            color: var(--color-black);
        }

        .status-badge.warning {
            background: var(--color-yellow);
            color: var(--color-black);
        }

        .status-badge.danger {
            background: var(--color-pink);
            color: var(--color-white);
        }

        /* ============================================
           MODALS
           ============================================ */
        .modal-content {
            border: var(--border);
            border-radius: 0;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: var(--color-black);
            color: var(--color-white);
            border-bottom: var(--border);
            padding: 1rem 1.25rem;
            border-radius: 0;
        }

        .modal-title {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-body {
            padding: 1.25rem;
            background: var(--color-bg);
        }

        .modal-footer {
            border-top: var(--border);
            padding: 1rem 1.25rem;
            background: var(--color-white);
            border-radius: 0;
        }

        /* ============================================
           LIST GROUPS
           ============================================ */
        .list-group-item {
            border: none;
            border-bottom: 2px solid var(--color-light-gray);
            border-radius: 0;
            padding: 0.85rem 1rem;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .list-group-item-action:hover {
            background: rgba(255, 225, 86, 0.15);
            color: var(--color-black);
        }

        /* ============================================
           PAGINATION
           ============================================ */
        .pagination .page-link {
            border: var(--border-thin);
            border-radius: 0;
            color: var(--color-black);
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            padding: 0.5rem 0.8rem;
        }

        .pagination .page-link:hover {
            background: var(--color-yellow);
            border-color: var(--color-black);
            color: var(--color-black);
        }

        .pagination .page-item.active .page-link {
            background: var(--color-black);
            border-color: var(--color-black);
            color: var(--color-yellow);
        }

        /* ============================================
           ALERTS
           ============================================ */
        .alert {
            border: var(--border-thin);
            border-radius: 0;
            font-size: 0.9rem;
            box-shadow: var(--shadow-sm);
        }

        /* ============================================
           ANIMATIONS
           ============================================ */
        .fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
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
                background: rgba(0, 0, 0, 0.6);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
            }

            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }

            .page-heading {
                font-size: 1.1rem;
            }

            .content-area {
                padding: 1.25rem;
            }

            .card-header {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .card-header .btn {
                font-size: 0.75rem;
                padding: 0.35rem 0.7rem;
            }

            .modal-dialog {
                margin: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .content-area {
                padding: 1rem;
            }

            .top-navbar {
                padding: 0.65rem 1rem;
            }

            .page-heading {
                font-size: 1rem;
            }

            .page-header h1,
            .page-title {
                font-size: 1.3rem;
            }

            .stat-card {
                padding: 1rem;
            }

            .stat-icon {
                width: 44px;
                height: 44px;
                font-size: 1rem;
            }

            .stat-info h4 {
                font-size: 1.3rem;
            }

            .table thead th {
                padding: 0.7rem 0.75rem;
                font-size: 0.65rem;
                white-space: nowrap;
            }

            .table tbody td {
                padding: 0.7rem 0.75rem;
                font-size: 0.8rem;
            }

            .table .btn-sm {
                padding: 0.2rem 0.35rem;
                font-size: 0.7rem;
            }

            .form-control, .form-select {
                padding: 0.6rem 0.75rem;
                font-size: 0.9rem;
            }

            .modal-dialog.modal-lg {
                max-width: 100%;
                margin: 0.5rem;
            }

            .modal-footer {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .modal-footer .btn {
                flex: 1;
                min-width: 100px;
            }

            .image-preview {
                max-width: 100%;
            }

            .card {
                margin-bottom: 1rem;
                box-shadow: var(--shadow-sm);
            }

            .btn-primary-custom,
            .btn-outline-custom,
            .btn-accent {
                padding: 0.5rem 0.9rem;
                font-size: 0.75rem;
            }

            .row.mb-4 > [class*="col-md-4"] {
                margin-bottom: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .content-area {
                padding: 0.75rem;
            }

            .top-navbar {
                padding: 0.5rem 0.75rem;
            }

            .page-heading {
                font-size: 0.9rem;
            }

            .page-title {
                font-size: 1.1rem;
            }

            .user-avatar {
                width: 30px;
                height: 30px;
                font-size: 0.75rem;
            }

            .stat-card {
                padding: 0.75rem;
                gap: 0.6rem;
                box-shadow: var(--shadow-sm);
            }

            .stat-icon {
                width: 38px;
                height: 38px;
                font-size: 0.9rem;
            }

            .stat-info h4 {
                font-size: 1.1rem;
            }

            .card-header {
                padding: 0.7rem;
                font-size: 0.75rem;
            }

            .card-body {
                padding: 0.7rem;
            }

            .modal-footer .btn {
                width: 100%;
            }

            .table thead th {
                font-size: 0.6rem;
                padding: 0.55rem;
            }

            .table tbody td {
                font-size: 0.75rem;
                padding: 0.55rem;
            }

            .sidebar {
                width: 250px;
            }

            .sidebar-brand {
                font-size: 1.2rem;
            }

            .sidebar-link {
                font-size: 0.8rem;
                padding: 0.55rem 0.7rem;
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
            confirmButtonColor: '#0D0D0D',
            customClass: {
                popup: 'swal-brutalist'
            }
        });
    }

    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            confirmButtonColor: '#0D0D0D',
            customClass: {
                popup: 'swal-brutalist'
            }
        });
    }

    function confirmDelete(callback) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0D0D0D',
            cancelButtonColor: '#FF5277',
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                popup: 'swal-brutalist'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                callback();
            }
        });
    }
</script>

<style>
    .swal-brutalist {
        border: 3px solid #0D0D0D !important;
        border-radius: 0 !important;
        box-shadow: 8px 8px 0px #0D0D0D !important;
    }
    .swal-brutalist .swal2-title {
        font-family: 'Space Mono', monospace !important;
        text-transform: uppercase !important;
    }
    .swal-brutalist .swal2-confirm,
    .swal-brutalist .swal2-cancel {
        border-radius: 0 !important;
        border: 2px solid #0D0D0D !important;
        font-family: 'Space Mono', monospace !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        font-size: 0.85rem !important;
    }
</style>

@yield('scripts')

</body>
</html>