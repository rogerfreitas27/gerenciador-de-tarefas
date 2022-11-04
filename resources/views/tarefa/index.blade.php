<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('snippets.head')
  </head>
  <body>
    @include('snippets.menu')
  



<br/>
<section class="busca">
<div class="container">

<div class="row">  
    <div class="col-md-7">
      <form action="{{route('tarefa.index')}}" method="get">
        <div class="input-group">
          
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome ">
            <div class="input-group-append">
              <button type="submit"  class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>   
            </div>
          
          </div></form>
    </div> 
    <div class="col-md-4">
        <div class="form-group">
          @can('access-menu-usuario')   <div class=text-right>
          <a href="{{ route('cadastro-tarefa') }}" >
            <button type="button" class="btn btn-primary">Nova Tarefa</button
            ></a>
        </div> @endcan
    </div>
</div>

    
  </div>
</div>
</section>


<br/>
<section>
<div class="container">
<div class="card">
    <div class="card-body">
      
      
      <div class="table-responsive">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>NOME</th>
              <th>STATUS</th>
              
              <th>EDITAR</th>
  @can('access-menu-usuario') <th>DELETAR</th>
                             <th>ADD DEV</th>
                              <th>REMOVE DEV</th> @endcan
            </tr>
          </thead>
		  
          <tbody>
            @foreach($tarefas as $tarefa)
            <tr >
              <th scope="row">{{ $tarefa->nome}}</th>
              <td>{{ $tarefa->status }}</td>
              
              <td><a class="btn btn-primary"  href="{{ route('edita-tarefa',$tarefa->id) }}"  ><i class="fa fa-lg fa-edit"
                    title="Editar"></i></a></td>              
                    @can('access-menu-usuario')         <td>
                <form action="{{ route('deleta-tarefa',$tarefa->id) }}" method="POST">  
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"
                    title="Deletar"></i></button>            
                   </form>
                  </td>
                  
                  
                  
                  
                  
                    <td> <a class="btn btn-success"  href="{{ route('view-tarefaAddDev',$tarefa->id) }}"> <i class="fa fa-lg fa-plus"
                      title="Deletar"></i></a>  </td>
                      
                      
                      
                      
                      <td> <a class="btn btn-danger"  href="{{ route('view-tarefaRemoveDev',$tarefa->id) }}" > <i class="fa fa-lg fa-minus"
                        title="Deletar"></i></a>    </td> @endcan
            </tr>           
          @endforeach
            
            
            

           </tbody>
		   
          
        </table>
 
        <nav aria-label="Paginacao">
          <ul class="pagination justify-content-center">

            <nav aria-label="Paginacao">
              {{ $tarefas->appends([
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
