<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarAtualizarProjetoFormRequest extends FormRequest
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
            ]              
        ];



       
        if($this->method()=='PUT'){
         
         $rules['nome']=[
            'required',
            'string',
            'min:3',
            'max: 100'            
         ];
         $rules['id']=[
            'required',
            'numeric'                        
         ];

            
        }
        return $rules;
    }  
}
