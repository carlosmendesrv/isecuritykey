@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a
                            href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                    <li class="breadcrumb-item active">Categoria</li>
                </ol>
            </div>
        </div>
        <div class="text-right">
            <a href="{{ route('category.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Voltar
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Nova Categoria') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{route('category.store')}}">
                            @csrf
                            <div class="container">
                                <div class="form-group row">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                           id="name"
                                           autofocus required>
                                </div>
                                <div class="form-group row">
                                    <label for="email">Anotação</label>
                                    <textarea name="notes" value="{{ old('notes') }}" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
