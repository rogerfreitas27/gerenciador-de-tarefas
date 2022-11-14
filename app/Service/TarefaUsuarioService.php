<?php

namespace App\Service;

use App\Models\TarefaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefaUsuarioService
{

    public function delete($id)
    {
        TarefaUsuario::findOrFail($id)->delete();
    }

    public function findUserTarefa($id, $tarefas)
    {
        $data = DB::table('tarefa_usuarios')
            ->select('id')
            ->where('user_id', '=', "{$id}")
            ->orwhereIn('tarefa_id', explode(" ", $tarefas))->get()
            ->count();
        return $data;
    }

    public function save($dados)
    {
        $tarefaUsuario = TarefaUsuario::create($dados);
        return  $tarefaUsuario;
    }
}
