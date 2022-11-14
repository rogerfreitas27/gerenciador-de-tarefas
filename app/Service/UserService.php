<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TipoUsuario;
use App\Models\TarefaUsuario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserService
{
       private User $userModel;

   

    public function findAll()
    {
           $usuarios  = User::all();
           return $usuarios;
    }

    public function findById($id)
    {
           return User::find($id);
    }

    public function findAllPagination(Request $request)
    {
           $search = $request->search;
           $usuarios = User::where(function ($query) use ($search) {
                if ($search) {
                       $query->where('nome', 'LIKE', "%{$search}%");
                       $query->orwhere('email', 'LIKE', "%{$search}%");
                }
           })->paginate(5);
           return $usuarios;
    }

    public function saveUser(Request $request)
    {
           $data = $request->all();
              // $data['password']=bcrypt($request->password);
           $usuario =  User::create($data);
           return $usuario;
    }

    public function updateUser(User $usuario, Request $request)
    {
           if (!$request->password) {
                  unset($request['password']);
           } else
                  $request['password'] = bcrypt($request->password);
                  $usuario->update($request->all());
                  return $usuario;
    }

    public function loadUsuarioTarefaRemove($id)
    {
           $data = DB::table('users')
                   ->join('tarefa_usuarios', 'users.id', '=', 'tarefa_usuarios.user_id')
                   ->join('tarefas', 'tarefas.id', '=', 'tarefa_usuarios.tarefa_id')
                   ->select('users.id AS usuario', 'users.nome', 'tarefa_usuarios.id')
                   ->where('tarefa_usuarios.tarefa_id', '=', "{$id}")
                   ->get();
           return $data;
   }


   public function loadUsuarioTarefaAddDev($id)
   {
          $data = DB::table('tarefa_usuarios')
                 ->select('tarefa_usuarios.user_id')
                 ->where('tarefa_id', '=', "{$id}")
                 ->distinct()
                 ->get();
          return $result = User::whereNotIn('id', $this->converterArrayDeObetosEmArrayDeInteiros($data))->get();
   }

   public function converterArrayDeObetosEmArrayDeInteiros($data)
   {
          $qtd = count($data);
          $dados = array();
          for ($i = 0; $i < $qtd; $i++) {
                 $dados[] =  $data[$i]->user_id;
          }
          return $dados;
   }

   public function delete($id)
   {
          User::findOrFail($id)->delete();
   }
}
