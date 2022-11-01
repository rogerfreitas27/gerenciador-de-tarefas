<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarAtualizarUsuarioFormRequest extends FormRequest
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
               'email'=>[
               'required' ,
               'email',
               'max: 100',
               "unique:usuarios,email,{$id},id"
                ],
               'password'=>[
               'required'  ,
               'max: 10'
                ],
               'tipo_usuario_id'=>[
               'required',  
                'numeric'
                ]

               
        ];




        if($this->method('PUT')){
          
         $rules['password']=[
           'nullable',
            'max:10'            
         ];

            
        }
        return $rules;
    }  
}
