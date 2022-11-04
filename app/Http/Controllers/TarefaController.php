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
    try { 
             $projetos = $this->projetoService->findAll();
             return view('tarefa.cadastro',compact('projetos'));
            }catch (Exception $e) {
              return view('usuario.index')->withErrors($e->getMessage());
            }
     }

              
   function cadastrarTarefa(CriarAtualizarTarefaFormRequest $request){ 

    try { 
             $tarefa = $this-> tarefaService->saveTarefa($request);
             return  redirect()->route('tarefa.index')->with('mensagem','Tarefa cadastrada com sucesso');
            }catch (Exception $e) {
              return view('usuario.index')->withErrors($e->getMessage());
        }
      }

   function viewEditar($id){   
            if(!$tarefa = $this-> tarefaService->findById($id))
            return redirect()->route('tarefa.index');             
            $projetos = $this->projetoService->findAll();        
            return view('tarefa.cadastro',compact('tarefa','projetos'))->withErrors($e->getMessage());
         
          }

   public function editarTarefa(CriarAtualizarTarefaFormRequest $request){
   
    try {     
             $tarefa = $this->tarefaService->updaTetarefa($request); 
             $projetos = $this->projetoService->findAll(); 
             return view('tarefa.cadastro',compact('tarefa','projetos'))->with('mensagem','Tarefa atualizada com sucesso');
            }catch (Exception $e) {
              return view('tarefa.cadastro')->withErrors($e->getMessage());
        }
           
            }

   public  function  viewAdicionarDevTarefa($id){

    try { 
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($id); 
            $usuarios = $this->usuarioService->loadUsuarioTarefaAddDev($id);
            return view('tarefa.addDev',compact('tarefas','usuarios','id'));

          }catch (Exception $e) {
            return view('tarefa.addDev',compact('tarefas','usuarios','id'))->withErrors($e->getMessage());
      }


            }

  public  function  viewRemoverDevTarefa($id){

    try{
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($id);       
            return view('tarefa.removeDev',compact('tarefas'));
          }catch (Exception $e) {
            return view('tarefa.removeDev',compact('tarefas'))->withErrors($e->getMessage());
      }
            }
public  function  AdicionarDevTarefa(CriarAtualizarTarefaUsuarioFormRequest $request){
  try{
            $data = $this->tarefaUsuarioService->save($request->all());
            $tarefas = $this->usuarioService->loadUsuarioTarefaRemove($data->tarefa_id); 
            $usuarios = $this->usuarioService->loadUsuarioTarefaAddDev($data->tarefa_id);
            $id = $data->tarefa_id;
            return view('tarefa.addDev',compact('tarefas','usuarios','id'))->with('mensagem','Dev adicionado com sucesso');
          }catch (Exception $e) {
            return view('tarefa.addDev',compact('tarefas','usuarios','id'))->withErrors($e->getMessage());
      }
            }
          
    public  function  RemoverDevTarefa(Request $request){
      try{
           $retorno = $this->tarefaUsuarioService-> delete($request->id);      
           return redirect()->route('tarefa.index')->with('mensagem','Dev removido  com sucesso');         
          }catch (Exception $e) {
            return redirect()->route('tarefa.index')->withErrors($e->getMessage());
      }
          }

   public function delete($id){
    try{
            $this-> tarefaService->delete($id);
            return redirect()->route('tarefa.index')->with('mensagem','Tarefa excluida com sucesso');    
          }catch (Exception $e) {
            return redirect()->route('tarefa.index')->withErrors($e->getMessage());
      }
          }



}