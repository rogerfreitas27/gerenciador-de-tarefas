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

