<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->text('descricao');
            $table->enum('status', ['Pendente', 'Em andamento', 'Concluida'])->default('Em andamento');
            $table->foreignId('projeto_id')->constrained('projetos')->on('projetos')
            ->onDelete('cascade');
            $table->timestamps();                                                 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
};
