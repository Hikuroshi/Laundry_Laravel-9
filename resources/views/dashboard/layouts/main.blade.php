<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry | {{ $title }}</title>
    
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/app-dark.css" />
    <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="/css/datatables.css" />
    <link rel="stylesheet" href="/css/iconly.css" />
    
    <link rel="shortcut icon" href="/img/laundry.png" type="image/png"/>
</head>

<body>
    <script src="/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="p-4 pt-5 pb-3 position-relative ">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-2 mx-3">
                            <a href="/">
                                <img class="img-fluid" src="/img/laundry.png" alt="Logo"/>
                            </a>
                        </div>
                        <div class="col">
                            <h3 class="d-inline">Laundry</h3>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        @can('Admin')
                        <li class="sidebar-item {{ request()->is('dashboard/outlets*') ? 'active' : '' }}">
                            <a href="/dashboard/outlets" class="sidebar-link">
                                <i class="bi bi-houses-fill"></i>
                                <span>Outlet</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item {{ request()->is('dashboard/pakets*') ? 'active' : '' }}">
                            <a href="/dashboard/pakets" class="sidebar-link">
                                <i class="bi bi-stack"></i>
                                <span>Paket / Produk</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item {{ request()->is('dashboard/users*') ? 'active' : '' }}">
                            <a href="/dashboard/users" class="sidebar-link">
                                <i class="bi bi-person-fill-gear"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item {{ request()->is('dashboard/members*') ? request()->is('dashboard/members/create') ? '' : 'active' : '' }}">
                            <a href="/dashboard/members" class="sidebar-link">
                                <i class="bi bi-people-fill"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>
                        @endcan
                        @can('Kasir')
                        <li class="sidebar-item {{ request()->is('dashboard/members/create') ? 'active' : '' }}">
                            <a href="/dashboard/members/create" class="sidebar-link">
                                <i class="bi bi-person-fill-add"></i>
                                <span>Registrasi Pelanggan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('dashboard/transaksis*') ? 'active' : '' }}">
                            <a href="/dashboard/transaksis" class="sidebar-link">
                                <i class="bi bi-cart-fill"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class="layout-navbar navbar-fixed">
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="mx-auto">
                                <div class="theme-toggle d-flex align-items-center">
                                    <label class="form-check-label me-2 mb-1"><i class="bi bi-sun"></i></label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                    </div>
                                    <label class="form-check-label mb-1"><i class="bi bi-moon"></i></label>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->username }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->roles }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/img/profile.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
                                    <li><h6 class="dropdown-header">Halo, {{ auth()->user()->nama }}</h6></li>
                                    <li><a class="dropdown-item" href="/"><i class="icon-mid bi bi-house me-2"></i> Home</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="/logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="col-md-4 m-auto">
                    @if(session()->has('success'))
                    <div class="alert alert-success text-center" id="notify">{{ session('success') }}</div>
                    @endif
                </div>
                
                @yield('container')
            </div>
            
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="text-center">
                        <p>2023 &copy; Hikmah Maulana | SMKN 1 Kragilan</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    
    <script src="/js/bootstrap.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/datatables.min.js"></script>
    <script src="/js/datatables.js"></script>
    
    @if (request()->routeIs('transaksis.show'))
    <script src="/js/jspdf.debug.js"></script>
    <script src="/js/html2canvas.min.js"></script>
    @endif
</body>
</html>
