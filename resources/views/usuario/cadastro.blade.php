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
           <h2>Cadastro de Usuario</h2>
         @include('snippets.error')
          </div>
          <div class="card-body">
          <form  action="{{route('cadastrarUsuario')}}"  method="post">              
          @include('usuario.form')                
          </form>
        </div>
       
        </div>
    
    </div>
    </section>
</body>
</html>

