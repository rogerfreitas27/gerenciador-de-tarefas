<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarAtualizarTarefaFormRequest extends FormRequest
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
               'nome'=>[
               'required',
               'string',
               'min:3',
               'max: 100'
                ],
               'descricao'=>[
               'required' ,
               'string',
               'max: 1000'
                ],
               'status'=>[
               'required'                 
                ],
               'projeto_id'=>[
               'required',  
                'numeric'
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
