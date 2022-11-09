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

    public function __construct(UserService $usuarioService, TipoUsuario $tipoUsuarioModel) 
    {
      $this-> tipoUsuarioModel =  $tipoUsuarioModel;
      $this-> usuarioService =  $usuarioService;
    }
  
  
    public function index(Request $request)
    {  
        try {        
              $usuarios =  $this-> usuarioService->findAllPagination($request);
              return view('usuario/index', compact('usuarios'));
        } catch (Exception $e) {
               return view('usuario/index')->withErrors($e->getMessage());
        }
    }

    public function viewCadastrar()
    {
        try { 
               $tipoUsuarios = TipoUsuario::get();             
               return view('usuario.cadastro',compact('tipoUsuarios'));
        } catch (Exception $e) {
                return view('usuario.cadastro')->withErrors($e->getMessage());
        }
    }

    public function cadastrarUsuario(CriarAtualizarUsuarioFormRequest $request)
    { dd($request);
         try {         
                $usuarios =  $this-> usuarioService->saveUser($request);
                return  redirect()->route('usuario.index'); 
                return view('usuario.cadastro')->with('mensagem','Cadastro realizado com sucesso');
         } catch (Exception $e) {
                return view('usuario.cadastro')->withErrors($e->getMessage());
         }
    }
            

    public function viewEditar($id)
    {  
        try {      
               if(!$usuario = $this-> usuarioService->findById($id))  
               return redirect()->route('usuario.index');          
               $tipoUsuarios = TipoUsuario::get();
               return view('usuario.editar',compact('usuario','tipoUsuarios'));
        } catch (Exception $e) {
               return view('usuario.editar')->withErrors($e->getMessage());
        }
    }
                               
    public function editarUsuario(CriarAtualizarUsuarioFormRequest $request)
    {           
        try { 
               if(!$usuario = $this-> usuarioService->findById($request->id))  
               return redirect()->route('usuario.index');       
               $usuario= $this-> usuarioService->updateUser($usuario,$request);        
              return  redirect()->route('usuario.index')->with('mensagem','Cadastro atualizado com sucesso');
        } catch (Exception $e) {
            return view('usuario.editar')->withErrors($e->getMessage());
        }

    }

    public function delete($id)
    {
        try { 
               $this-> usuarioService->delete($id);
               return redirect()->route('usuario.index')->with('mensagem','Usuario excluido com sucesso');
        } catch (Exception $e) {
              return view('usuario.index')->withErrors($e->getMessage());
        }
    }
}
