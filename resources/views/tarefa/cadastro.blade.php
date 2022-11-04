<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('snippets.head')
</head>

<body>
    @include('snippets.menu')

    <section class="espaco">
        <div class="container">

            <div class="card text-center">
                <div class="card-header">
                    <h2>
                        @if (isset($tarefa))
                            Editar
                        @else
                            Cadastrar
                        @endif
                    </h2>
                    @include('snippets.error')
                    @if(session('mensagem'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>{{session('mensagem')}}</strong>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                   @endif
                </div>
                <div class="card-body">


                    @if (isset($tarefa))
                        <form action="{{ route('editarTarefa') }}" method="post">
                            @method('PUT')
                            <input type="hidden" value="{{ $tarefa->id }}" id="" name="projeto_usuario_id">
                        @else
                            <form action="{{ route('cadastrarTarefa') }}" method="post">
                    @endif
                    @csrf














                    <br />
                    <input type="hidden" id="id" name="id" value="{{ $tarefa->id ?? old('id') }}"
                        >
                    @csrf
                    <div class="row">

                        
                        <div class="col-md-4"> @can('access-menu-usuario') 
                            <label for="nome_marca">Projeto:</label>
                            <div class="input-group">
                                <select class="form-select" name="projeto_id" aria-label="Default select example">
                                    @foreach ($projetos as $item)
                                        @if (isset($tarefa) && $item->id == $tarefa->id)
                                            <option value={{ $item->id }} selected>{{ $item->nome }}</option>
                                        @endif
                                        <option value={{ $item->id ?? old('projeto_id') }}>{{ $item->nome ?? '' }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>




                            @endcan  </div>

                        <div class="col-md-4">
                            <label for="nome_marca">Status:</label>
                            <div class="input-group">
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="{{ $tarefa->status ?? old('status') }}" selected>
                                        {{ $tarefa->status ?? old('status') }}</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Pendente">Pendente</option>
                                    <option value="Concluido">Concluido</option>
                                </select>

                            </div>




                        </div>




                        <div class="col-md-4"> @can('access-menu-usuario')
                            <label for="nome_marca">Nome:</label>
                            <input type="text" class="form-control" value="{{ $tarefa->nome ?? old('nome') }}"
                                name="nome" placeholder="Cadastrar tarefa">
                                @endcan   </div>



                    </div>


                    <br />@can('access-menu-usuario')
                    <div class="row">
                        <div class="col-md-12">

                            <label for="descricao" class="form-label">Descricao</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="5">{{ $tarefa->descricao ?? old('descricao') }}</textarea>


                        </div>

                    </div>  @endcan 
                    <br />

                    <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>
                </div>
                <br />
            </div>

        </div>
    </section>
</body>

</html>
