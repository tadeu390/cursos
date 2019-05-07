@extends('adminlte::page')

@section('title', 'Novo usuário')

@section('content_header')
    <h1>
        Cadastrar novo usuário
    </h1>
    
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('usuarios.index')}}">Usuários</a>
        </li>
        <li>
            <a href="{{route('usuarios.create')}}" class="active">Novo usuário</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                @include("admin.usuarios.includes.alerts")
                {{ Form::open(['route' => 'usuarios.store', 'class' => 'form', 'method' => 'POST']) }}
                    @include('admin.usuarios._partials.form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop