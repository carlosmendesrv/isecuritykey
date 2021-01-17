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
                                        <a href="#" class="text-dark font-size-22 font-family-secondary">
                                            <i class="mdi mdi-key"></i> <b>{{env('APP_NAME')}}
                                            </b>
                                        </a>
                                    </div>
                                    <h1 class="h5 mb-1">Vamos criar sua conta!</h1>
                                    <p class="text-muted mb-4">Preencha o formulario abaixo, levara menos de um
                                        minuto</p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="name" id="name" placeholder="Nome"
                                                       value="{{ old('name') }}"
                                                       class="form-control form-control-user @error('name') is-invalid @enderror"

                                                       required autocomplete="name" autofocus>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="instance" id="instance" placeholder="Empresa"
                                                       value="{{ old('instance') }}" required
                                                       class="form-control form-control-user @error('instance') is-invalid @enderror"
                                                       autocomplete="instance" autofocus>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            @error('instance')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Endereço de Email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password" id="password" placeholder="Senha"
                                                       required
                                                       class="form-control form-control-user @error('password') is-invalid @enderror"
                                                       autocomplete="new-password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password_confirmation"
                                                       class="form-control form-control-user"
                                                       id="password-confirm" placeholder="Confirme sua Senha" required
                                                       autocomplete="new-password">
                                            </div>
                                            @error('password')--}}
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"
                                                class="btn btn-primary">
                                            {{ __(' Registrar Minha Conta') }}
                                        </button>
                                    </form>
                                    <div class="row mt-5">
                                        <div class="col-12 text-center">
                                            <p class="text-muted">Ja tem conta?
                                                <a href="{{route('login')}}"
                                                   class="text-muted font-weight-medium ml-1">
                                                    <b>Entrar</b>
                                                </a>
                                            </p>
                                            <p class="text-muted mb-0">
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
