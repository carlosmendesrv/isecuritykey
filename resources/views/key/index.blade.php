@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Senhas</h1>
                <a href="{{ route('group.key.create',$group) }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Nova Senha
                </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Senhas') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Data</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(@$keys as $key)
                            <tr>
                                <td>{{$key->title}}</td>
                                <td>{{ $key->is_private ? 'Privada':'Publica' }}</td>
                                <td>{{ date_format( $key->created_at, 'd/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{route('group.key.show',[$group,$key->id])}}"
                                       class="btn btn-info">
                                        Visualizar
                                    </a>
                                    <form method="POST"
                                          action="{{ route('group.key.destroy',[$group,$key->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection