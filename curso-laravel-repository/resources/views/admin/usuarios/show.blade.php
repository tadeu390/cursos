@extends('adminlte::page')

@section('title', 'Visualizar usuário')

@section('content_header')
    <h1>
        Visualizar usuário
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('usuarios.index')}}">Usuários</a>
        </li>
        <li>
            <a href="{{route('usuarios.show', $usuario->id)}}" class="active">Visualizar usuário</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                @include('admin.usuarios.includes.alerts')
                <input type="hidden" name="_method" value="PUT">
                @include('admin.usuarios._partials.form')
            </div>
            <form action="{{route('usuarios.destroy', $usuario->id)}}" class="form" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button href="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
@stop