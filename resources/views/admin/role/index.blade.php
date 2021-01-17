@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Grupos de Permissão</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a
                            href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                    <li class="breadcrumb-item active">Grupos de Permissão</li>
                </ol>
            </div>
        </div>
        <div class="text-right">
            @can('role-create')
                <a href="{{ route('role.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Novo Grupo
                </a>
            @endcan
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de grupos de permissão') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ explode("-",$role->name)[0] }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Visualizar</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary"
                                               href="{{ route('role.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">

                            {!! $roles->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
