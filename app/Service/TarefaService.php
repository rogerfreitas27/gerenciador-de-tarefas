<?php

namespace App\Service;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TarefaService
{



    public function findAll()
    {
           $tarefas = Tarefa::all();
           return $tarefas;
    }


    public function findById($id)
    {
           return Tarefa::find($id);
    }

    public function selectTypeUserAndReturn(Request $request)
    {
           if (Auth::user()->tipo_usuario_id == 1) {
                  return $tarefas = $this->findAllPagination($request);
           }

           $tarefas = $this->findAllPaginationDev($request, Auth::user()->id);
           return $tarefas;
    }

    public function findAllPagination(Request $request)
    {
           $search = $request->search;
           $tarefas = Tarefa::where(function ($query) use ($search) {
                  if ($search) {
                         $query->where('nome', 'LIKE', "%{$search}%");
                  }
           })->paginate(5);
           return $tarefas;
    }


    public function findAllPaginationDev(Request $request, $id)
    {
           $search = $request->search;
           $tarefas = Tarefa::where(function ($query) use ($search) {
                  if ($search) {
                         $query->where('tarefas.nome', 'LIKE', "%{$search}%");
                  }
           })->select('tarefas.id', 'tarefas.nome', 'tarefas.status')
                  ->join('tarefa_usuarios', 'tarefas.id', '=', 'tarefa_usuarios.tarefa_id')
                  ->join('projetos', 'tarefas.projeto_id', '=', 'projetos.id')
                  ->where('tarefa_usuarios.user_id', '=', "{$id}")
                  ->distinct()
                  ->paginate(5);


           return $tarefas;
    }


    public function updaTetarefa(Request $request)
    {
           $tarefa = Tarefa::find($request->id);
           $tarefa->update($request->all());
           return $tarefa;
    }



    public function saveTarefa(Request $request)
    {
           $data = $request->all();
           $tarefa = Tarefa::create($data);
           return $tarefa;
    }

    public function delete($id)
    {
           Tarefa::findOrFail($id)->delete();
    }

    public function findAllByProject($id)
    {
           $tarefas = DB::table('tarefas')
                  ->select('id')
                  ->where('projeto_id', '=', "{$id}")
                  ->get();
           return $tarefas;
    }
}
