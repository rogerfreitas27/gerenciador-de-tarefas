<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('snippets.head')
</head>

<body>
    @include('snippets.menu')


    <br />
    <section class="busca">
        <div class="container">

            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('usuario.index') }}" method="get">
                        <div class="input-group">

                            <input type="text" name="search" class="form-control"
                                placeholder="Buscar por nome ou email">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class=text-right>
                            <a href="{{ route('novo-usuario') }}">
                                <button type="button" class="btn btn-primary">Novo Usuario</button></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="container">

        <div class="card text-center">
            <div class="card-header">
                <h2>Titulo</h2>
                @include('snippets.error')
                @if (session('mensagem'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('mensagem') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>

            <br />
            <section>
                <div class="container">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>PERFIL</th>
                                            <th>EMAIL</th>
                                            <th>EDITAR</th>
                                            <th>DELETAR</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <th scope="row">{{ $usuario->id }}</th>
                                                <td>{{ $usuario->nome }}</td>
                                                <td>{{ $usuario->relTipoUsuario->nome }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('edita-usuario', $usuario->id) }}"><i
                                                            class="fa fa-lg fa-edit" title="Editar"></i></a></td>
                                                <td>
                                                    <form action="{{ route('deleta-usuario', $usuario->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fa fa-lg fa-trash" title="Deletar"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>


                                </table>

                                <nav aria-label="Paginacao">
                                    <ul class="pagination justify-content-center">

                                        <nav aria-label="Paginacao">

                                            {{ $usuarios->appends([
                                                    'search' => request()->get('search', ''),
                                                ])->links() }}

                                        </nav>

                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
</body>

</html>
