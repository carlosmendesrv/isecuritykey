<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

@yield('styles')

<!-- Layout css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/theme.min.css')}}" rel="stylesheet" type="text/css"/>

</head>
<body>
<main class="py-4">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-3.jpg')}}"
                                 alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">{{@Auth::user()->name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                               href="{{route('logout')}}">
                                <span>Sair</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <div class="navbar-brand-box">
                    <a href="{{route('dashboard')}}" class="logo">
                        <i class="mdi mdi-key"></i>
                        <span>{{env('APP_NAME')}}</span>
                    </a>
                </div>
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="{{route('dashboard')}}" class="waves-effect"><i class="feather-airplay"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-folder-key"></i>
                                <span>Senhas</span></a>
                            <ul class="sub-menu" aria-expanded="false">

                                @can('category-create')
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('category.index') }}">{{ __('Categorias') }}</a>
                                    </li>
                                @endcan
                                @can('group-create')
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('group.index') }}">{{ __('Grupo para Senha') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="feather-users"></i>
                                <span>Usuários</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                @can('user-create')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.index') }}">{{ __('Usuários') }}</a>
                                    </li>
                                @endcan
                                @can('role-create')
                                    <li>
                                        <a class="nav-link" href="{{ route('role.index') }}">Grupo de Permissão</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">

                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © {{env('APP_NAME')}}
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by <a href="https://newtechgo.com.br">NewTech</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


</main>

<div class="menu-overlay"></div>
<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/simplebar.min.js')}}"></script>

<!-- Morris Js-->
<script src="{{asset('../plugins/morris-js/morris.min.js')}}"></script>
<!-- Raphael Js-->
<script src="{{asset('../plugins/raphael/raphael.min.js')}}"></script>

<!-- Morris Custom Js-->
<script src="{{asset('assets/pages/dashboard-demo.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/theme.js')}}"></script>
@yield('scripts')
</body>
</html>
