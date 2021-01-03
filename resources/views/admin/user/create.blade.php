@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
            <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Novo Usuário
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Novo Usuário') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')
                        <form method="POST" action="{{route('user.store')}}">
                            @csrf
                            <div class="container">
                                <div class="form-group row">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                           id="name"
                                           autofocus required>
                                </div>

                                <div class="form-group row">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                           required>
                                </div>

                                <div class="form-group row">
                                    <label for="password">Senhar</label>
                                    <input type="password" name="password" autocomplete="new-password"
                                           value="{{ old('password') }}" class="form-control"
                                           required>
                                </div>

                                <div class="form-group row">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
