<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry | {{ $title }}</title>
    
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/app-dark.css" />
    <link rel="shortcut icon" href="/img/laundry.png" type="image/png"/>
    <link rel="stylesheet" href="/css/iconly.css" />
</head>

<body class="d-flex flex-column h-100">
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-2 me-2">
                                <a href="/">
                                    <img width="30" src="/img/laundry.png" alt="Logo"/>
                                </a>
                            </div>
                            <div class="col">
                                <h3 class="d-none d-sm-inline">Laundry</h3>
                            </div>
                        </div>
                        <div class="header-top-right">
                            <div class="theme-toggle d-flex align-items-center">
                                <label class="form-check-label me-2 mb-1"><i class="bi bi-sun"></i></label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                </div>
                                <label class="form-check-label mb-1"><i class="bi bi-moon"></i></label>
                            </div>
                            <div class="dropdown">
                                @guest
                                <div class="d-flex">
                                    <a class="btn btn-outline-primary btn-sm me-2 rounded-pill px-4" href="/login">Login</a>
                                </div>
                                @endguest
                                @auth
                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="/img/profile.jpg" alt="Avatar" />
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ auth()->user()->username }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">{{ auth()->user()->roles }}</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                    <li><h6 class="dropdown-header">Halo, {{ auth()->user()->nama }}</h6></li>
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                                @endauth
                            </div>
                            
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item">
                                <a href="/" class="menu-link {{ request()->is('/') ? 'text-light' : '' }}">
                                    <span><i class="bi bi-grid-fill"></i> Home</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/pakets" class="menu-link {{ request()->is('pakets') ? 'text-light' : '' }}">
                                    <span><i class="bi bi-grid-fill"></i> Paket</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/outlets" class="menu-link {{ request()->is('outlets') ? 'text-light' : '' }}">
                                    <span><i class="bi bi-grid-fill"></i> Outlet</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            
            <div class="content-wrapper container flex-shrink-0">
                <div class="page-content">
                    @yield('container')
                </div>
            </div>
            
            <footer class="footer mt-auto py-3">
                <div class="container mt-5">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="text-center">
                            <p>2023 &copy; Hikmah Maulana | SMKN 1 Kragilan</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="/js/bootstrap.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/horizontal-layout.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="/js/jquery.min.js"></script>
</body>
</html>
