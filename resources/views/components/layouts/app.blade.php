<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md bg-white shadow-sm border-bottom py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo login light mode.png') }}" 
                         alt="Logo SMK Plus Pelita"
                         class="img-fluid"
                         style="height: 40px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav me-auto"></ul>

        <div class="bg-white border-bottom py-3">
            <div class="container d-flex gap-3 flex-wrap mx-4">

                <a href="{{ url('dashboard') }}"
                   class="btn {{ request()->routeIs('dashboard') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Dashboard
                </a>
                
                <a href="{{ route('user') }}"
                   class="btn {{ request()->routeIs('dashboard') ? 'btn-primary' : 'btn-outline-primary' }}">
                    User
                </a>


                <a href="{{ route('produk') }}"
                   class="btn {{ request()->routeIs('produk') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Produk
                </a>

                <a href="{{ route('transaksi') }}"
                   class="btn {{ request()->routeIs('transaksi') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Transaksi
                </a>

                <a href="{{ route('laporan') }}"
                   class="btn {{ request()->routeIs('laporan') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Laporan
                </a>

            </div>
        </div>
                    <ul class="navbar-nav ms-auto align-items-center">

                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus"></i> Register
                                </a>
                            </li>
                            @endif

                        @else

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                                   href="#" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle fs-5"></i>
                                    <strong>{{ Auth::user()->name }}</strong>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                    <li>
                                        <a class="dropdown-item text-danger"
                                           href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </a>
                                    </li>
                                </ul>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        @endguest

                    </ul>
                </div>

            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                {{ $slot }}
            </div>
        </main>

    </div>
</body>
</html>
