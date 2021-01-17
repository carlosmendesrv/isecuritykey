@extends('layouts.panel')

@section('styles')
    <link href="{{ asset('//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Senhas</h1>
            <a href="{{ route('group.key.create',$group) }}"
               class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Nova Senha
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Senhas') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')
                        @if(!count($keys))
                            <h5 class="text-center"> Ops! Não encontramos uma senha cadastrada para esse grupo.</h5>
                        @else
                            <table id="myTable" class="display">
                                <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(@$keys as $key)
                                    <tr>
                                        <td>{{$key->title}}</td>
                                        <td>{{$key->category->name}}</td>
                                        <td>{{ $key->is_private ? 'Privada':'Publica' }}</td>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js') }}" defer></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
                }
            });
        });
    </script>
@endsection
