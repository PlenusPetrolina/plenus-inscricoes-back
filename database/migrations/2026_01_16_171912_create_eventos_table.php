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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('local');
            $table->dateTime('data');
            $table->string('cidade');
            $table->enum('publico', ['responsavel', 'aluno', 'todos'])->default('aluno');
            $table->boolean('gratuito')->default(true);
            $table->decimal('valor', 8, 2)->default(0);
            $table->string('resumo')->nullable();
            $table->string('coordenacao');
            $table->string('areas');
            $table->integer('vagas')->default(0);
            $table->foreignId('admin_id')->constrained('admins');
            $table->enum('status', ['disponivel', 'encerrado'])->default('disponivel');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
