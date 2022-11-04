<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarAtualizarTarefaUsuarioFormRequest extends FormRequest
{
    
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       $id=$this->id ?? '';
     

        $rules = [
            'user_id'=>[
               'required',
               'numeric'
                ],
               'tarefa_id'=>[
               'required' ,
               'numeric'
              
               ],[
                'user_id.required'=>'Selecione um desenvolvedor é Obrigarorio',
                'tarefa_id.required'=>'Tarefa é Obrigarorio',
                'user_id.numeric'=>'valor invalido',
                'tarefa_id.required'=>'valor invalido'
               ]

               
        ];




        if($this->method()=='PUT'){
          
         $rules['projeto_id']=[
           'required',
            'numeric'            
         ];
         $rules['id']=[
            'required',
             'numeric'            
          ];

            
        }
        return $rules;
    }  
}
