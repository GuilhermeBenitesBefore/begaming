<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BeGaming</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap.min.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container-fluid">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                    <ul class="navbar-nav navbar-nav-left">

                    </ul>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="{{ url('/') }}"><img src="/images/logo.svg"
                                                                                      alt="BeGaming"/></a>
                        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img
                                src="/images/logo-mini.svg" alt="logo"/></a>
                    </div>
                    <ul class="navbar-nav navbar-nav-right">

                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                 aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </div>
        </nav>
        <nav class="bottom-navbar">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('points.index') }}">
                            <i class="mdi mdi-clipboard-check menu-icon"></i>
                            <span class="menu-title">Pontuações</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="mdi mdi-trophy menu-icon"></i>
                            <span class="menu-title">Badges</span>
                        </a>

                        <div class="submenu">
                            <ul>
                                @if(Auth::user()->isAdmin)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('points.store') }}">Pontuar
                                        </a></li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('badges.store') }}">Cadastrar Badge
                                        </a></li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('badges.index') }}">Badges
                                        </a></li>
                                @endif
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('badges.ranking') }}">Ranking
                                        </a></li>
                            </ul>
                        </div>
                    </li>

                    @if(Auth::user()->isAdmin)
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="mdi mdi-account menu-icon"></i>
                                <span class="menu-title">Colaboradores</span>
                            </a>

                            <div class="submenu">
                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('users.store') }}">Cadastrar Colaborador
                                        </a></li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('users.index') }}">Colaboradores
                                        </a></li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('js/template.js') }}"></script>
<!-- endinject -->
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/raphael-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/justgage.js') }}"></script>
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
</div>
</body>
</html>
