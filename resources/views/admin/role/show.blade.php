@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Grupos de Permissão</h1>
            @can('role-create')
                <a href="{{ route('role.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Voltar
                </a>
            @endcan
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de permissões') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Grupo {{ explode("-",$role->name)[0]  }}</strong>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Lista de Permissões:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $permission)
                                            <br>{{ $permission->description }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
