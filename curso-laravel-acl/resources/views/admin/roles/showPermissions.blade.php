@extends('adminlte::page')

@section('title', 'Editar permissões da função')

@section('content')
    <div class="content row">
        <div class="box box-purple">
            @include('admin.includes.header_form')
            <div class="box-body">
                @include("admin.roles.includes.alerts")
                <form action="{{route('roles.updatePermissions', $role->id)}}" class="form" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input readonly="readonly" type="text" id="name" value="{{$role->name ?? old('name')}}" name="name" class="form-control">
                    </div>
                    <fieldset class="p-2 border-fieldset">
                        <legend class="p-2">Permissões</legend>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Descrição</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->label}}</td>
                                    <td>
                                        <?php $checked = ""; ?>
                                        @foreach ($role->permissions as $item2)
                                            <?php if($item2->id == $item->id) $checked = "checked"; ?>
                                        @endforeach
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" <?php echo $checked; ?> class="custom-control-input" value="{{$item->id}}" id="permission_id{{$item->id}}" name="permissions[]">
                                            <label class="custom-control-label" for="permission_id{{$item->id}}"></label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                    <br />
                    <div class="form-group">
                        <button type="submit" class="btn btn-purple">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop