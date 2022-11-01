<?php
namespace App\Service;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TarefaService {
      private Tarefa $tarefaModel;


  public function __construct(Tarefa $tarefaModel) 
  {   $this-> tarefaoModel =  $tarefaModel; }


  public function findAll()   {  
       $tarefas = $this->tarefaModel = Tarefa::all();
       return $tarefas;
      }


   public function findById($id){   return Tarefa::find($id);   }

   public function findAllPagination(Request $request){
          $search = $request->search;  
          $tarefas = Tarefa::where(function($query) use($search){
          if($search){$query ->where('nome','LIKE',"%{$search}%");}
          })->paginate(5);
         return $tarefas;
         }

  public function updaTetarefa(Request $request){   
          $tarefa = Tarefa::find($request->id); 
          $tarefa->update($request->all());
          return $tarefa;
   }



public function saveTarefa(Request $request){         
          $data=$request->all();  
          $tarefa = Tarefa::create($data);
          return $tarefa;
   }

public function delete($id){ Tarefa::findOrFail($id)->delete(); }
}