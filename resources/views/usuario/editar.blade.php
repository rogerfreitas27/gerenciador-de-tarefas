<!DOCTYPE html>
<html>

<head>
  @include('snippets.head')
</head>
<body>
@include('snippets.menu')
<section class="espaco">
    <div class="container">
    
        <div class="card text-center">
          <div class="card-header">
           <h2>Titulo</h2>
           @include('snippets.error')


           @if (isset($error))                     
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{$error}}</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>              
           @endif




           @if (isset($msg))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$msg}}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>       
                            
           @endif



          </div>
          <div class="card-body">
          <form  action="{{route('editarUsuario')
        
        }}"  method="post">
              @method('PUT')
      
            @include('usuario.form')           
                   
              
          </form>
        </div>
       
        </div>
    
    </div>
    </section>
</body>
</html>

