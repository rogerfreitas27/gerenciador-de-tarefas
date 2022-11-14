<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/projeto">Gerenciador</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/projeto">Projetos</a>
                <a class="nav-link" href="/tarefa">Tarefas</a>
                @can('access-menu-usuario')
                    <a class="nav-link" href="/usuario">Usuarios</a>
                @endcan
            </div>
        </div>
        <form action="{{ route('logout') }}" method="get" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="hidden" placeholder="Pesquisar" aria-label="Pesquisar">

            <button class="btn btn-primary" type="submit">logout</button>

        </form>
    </div>
</nav>
