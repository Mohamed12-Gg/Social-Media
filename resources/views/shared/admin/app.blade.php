<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - LMS Platform</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-color: #667eea;
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(0, 0, 0, 0.85) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--glass-border);
            height: 56px;
            padding: 0 16px !important;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1rem !important;
        }

        /* Mobile menu toggle button */
        .navbar-toggler-custom {
            background: rgba(102, 126, 234, 0.15);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 8px;
            color: #fff;
            padding: 6px 10px;
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .navbar-toggler-custom:hover {
            background: rgba(102, 126, 234, 0.3);
        }

        /* ===== LAYOUT WRAPPER ===== */
        .layout-wrapper {
            display: flex;
            min-height: calc(100vh - 56px);
            position: relative;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(12px);
            border-right: 1px solid var(--glass-border);
            display: flex;
            flex-direction: column;
            padding: 16px 0;
            transition: transform 0.3s ease;
            position: relative;
            z-index: 200;
        }

        /* Desktop: always visible */
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0) !important;
            }

            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Mobile: hidden by default, slides in */
        @media (max-width: 767.98px) {
            .sidebar {
                position: fixed;
                top: 56px;
                left: 0;
                height: calc(100vh - 56px);
                transform: translateX(-100%);
                width: 260px;
            }

            .sidebar.open {
                transform: translateX(0);
                box-shadow: 8px 0 30px rgba(0, 0, 0, 0.5);
            }
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 56px 0 0 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 199;
            backdrop-filter: blur(2px);
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Nav links */
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            border-radius: 10px;
            margin: 3px 10px;
            padding: 12px 16px !important;
            transition: all 0.25s ease;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .nav-link:hover {
            background: rgba(102, 126, 234, 0.12);
            color: #fff !important;
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            background: var(--primary-gradient) !important;
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .sidebar .nav-link i,
        .sidebar .nav-link svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        /* Sign out at bottom */
        .sidebar .sign-out-wrapper {
            margin-top: auto;
            padding-top: 12px;
            border-top: 1px solid var(--glass-border);
        }

        .sidebar .sign-out-btn {
            color: rgba(255, 255, 255, 0.6) !important;
            transition: color 0.2s;
        }

        .sidebar .sign-out-btn:hover {
            color: #dc3545 !important;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            min-width: 0;
            padding: 24px 20px;
            overflow-x: hidden;
        }

        @media (min-width: 768px) {
            .main-content {
                padding: 30px;
            }
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        @media (min-width: 768px) {
            .page-header {
                padding: 24px;
            }
        }

        .page-header h1 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            margin: 0;
            font-size: 1.5rem;
        }

        @media (min-width: 768px) {
            .page-header h1 {
                font-size: 1.8rem;
            }
        }

        /* ===== ALERT ===== */
        .alert-success {
            background: rgba(25, 135, 84, 0.1);
            border: 1px solid rgba(25, 135, 84, 0.3);
            border-left: 4px solid #198754;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            color: #75fb93;
        }

        /* ===== TABLE SECTION ===== */
        .table-section {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
            /* scrollable on mobile */
            -webkit-overflow-scrolling: touch;
        }

        @media (min-width: 768px) {
            .table-section {
                padding: 24px;
            }
        }

        .table-section h2 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }

        .table-section h2::before {
            content: '';
            width: 4px;
            height: 24px;
            background: var(--primary-gradient);
            border-radius: 2px;
            flex-shrink: 0;
        }

        /* ===== TABLE ===== */
        .table {
            color: #fff;
            margin: 0;
            min-width: 480px;
            /* prevent squishing on mobile */
        }

        .table thead th {
            background: rgba(102, 126, 234, 0.1);
            border-color: var(--glass-border);
            color: #667eea;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.78rem;
            letter-spacing: 0.5px;
            padding: 14px 10px;
            white-space: nowrap;
        }

        .table tbody tr {
            border-color: var(--glass-border);
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.06);
        }

        .table tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            border-color: var(--glass-border);
            font-size: 0.9rem;
        }

        /* ===== BADGES ===== */
        .badge-role {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* ===== BUTTONS ===== */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
            border: none;
            font-size: 0.82rem;
            padding: 6px 12px;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.4);
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(25, 25, 46, 1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        /* Navbar user info — hide on very small screens */
        .navbar-user {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        @media (max-width: 400px) {
            .navbar-user .user-name {
                display: none;
            }
        }
    </style>
</head>

<body>
    {{-- SVG sprite --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="house-fill" viewBox="0 0 16 16">
            <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
        </symbol>
        <symbol id="file-earmark" viewBox="0 0 16 16">
            <path
                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
        </symbol>
        <symbol id="door-closed" viewBox="0 0 16 16">
            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
        </symbol>
    </svg>

    {{-- NAVBAR --}}
    <header class="navbar sticky-top shadow">
        <a class="navbar-brand" href="{{ route('admin') }}">
            <i class="bi bi-people-fill me-2"></i>Social Media
        </a>

        {{-- Mobile hamburger --}}
        <button class="navbar-toggler-custom d-md-none ms-auto me-2" id="sidebarToggle" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>

        {{-- User info --}}
        <div class="navbar-user d-flex align-items-center gap-2">
            <i class="bi bi-person-circle"></i>
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
    </header>

    {{-- Sidebar overlay (mobile tap to close) --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- LAYOUT --}}
    <div class="layout-wrapper">

        {{-- SIDEBAR --}}
        <nav class="sidebar" id="sidebar">
            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                        href="{{ route('posts.index') }}">
                        <svg class="bi">
                            <use xlink:href="#file-earmark" />
                        </svg>
                        Posts
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('security.*') ? 'active' : '' }}"
                        href="{{ route('security.logs') }}">
                        <i class="bi bi-shield-slash text-danger"></i>
                        Security Logs
                    </a>
                </li> --}}
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link logout-btn">
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                            Sign Out
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        {{-- MAIN --}}
        <main class="main-content">
            @yield('main')
            @yield('create')
            @yield('show')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle
        const toggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('open');
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        toggle.addEventListener('click', () => {
            sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
        });
        overlay.addEventListener('click', closeSidebar);

        // Close sidebar when a nav link is tapped on mobile
        sidebar.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) closeSidebar();
            });
        });

        // Auto-hide alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                new bootstrap.Alert(alert).close();
            });
        }, 5000);
    </script>
</body>

</html>
