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
       try{
          $projetos =  $this-> projetoService->selectTypeUserAndReturn($request);                         
          return view('projeto.index' ,compact('projetos'));
       }catch (Exception $e) {
              return view('projeto.index' ,compact('projetos'))->withErrors($e->getMessage());
            }
    }

   function viewCadastro(){                  
           return view('projeto.cadastro');        
     }

   function cadastrarProjeto(CriarAtualizarProjetoFormRequest $request){ 
try{
            $projeto =  $this-> projetoService->saveProject($request);
            return view('projeto.cadastro',compact('projeto'))->with('mensagem','Projeto cadastrado com sucesso');
       }catch (Exception $e) {
              return view('projeto.cadastro',compact('projeto'))->withErrors($e->getMessage());
            } 
     }


   function viewEditar($id){
            if(!$projeto = $this-> projetoService->findById($id))  
            return redirect()->route('projeto.index');
            return view('projeto.cadastro',compact('projeto'));
     }
         
     
   function editarProjeto(CriarAtualizarProjetoFormRequest $request){ 
       
       try{
            $projeto = $this-> projetoService->updateProject( $request);           
            return view('projeto.cadastro',compact('projeto'))->with('mensagem','Projeto atualizado com sucesso');
       }catch (Exception $e) {
              return  view('projeto.cadastro',compact('projeto'))->withErrors($e->getMessage());
            } 
     }

   public function delete($id){
       try{
            $this-> projetoService->delete($id);
            return redirect()->route('projeto.index')->with('mensagem','Projeto excluido com sucesso');
       }catch (Exception $e) {
              return  view('projeto.index',compact('projeto'))->withErrors($e->getMessage());
            } 
     }

   



}



