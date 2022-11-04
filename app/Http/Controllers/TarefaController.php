<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProjetoService;
use App\Service\TarefaService;
use  App\Http\Requests\CriarAtualizarTarefaFormRequest;
use  App\Http\Requests\CriarAtualizarTarefaUsuarioFormRequest;
use App\Service\UserService;
use App\Service\TarefaUsuarioService;

class TarefaController extends Controller
{
    private TarefaUsuarioService $tarefaUsuarioService;
    private TarefaService $tarefaService;
    private ProjetoService $projetoService;
    private UserService $usuarioService;

  public function __construct( TarefaService $tarefaService, ProjetoService $projetoService,
                              UserService $usuarioService,TarefaUsuarioService $tarefaUsuarioService)
                          
  {    
      $this-> tarefaService =  $tarefaService;
      $this-> projetoService =  $projetoService;
       $this-> usuarioService =  $usuarioService;
       $this-> tarefaUsuarioService =  $tarefaUsuarioService;
  }
  function index(Request $request){     
           $tarefas =  $this-> tarefaService->selectTypeUserAndReturn($request);          
           return view('tarefa/index', compact('tarefas'));
    }

   function viewCadastro(){
             $projetos = $this->projetoService->findAll();
             return view('tarefa.cadastro',compact('projetos'));
     }

              
   function cadastrarTarefa(CriarAtualizarTarefaFormRequest $request){ 
             $tarefa = $this-> tarefaService->saveTarefa($request);
             return  redirect()->route('tarefa.index');
      }

   function viewEditar($id){
            if(!$tarefa = $this-> tarefaService->findById($id))
            return redirect()->route('tarefa.index');             
            $projetos = $this->projetoService->findAll();        
            return view('tarefa.cadastro',compact('tarefa','projetos'));
       }

   public function editarTarefa(CriarAtualizarTarefaFormRequest $request){   
             $tarefa = $this->tarefaService->updaTetarefa($request); 
             $projetos = $this->projetoService->findAll(); 
             return view('tarefa.cadastro',compact('tarefa','projetos'));
            }

   public  function  viewAdicionarDevTarefa($id){
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($id); 
            $usuarios = $this->usuarioService->loadUsuarioTarefaAddDev($id);
            return view('tarefa.addDev',compact('tarefas','usuarios','id'));
            }

  public  function  viewRemoverDevTarefa($id){
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($id);       
            return view('tarefa.removeDev',compact('tarefas'));
            }
public  function  AdicionarDevTarefa(CriarAtualizarTarefaUsuarioFormRequest $request){
           
            $data = $this->tarefaUsuarioService->save($request->all());
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($data->tarefa_id); 
            $usuarios = $this->usuarioService->loadUsuarioTarefaAddDev($data->tarefa_id);
            $id = $data->tarefa_id;
            return view('tarefa.addDev',compact('tarefas','usuarios','id'));
            }
          
    public  function  RemoverDevTarefa(Request $request){
           $retorno = $this->tarefaUsuarioService-> delete($request->id);      
           return redirect()->route('tarefa.index')->with('msg','Usuario removido da tarefa com sucesso');         
            }

   public function delete($id){
            $this-> tarefaService->delete($id);
            return redirect()->route('tarefa.index')->with('msg','Tarefa excluida com sucesso');
          }



}