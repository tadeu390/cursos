@extends('adminlte::page')

@section('title', 'Listagem de usuários')

@section('content_header')
    <h1>
        Usuários
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin')}}">Dashboafdgdrd</a>
        </li>
        <li>
            <a href="{{route('usuarios.index')}sdf}" class="active">Usuários</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <form action="{{route('usuarios.search')}}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" value="{{$data['name'] ?? ''}}" placeholder="Nome" name="name" class="form-control">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                    @if(isset($data))
                        <a href="{{route('usuarios.index')}}" class="btn btn-warning">Limpar filtros</a>
                    @endif
                </form>
                <br />
                <a href="{{route('usuarios.create')}}" class="btn btn-success">Adicionar</a>
            </div>
        </div>
        <div class="box box-success">
            <div class="box-body">
                @include('admin.usuarios.includes.alerts')
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href="{{route('usuarios.edit', $item->id)}}" class="badge bg-yellow">Editar</a>
                                    <a href="{{route('usuarios.show', $item->id)}}" class="badge bg-yellow">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(isset($data))
                    {!! $usuarios->appends($data)->links() !!}
                @else
                    {!! $usuarios->links() !!}
                @endif
            </div>
        </div>
    </div>
@stop