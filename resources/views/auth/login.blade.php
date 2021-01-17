@extends('layouts.app')

@section('content')
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
                                        <a href="#"
                                           class="text-dark font-size-22 font-family-secondary">
                                            <i class="mdi mdi-key"></i> <b>{{env('APP_NAME')}}</b>
                                        </a>
                                    </div>
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <h1 class="h5 mb-1">Seja Bem Vindo!</h1>
                                    <p class="text-muted mb-4">
                                        Digite seu endereço de e-mail e senha para acessar o painel de
                                        administração.
                                    </p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   id="email" placeholder="Endereço de Email" required
                                                   autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                   class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   id="password" placeholder="Senha" required
                                                   autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"
                                                class="btn btn-primary">
                                            {{ __('Entrar') }}
                                        </button>
                                    </form>

                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <p class="text-muted mb-2">
                                                @if (Route::has('password.request'))
                                                    {{--                                                            <a href="pages-recoverpw.html" --}}
                                                    <a href="{{ route('password.request') }}"
                                                       class="text-muted font-weight-medium ml-1">
                                                        Esqueceu sua senha ?
                                                    </a>
                                                @endif
                                            </p>
                                            <p class="text-muted mb-0">Não tem uma conta ?
                                                <a
                                                    href="{{ route('register') }}"
                                                    class="text-muted font-weight-medium ml-1"><b>Cadastre-se</b>
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
@endsection
