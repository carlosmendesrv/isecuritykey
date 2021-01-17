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
                <a href="{{ route('role.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Voltar
                </a>
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
