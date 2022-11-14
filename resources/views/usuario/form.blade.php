<input type="hidden" id="id" name="id" value="{{ $usuario->id ?? old('id') }}" formControlName="id">
@csrf

<div class="row">



    <div class="col-md-6">
        <label for="nome_marca">Perfil:</label>
        <div class="input-group">
            <select class="form-select" name="tipo_usuario_id" aria-label="Default select example">
                <option value={{ $usuario->relTipoUsuario->id ?? old('tipo_usuario_id') }}>
                    {{ $usuario->relTipoUsuario->nome ?? '' }}</option>
                @foreach ($tipoUsuarios as $tipoUsuario)
                    <option value={{ $tipoUsuario->id ?? old('tipo_usuario_id') }}>{{ $tipoUsuario->nome }}</option>
                @endforeach

            </select>
        </div>
    </div>


    <div class="col-md-6">
        <label for="nome_marca">Nome:</label>
        <input type="text" class="form-control" name="nome" value="{{ $usuario->nome ?? old('nome') }}"
            placeholder="Cadastrar Usuario">
    </div>

</div>
<br />
<div class="row">
    <div class="col-md-6">
        <label for="nome_marca">email:</label>
        <input type="email" class="form-control" name="email" value="{{ $usuario->email ?? old('email') }}"
            placeholder="Cadastrar Usuario">
    </div>
    <div class="col-md-6">
        <label for="nome_marca">Senha:</label>
        <input type="password" class="form-control" name="password" placeholder="Cadastrar senha">
    </div>

</div>


<br />

<button type="submit" class="btn btn-primary">Salvar</button>
