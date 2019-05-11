@extends('adminlte::page')

@section('title', 'Visualizar usuário')

@section('content')
    <div class="content row">
        <div class="box box-purple">
            @include('admin.includes.header')
            <div class="box-body">
                @include('admin.usuarios.includes.alerts')
                <input type="hidden" name="_method" value="PUT">
                @include('admin.usuarios._partials.form')
                <form action="{{route('usuarios.destroy', $usuario->id)}}" class="form" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button href="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    </div>
@stop