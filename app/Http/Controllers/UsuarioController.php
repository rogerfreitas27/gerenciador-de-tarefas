<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;
use App\Service\UserService;
use  App\Http\Requests\CriarAtualizarUsuarioFormRequest;          


class UsuarioController extends Controller

{  
  private TipoUsuario $tipoUsuarioModel;
  private UserService $usuarioService;
  public function __construct( UserService $usuarioService,TipoUsuario $tipoUsuarioModel) 
  {
      $this-> tipoUsuarioModel =  $tipoUsuarioModel;
      $this-> usuarioService =  $usuarioService;
  }
  
  
  function index(Request $request){  
    try {        
        $usuarios =  $this-> usuarioService->findAllPagination($request);
        return view('usuario/index', compact('usuarios'));
    }catch (Exception $e) {
      return view('usuario/index')->with('error',$e->getMessage());
    }
    }

    function viewCadastrar(){
      try { 
      $tipoUsuarios = TipoUsuario::get();             
          return view('usuario.cadastro',compact('tipoUsuarios'));
        }catch (Exception $e) {
          return view('usuario.cadastro')->with('error',$e->getMessage());
        }
     }


    function cadastrarUsuario(CriarAtualizarUsuarioFormRequest $request){ 
      try {         
              $usuarios =  $this-> usuarioService->saveUser($request);
              return  redirect()->route('usuario.index'); 
              return view('usuario.cadastro')->with('msg','Cadastro realizado com sucesso');
            }catch (Exception $e) {
              return view('usuario.cadastro')->with('error',$e->getMessage());
            }
          }
            

    function viewEditar($id){  
      try {      
            if(!$usuario = $this-> usuarioService->findById($id))  
            return redirect()->route('usuario.index');          
            $tipoUsuarios = TipoUsuario::get();
            return view('usuario.editar',compact('usuario','tipoUsuarios'));
          }catch (Exception $e) {
          return view('usuario.editar')->with('error',$e->getMessage());
          }
    }
                               
    function editarUsuario(CriarAtualizarUsuarioFormRequest $request){     
      
      try { 
             if(!$usuario = $this-> usuarioService->findById($request->id))  
             return redirect()->route('usuario.index');       
             $usuario= $this-> usuarioService->updateUser($usuario,$request);        
            return  redirect()->route('usuario.index');

          }catch (Exception $e) {
            return view('usuario.editar')->with('msg',$e->getMessage());
            }

      }

    function delete($id){
             $this-> usuarioService->delete($id);
             return redirect()->route('usuario.index')->with('msg','Usuario excluido com sucesso');
     }
}
