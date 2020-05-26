@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('plans.index')}}">Planos</a>
        </li>
    </ol>
    <h1><a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fas fa-plus-square"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" value="{{$filters['filter'] ?? ''}}" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Preço</td>
                        <td width="170">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{number_format($item->price, 2, ',', '.')}}</td>
                            <td>
                                <a href="{{route('plans.edit', $item->url)}}" class="btn btn-info">EDITAR</a>
                                <a href="{{route('plans.show', $item->url)}}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop