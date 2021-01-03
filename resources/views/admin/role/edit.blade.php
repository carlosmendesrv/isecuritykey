@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Grupos de Permissão</h1>
            @can('role-edit')
                <a href="{{ route('role.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Voltar
                </a>
            @endcan
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar permissões') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" name="name" value="{{ explode("-",$role->name)[0]}}"
                                           class="form-control">
                                    {{--                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}--}}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permissões:</strong>
                                    <br/>
                                    @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->description }}</label>
                                        <br/>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
