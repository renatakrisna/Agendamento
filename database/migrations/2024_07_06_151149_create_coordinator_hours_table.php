<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coordinator_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coordinator_id')->constrained('users'); // Chave estrangeira para o usuário (coordenador)
            $table->time('start_time')->default('08:00'); // Hora de início do período de atendimento
            $table->time('end_time')->default('17:00'); // Hora de término do período de atendimento
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinator_hours');
    }
};
