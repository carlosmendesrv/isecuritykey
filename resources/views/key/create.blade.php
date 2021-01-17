@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Senhas</h1>
            <a href="{{ route('group.key.index',$group) }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Voltar
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Nova Senha') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        <form method="POST" action="{{route('group.key.store',$group)}}">
                            @csrf
                            <div class="container">
                                <div class="form-group row">
                                    <label for="title">Titulo</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                           id="title"
                                           autofocus required>
                                </div>

                                <div class="form-group row">
                                    <label for="email">Usuário</label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                                           required>
                                </div>

                                <div class="form-group row">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" autocomplete="new-password"
                                           value="{{ old('password') }}" class="form-control"
                                           required>
                                </div>

                                <div class="form-group row">
                                    <label for="password">Confirmação de Senha</label>
                                    <input type="password" name="password_confirmation" autocomplete="new-password"
                                           value="{{ old('password_confirmation') }}" class="form-control"
                                           required>
                                </div>

                                <div class="form-group row">
                                    {!! Form::Label('category_id', 'Categorias:') !!}
                                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group row">
                                    <label for="url">Url</label>
                                    <input type="string" name="url" placeholder="https://www.gmail.com" autocomplete="url" value="{{ old('url') }}"
                                           class="form-control">
                                </div>

                                <div class="form-group row">
                                    <label for="url">Anotação</label>
                                    <textarea name="notes" value="{{ old('notes') }}" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input  name="is_private" value="1" class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Privado
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
