<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;
use App\Service\UsuarioService;
use  App\Http\Requests\CriarAtualizarUsuarioFormRequest;          


class UsuarioController extends Controller

{  
  private TipoUsuario $tipoUsuarioModel;
  private UsuarioService $usuarioService;
  public function __construct( UsuarioService $usuarioService,TipoUsuario $tipoUsuarioModel) 
  {
      $this-> tipoUsuarioModel =  $tipoUsuarioModel;
      $this-> usuarioService =  $usuarioService;
  }
  
  
  function index(Request $request){          
        $usuarios =  $this-> usuarioService->findAllPagination($request);
        return view('usuario/index', compact('usuarios'));
    }

    function viewCadastrar(){
          $tipoUsuarios = TipoUsuario::get();             
          return view('usuario.cadastro',compact('tipoUsuarios'));
     }


    function cadastrarUsuario(CriarAtualizarUsuarioFormRequest $request){         
              $usuarios =  $this-> usuarioService->saveUser($request);
              return  redirect()->route('usuario.index');      }

    function viewEditar($id){       
            if(!$usuario = $this-> usuarioService->findById($id))  
            return redirect()->route('usuario.index');          
            $tipoUsuarios = TipoUsuario::get();
            return view('usuario.editar',compact('usuario','tipoUsuarios'));
    }
                               
    function editarUsuario(CriarAtualizarUsuarioFormRequest $request){             
             if(!$usuario = $this-> usuarioService->findById($request->id))  
             return redirect()->route('usuario.index');       
             $usuario= $this-> usuarioService->updateUser($usuario,$request);        
            return  redirect()->route('usuario.index');
      }

    function delete($id){
             $this-> usuarioService->delete($id);
             return redirect()->route('usuario.index')->with('msg','Usuario excluido com sucesso');
     }
}
