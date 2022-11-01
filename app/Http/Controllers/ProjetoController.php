<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProjetoService;
use App\Models\Tarefa;
use  App\Http\Requests\CriarAtualizarProjetoFormRequest;

class ProjetoController extends Controller
{   
   private ProjetoService $projetoService;
   


   public function __construct( ProjetoService $projetoService) 
   {      $this-> projetoService =  $projetoService; }


   function index(Request $request){
          $projetos =  $this-> projetoService->findAllPagination($request);         
          return view('projeto.index' ,compact('projetos'));
    }

   function viewCadastro(){                  
           return view('projeto.cadastro');        
     }

   function cadastrarProjeto(CriarAtualizarProjetoFormRequest $request){     
            $projeto =  $this-> projetoService->saveProject($request);
            return view('projeto.cadastro',compact('projeto')); 
     }


   function viewEditar($id){
            if(!$projeto = $this-> projetoService->findById($id))  
            return redirect()->route('projeto.index');
            return view('projeto.cadastro',compact('projeto'));
     }
         
     
   function editarProjeto(CriarAtualizarProjetoFormRequest $request){        
            $projeto = $this-> projetoService->updateProject( $request);
            return view('projeto.cadastro',compact('projeto'));
     }

   public function delete($id){
            $this-> projetoService->delete($id);
            return redirect()->route('projeto.index')->with('msg','Projeto excluido com sucesso');
     }
}
