<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProjetoService;
use App\Service\TarefaService;
use  App\Http\Requests\CriarAtualizarTarefaFormRequest;
use App\Service\UsuarioService;


class TarefaController extends Controller
{

    private TarefaService $tarefaService;
    private ProjetoService $projetoService;
    private UsuarioService $usuarioService;

  public function __construct( TarefaService $tarefaService, ProjetoService $projetoService,
                                UsuarioService $usuarioService)
                          
  {    
      $this-> tarefaService =  $tarefaService;
      $this-> projetoService =  $projetoService;
       $this-> usuarioService =  $usuarioService;
      
  }
  function index(Request $request){          
           $tarefas =  $this-> tarefaService->findAllPagination($request);          
           return view('tarefa/index', compact('tarefas'));
    }

   function viewCadastro(){
             $projetos = $this->projetoService->findAll();
             return view('tarefa.cadastro',compact('projetos'));
     }

              
   function cadastrarTarefa(CriarAtualizarTarefaFormRequest $request){  
             $tarefa = $this-> tarefaService->saveTarefa($request);
             return  redirect()->route('usuario.index');
      }

   function viewEditar($id){
            if(!$tarefa = $this-> tarefaService->findById($id))
            return redirect()->route('tarefa.index');             
            $projetos = $this->projetoService->findAll();        
            return view('tarefa.cadastro',compact('tarefa','projetos'));
       }

   function editarTarefa(CriarAtualizarTarefaFormRequest $request){   
             $tarefa = $this->tarefaService->updaTetarefa($request); }

    public  function  adicionarDevTarefa($id){
            $tarefas = $this->usuarioService->loadUsuarioTarefaAddDev($id);
            return view('tarefa.addRemoveDev',compact('tarefas'));
            }
   public  function  removerDevTarefa($id){
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($id);
       
            return view('tarefa.addRemoveDev',compact('tarefas'));

                     }

   public function delete($id){
            $this-> tarefaService->delete($id);
            return redirect()->route('tarefa.index')->with('msg','Tarefa excluida com sucesso');
          }



}