@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0 font-size-18">Dashboard</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a
                        href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                <li class="breadcrumb-item active">Grupos de Categoria</li>
            </ol>
        </div>
    </div>
    <div class="text-right">
        <a href="{{ route('group.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Nova Grupo
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
                                    <a href="{{route('group.key.index',$group)}}"
                                       class="btn btn-info">
                                        Senhas
                                    </a>
                                    <form method="POST"
                                          action="{{ route('group.destroy', $group) }}">
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
