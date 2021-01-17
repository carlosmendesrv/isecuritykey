@extends('layouts.app')

@section('content')
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                    <form method="POST" action="{{ route('password.email') }}">--}}
    {{--                        @csrf--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                                @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group row mb-0">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                    {{ __('Send Password Reset Link') }}--}}
    {{--                                </button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="#" class="text-dark font-size-22 font-family-secondary">
                                                <i class="mdi mdi-key"></i> <b>{{env('APP_NAME')}}</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Resetar Senha</h1>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <p class="text-muted mb-4">Digite seu endereço de e-mail e enviaremos um e-mail
                                            com instruções para redefinir sua senha.</p>
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="exampleInputEmail">Endereço de Email</label>
                                                <input type="email" class="form-control form-control-user"
                                                       id="exampleInputEmail" placeholder="Endereço de Email">
                                            </div>
                                            <a href="" class="btn btn-success btn-block waves-effect waves-light">
                                                Recuperar senha
                                            </a>
                                        </form>

                                        <div class="row mt-5">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Ja tem conta?
                                                    <a href="{{route('login')}}"
                                                       class="text-muted font-weight-medium ml-1">
                                                        <b>Entrar</b>
                                                    </a>
                                                </p>
                                                <p class="text-muted mb-0">Não tem uma conta? <a
                                                        href="{{route('register')}}"
                                                        class="text-muted font-weight-medium ml-1">
                                                        <b>Cadastre-se</b>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
