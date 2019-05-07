@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')
    <h1>
        Editar usuário
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('usuarios.index')}}">Usuários</a>
        </li>
        <li>
            <a href="{{route('usuarios.edit', $usuario->id)}}" class="active">Editar usuário</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                @include("admin.usuarios.includes.alerts")
                <form action="{{route('usuarios.update', $usuario->id)}}" class="form" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    @include('admin.usuarios._partials.form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop