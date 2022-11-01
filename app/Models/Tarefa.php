<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'descricao',
        'status',
        'projeto_id'
    ];


    public function relProjeto()
    {
       return $this->belongsTo(Projeto::class,'projeto_id','id');        
     
    }

    

     

     
}
