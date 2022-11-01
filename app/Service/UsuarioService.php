<?php

namespace App\Service;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\TipoUsuario;
use App\Models\UsuarioTarefa;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioService {
      private Usuario $userModel;
  
  public function __construct(Usuario $usuarioModel) 
  {   $this-> usuarioModel =  $usuarioModel; }

  public function findAll()   {  
         $usuarios = $this->usuarioModel = Usuario::all();
         return $usuarios;
        }

  public function findById($id){   return Usuario::find($id);   }

  public function findAllPagination(Request $request){
         $search = $request->search;
         $usuarios = Usuario::where(function($query) use($search){
         if($search){
         $query ->where('nome','LIKE',"%{$search}%");
         $query ->orwhere('email','LIKE',"%{$search}%");
        }
       })->paginate(5);
       return $usuarios;

}


public function saveUser(Request $request){  
       $data = $request->all();
       $data['password']=bcrypt($request->password);
       $usuario =  Usuario::create($data); 
       return $usuario; 
   }

public function updateUser(Usuario $usuario,Request $request){ 
       if (!$request->password) { unset($request['password']); }
       else
       $request['password']= bcrypt($request->password);
       $usuario->update($request->all());
       return $usuario;       
      }

public function loadUsuarioTarefaRemove($id){
      $data = DB::table('usuarios')
      ->join('tarefa_usuarios', 'usuarios.id', '=', 'tarefa_usuarios.usuario_id')
      ->join('tarefas', 'tarefas.id', '=', 'tarefa_usuarios.tarefa_id')
      ->select('usuarios.id AS usuario', 'usuarios.nome', 'tarefa_usuarios.id')
      ->where('tarefa_usuarios.tarefa_id','=',"{$id}")
      ->get();
      return $data;
  }


public function loadUsuarioTarefaAddDev($id){
     $dados = UsuarioTarefa::find($id);
     dd($dados);

}

public function delete($id){
     Usuario::findOrFail($id)->delete();
}
     













}