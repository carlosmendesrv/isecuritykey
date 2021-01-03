@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Grupos de Permissão</h1>
            @can('role-create')
                <a href="{{ route('role.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Novo Grupo
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
                                <th scope="col">Nº</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary"
                                               href="{{ route('role.edit',$role->id) }}">Edit</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
    {!! $roles->render() !!}
@endsection
