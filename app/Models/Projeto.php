<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Projeto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome'        
    ];

    public function findAllPagination($quantidadeDeRegistroPorPagina){

        return $projetos = Projeto::paginate($quantidadeDeRegistroPorPagina);
     
     }
    
     public function findById($id){   return Projeto::find($id);   }

     public function saveProject(Request $request){  
        
       
        $data=array('nome'=>$request->nome);
      
         $projeto = Projeto::create($data);
         $projeto ->relProjetoUsuarioProjeto()->create([
            'projeto_id'=>$projeto->id
         ]);


            return $projeto;

         }
          

     public function updateProject(Request $request){   
        $projeto = Projeto::find($request->id); 
        $projeto->update([
          'nome'=>  $request->nome 
        ]) ;
       }


        public function relProjetoUsuarioProjeto()
    {   return $this->hasOne(ProjetoUsuario::class,'id','projeto_id');} 

    

    public function relTarefa(){
        return $this->hasMany('App\Model\Projeto');
    }

}
