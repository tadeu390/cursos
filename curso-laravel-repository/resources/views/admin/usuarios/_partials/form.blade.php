<div class="form-group">
    <input type="text" id="name" value="{{$usuario->name ?? old('name')}}" name="name" placeholder="Nome" class="form-control">
</div>
<div class="form-group">
    <input type="text" id="email" value="{{$usuario->email ?? old('email')}}" name="email" placeholder="E-mail" class="form-control">
</div>
<div class="form-group">
    <input type="password" id="password" name="password" placeholder="Senha" class="form-control">
</div>