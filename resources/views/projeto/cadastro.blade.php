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
                        @if (isset($projeto))
                            Editar
                        @else
                            Cadastrar
                        @endif
                    </h2>


                    @include('snippets.error')
                    @if (session('mensagem'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('mensagem') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                </div>
                <div class="card-body">

                    @if (isset($projeto))
                        <form action="{{ route('editarProjeto') }}" method="post">
                            @method('PUT')
                        @else
                            <form action="{{ route('cadastrarProjeto') }}" method="post">
                    @endif
                    @csrf

                    <input type="hidden" value="{{ $projeto->id ?? '' }}" id="id" name="id">

                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <label for="nome_marca">Nome:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nome"
                                    value="{{ $projeto->nome ?? '' }}" placeholder="Cadastrar projeto">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Salvar</button>


                                </div>
                            </div>






                        </div>
                    </div>


                </div>

                </form>
            </div>
            <br />
        </div>

        </div>
    </section>
</body>

</html>
