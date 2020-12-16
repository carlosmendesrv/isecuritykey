@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Grupos</h1>
                <a href="{{ route('group.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Novo grupo
                </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de grupos') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Anotação</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(@$groups as $group)
                            <tr>
                                <td>{{$group->name}}</td>
                                <td>{{$group->notes}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{route('group.key.index',$group->id)}}"
                                       class="btn btn-info">
                                        Senhas
                                    </a>
                                    <form method="POST"
                                          action="{{ route('group.destroy', $group->id) }}">
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
