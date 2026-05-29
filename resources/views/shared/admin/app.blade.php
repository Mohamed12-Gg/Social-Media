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
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--glass-border);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Sidebar */
        .sidebar {
            background: rgba(0, 0, 0, 0.4) !important;
            backdrop-filter: blur(10px);
            border-right: 1px solid var(--glass-border) !important;
            min-height: calc(100vh - 56px);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            border-radius: 8px;
            margin: 4px 8px;
            padding: 12px 16px !important;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #fff !important;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: var(--primary-gradient) !important;
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .nav-link svg,
        .nav-link i {
            width: 20px;
            height: 20px;
        }

        /* Main Content */
        main {
            padding: 30px;
        }

        .page-header {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .page-header h1 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            margin: 0;
        }

        /* Alert */
        .alert-success {
            background: rgba(25, 135, 84, 0.1);
            border: 1px solid rgba(25, 135, 84, 0.3);
            border-left: 4px solid #198754;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            color: #75fb93;
        }

        /* Table Section */
        .table-section {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .table-section h2 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-section h2::before {
            content: '';
            width: 4px;
            height: 28px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        /* Table */
        .table {
            color: #fff;
            margin: 0;
        }

        .table thead th {
            background: rgba(102, 126, 234, 0.1);
            border-color: var(--glass-border);
            color: #667eea;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 16px 12px;
        }

        .table tbody tr {
            border-color: var(--glass-border);
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 14px 12px;
            vertical-align: middle;
            border-color: var(--glass-border);
        }

        /* Badges */
        .badge-role {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .badge-user {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .badge-instructor {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        /* User Avatar */
        .user-avatar {
            background: var(--primary-gradient);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content-center;
            font-size: 14px;
            font-weight: 600;
            color: white;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
            border: none;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.4);
        }

        .btn-outline-secondary {
            border-color: var(--glass-border);
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-outline-secondary:hover {
            background: rgba(102, 126, 234, 0.1);
            border-color: var(--accent-color);
            color: #fff;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            main {
                padding: 20px 15px;
            }

            .page-header {
                padding: 20px;
            }

            .table-section {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    {{-- SVG Icons --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="house-fill" viewBox="0 0 16 16">
            <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z">
            </path>
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"></path>
        </symbol>
        <symbol id="file-earmark" viewBox="0 0 16 16">
            <path
                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
            </path>
        </symbol>
        <symbol id="door-closed" viewBox="0 0 16 16">
            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z">
            </path>
            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"></path>
        </symbol>
        <symbol id="list" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
            </path>
        </symbol>
        <symbol id="calendar3" viewBox="0 0 16 16">
            <path
                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z">
            </path>
            <path
                d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
            </path>
        </symbol>
    </svg>

    {{-- Header --}}
    <header class="navbar sticky-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('admin') }}">
            <i class="bi bi-people-fill me-2"></i>Social Media
        </a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu">
                    <svg class="bi">
                        <use xlink:href="#list"></use>
                    </svg>
                </button>
            </li>
        </ul>

        <div class="navbar-nav px-3">
            <span class="text-white-50">
                <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
            </span>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0">
                <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">LMS Platform</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('users.*') ? 'active' : '' }}"
                                    href="{{ route('users.index') }}">
                                    <svg class="bi">
                                        <use xlink:href="#house-fill"></use>
                                    </svg>
                                    Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                                    href="{{ route('posts.index') }}">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark"></use>
                                    </svg>
                                    Posts
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.security.*') ? 'active' : '' }}"
                                    href="{{ route('security.logs') }}">
                                    <i class="bi bi-shield-slash text-danger"
                                        style="font-size: 1.1rem; width: 20px; height: 20px;"></i>
                                    Security Logs
                                </a>
                            </li>

                            <li class="nav-item mt-auto">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link d-flex align-items-center gap-2 border-0 bg-transparent sign-out-btn">
                                        <svg class="bi">
                                            <use xlink:href="#door-closed"></use>
                                        </svg>
                                        Sign out
                                    </button>

                                    <style>
                                        .sign-out-btn:hover {
                                            color: #dc3545 !important;
                                        }
                                    </style>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('main')
                @yield('create')
                @yield('show')
            </main>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
        const rows = document.querySelectorAll('.post-row');

        rows.forEach(row => {

            row.addEventListener('click', () => {

                rows.forEach(r => r.classList.remove('active'));

                row.classList.add('active');

            });

        });
    </script>
</body>

</html>
