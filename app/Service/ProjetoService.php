<?php
namespace App\Service;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class ProjetoService { 


public function findAll()   {  
       $projetos =  Projeto::all();
       return $projetos;
       }

public function findById($id){   return Projeto::find($id);   }

public function updateProject(Request $request){   
       $projeto = Projeto::find($request->id); 
       $projeto->update([
       'nome'=>  $request->nome 
       ]) ;
      }

public function saveProject(Request $request){         
       
      $data=array('nome'=>$request->nome);  
      $projeto = Projeto::create($data);
      return $projeto;
     }

public function delete($id){ Projeto::findOrFail($id)->delete(); }


public function selectTypeUserAndReturn(Request $request){
    
         if(Auth::user()->tipo_usuario_id==1)
      { return $projetos = $this->findAllPagination($request);}

        $projetos = $this->findAllPaginationDev($request,Auth::user()->id);
          return $projetos;
      }    

    
      public function findAllPaginationDev(Request $request,$id){
        
            $search = $request->search;      
            $projetos = Projeto::where(function($query) use($search){
             if($search){$query ->where('projetos.nome','LIKE',"%{$search}%");
                         
              }
             })->select('projetos.id','projetos.nome')
             ->join('tarefas', 'projetos.id', '=', 'tarefas.projeto_id')
             ->join('tarefa_usuarios', 'tarefa_usuarios.tarefa_id', '=', 'tarefas.id')
             ->where('tarefa_usuarios.user_id','=',"{$id}")
             ->distinct()
             ->paginate(5);
             return $projetos;
    
 }

public function findAllPagination(Request $request){
        $search = $request->search;      
        $projetos = Projeto::where(function($query) use($search){
         if($search){$query ->where('nome','LIKE',"%{$search}%");}
         })->paginate(5);
         return $projetos;      
      }      
      
}