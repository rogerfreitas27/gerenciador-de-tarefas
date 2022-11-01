<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioTarefa extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id','tarefa_id'];
}
