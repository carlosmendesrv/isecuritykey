@extends('layouts.panel')

@section('content')

    <div class="container">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Usuários</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a
                            href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>
            </div>
        </div>
        <div class="text-right">
                <a href="{{ route('user.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Voltar
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
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" autocomplete="new-password"
                                           value="{{ old('password') }}" class="form-control"
                                           required>
                                </div>

                                <div class="form-group row">
                                    <strong>Role:</strong>
                                    <select name="roles" class="form-control">
                                        @foreach($roles as $role)
                                            <option name="roles"
                                                    value="{{$role}}"> {{ explode("-",$role)[0] }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
