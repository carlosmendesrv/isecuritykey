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
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--                <!-- Left Side Of Navbar -->--}}
        {{--                @auth--}}
        {{--                    <ul class="navbar-nav mr-auto">--}}
        {{--                        @can('user-create')--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" href="{{ route('user.index') }}">{{ __('Usuários') }}</a>--}}
        {{--                            </li>--}}
        {{--                        @endcan--}}
        {{--                        @can('category-create')--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" href="{{ route('category.index') }}">{{ __('Categorias') }}</a>--}}
        {{--                            </li>--}}
        {{--                        @endcan--}}
        {{--                        @can('group-create')--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" href="{{ route('group.index') }}">{{ __('Grupo para Senha') }}</a>--}}
        {{--                            </li>--}}
        {{--                        @endcan--}}
        {{--                        @can('role-create')--}}
        {{--                            <li>--}}
        {{--                                <a class="nav-link" href="{{ route('role.index') }}">Grupo de Permissão</a>--}}
        {{--                            </li>--}}
        {{--                        @endcan--}}
        {{--                    </ul>--}}
        {{--            @endauth--}}
        {{--            </div>--}}
    </div>
</nav>
<main class="py-4">
    @yield('content')
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
