<?php
namespace App\Service;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

public function findAllPagination(Request $request){
        $search = $request->search;      
        $projetos = Projeto::where(function($query) use($search){
         if($search){$query ->where('nome','LIKE',"%{$search}%");}
         })->paginate(5);
         return $projetos;      
      }      
      
}