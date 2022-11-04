<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    @include('snippets.head')
  </head>
<body>
    @include('snippets.menu')

</body>

<br/>
<section class="busca">
<div class="container">

<div class="row">  
  @can('access-pesquisa-projeto')     <div class="col-md-7">
      <form action="{{route('projeto.index')}}" method="get">
        <div class="input-group">
          
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome">
            <div class="input-group-append">
              <button type="submit"  class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>   
            </div>
          
          </div></form>
    </div> @endcan
    <div class="col-md-4">
        <div class="form-group">
          @can('access-menu-usuario')      <div class=text-right>
          <a href="{{ route('cadastro-projeto') }}" >
            <button type="button" class="btn btn-primary">Novo Projeto</button
            ></a>       
        </div>@endcan
    </div>
</div>

    
  </div>
</div>
</section>


<br/>
<section>
<div class="container">
<div class="card">

  <div class="card-header">
    
    @include('snippets.error')
    @if(session('mensagem'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>{{session('mensagem')}}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
</div>
    <div class="card-body">
      
      
      <div class="table-responsive">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOME</th>
              <th>PERCENTUAL</th>
              @can('access-menu-usuario')     <th>EDITAR</th> 
              <th>DELETAR</th> @endcan
              <!-- <th>EXCLUIR</th> -->
            </tr>
          </thead>
		  
          <tbody>
            @foreach($projetos as $projeto)
            <tr >           
            <th scope="row">{{ $projeto->id }}</th>
            <td>{{ $projeto->nome }}</td>
            <td><progress value="{{ $projeto->Qtd_tarefas_concluidas }}" max="{{ $projeto->Qtd_tarefas }}"></progress></td>                        
            @can('access-menu-usuario') 
             <td>
                  <a class="btn btn-primary"  href="{{ route('edita-projeto',$projeto->id) }}"  ><i class="fa fa-lg fa-edit"
                    title="Editar"></i></a>
                    </td>               
              <td> 
                <form action="{{ route('deleta-projeto',$projeto->id) }}" method="POST">  
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"
                    title="Deletar"></i>
                  </button>            
                     </form>   
              </td> @endcan
            </tr>           
          @endforeach
            
            
           

           </tbody>
		   
          
        </table>
 
        <nav aria-label="Paginacao">
          <ul class="pagination justify-content-center">

            <nav aria-label="Paginacao">
              {{ $projetos->appends([
                'search'=>request()->get('search','')
               ])->links() }}
            </nav>

          </ul>
        </nav>

      </div>
    </div>
  </div>
</div>
</section>
</html>