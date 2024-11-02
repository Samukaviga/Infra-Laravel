<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reuniao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');         // Coluna para o nome da reunião
            $table->date('data');           // Coluna para a data da reunião
            $table->time('horario');        // Coluna para o horário da reunião
            $table->timestamps();           // Colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reuniao');
    }
};
