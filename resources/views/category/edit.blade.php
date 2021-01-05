@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
            <a href="{{ route('group.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Nova Categoria
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

                        <form method="POST" action="{{route('category.update',$category->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="container">
                            <div class="form-group row">
                                <label for="name">Nome</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name"
                                       autofocus required>
                            </div>

                            <div class="form-group row">
                                <label for="email">Anotação</label>
                                <textarea name="notes" value="{{ $category->notes }}" class="form-control"></textarea>

                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
