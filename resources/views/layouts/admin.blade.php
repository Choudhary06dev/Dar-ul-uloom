<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Admin Portal</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Noto+Nastaliq+Urdu:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-green: #064e3b;
            --accent-gold: #c5a059;
            --sidebar-width: 280px;
            --topbar-height: 70px;
            --bg-light: #f8fafc;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: #1e293b;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: var(--primary-green);
            color: white;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }
        
        #sidebar .sidebar-header {
            padding: 30px 25px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        
        #sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 15px 25px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.2s;
            border-left: 4px solid transparent;
        }
        
        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.08);
            border-left-color: var(--accent-gold);
        }
        
        #sidebar .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        /* Main Content */
        #main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s;
        }
        
        /* Topbar */
        .topbar {
            height: var(--topbar-height);
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .user-dropdown {
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 12px;
            transition: background 0.2s;
        }
        
        .user-dropdown:hover {
            background: #f1f5f9;
        }

        .stat-card {
            border: none;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.02);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }

        .btn-brand {
            background-color: var(--primary-green);
            color: white;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            border: none;
        }
        
        .btn-brand:hover {
            background-color: #043d2e;
            color: white;
        }

        @media (max-width: 992px) {
            #sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
            #main-content { margin-left: 0; }
            #sidebar.active { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    @auth('admin')
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <!-- <h4 class="fw-bold mb-0 tracking-tight" style="color: var(--accent-gold)">Anwaar-e-Mustafa</h4>
            <small class="text-white opacity-50 text-uppercase tracking-widest font-monospace" style="font-size: 10px">Admin Portal</small> -->
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/admin-logo.png') }}" alt="Anwaar-e-Mustafa" class="img-fluid" style="max-height: 60px;">
            </a>
        </div>
        
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.users') ? 'active' : '' }}" href="{{ route('admin.users') }}">
                    <i class="fa-solid fa-users"></i> Manage Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.admissions.*') ? 'active' : '' }}" href="{{ route('admin.admissions.index') }}">
                    <i class="fa-solid fa-file-signature"></i> Admissions
                </a>
            </li>
            <li class="nav-item mt-auto mb-4">
                <a class="nav-link" href="{{ route('frontend.index') }}" target="_blank">
                    <i class="fa-solid fa-globe"></i> Visit Website
                </a>
            </li>
        </ul>
    </nav>
    @endauth('admin')

    <!-- Page Content -->
    <div id="main-content">
        @auth('admin')
        <header class="topbar">
            <div class="d-flex align-items-center">
                <button class="btn d-lg-none" id="sidebar-toggle">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <h5 class="mb-0 fw-bold d-none d-sm-block">@yield('title')</h5>
            </div>
            
            <div class="dropdown">
                <div class="user-dropdown d-flex align-items-center" data-bs-toggle="dropdown">
                    <div class="me-3 text-end d-none d-sm-block">
                        <div class="fw-bold" style="font-size: 0.9rem">{{ Auth::guard('admin')->user()->name }}</div>
                        <div class="text-muted" style="font-size: 0.75rem">Administrator</div>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px; background: var(--accent-gold)">
                        {{ substr(Auth::guard('admin')->user()->name, 0, 1) }}
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-2" style="border-radius: 16px; min-width: 200px">
                    <li><a class="dropdown-item p-2 px-3 rounded-lg" href="{{ route('admin.profile.edit') }}"><i class="fa-solid fa-user-gear me-2 opacity-50"></i> My Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item p-2 px-3 rounded-lg text-danger"><i class="fa-solid fa-power-off me-2 opacity-50"></i> Sign Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </header>
        @endauth('admin')

        <main class="p-4 p-md-5">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });
        }
    </script>
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(inputId + '-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
