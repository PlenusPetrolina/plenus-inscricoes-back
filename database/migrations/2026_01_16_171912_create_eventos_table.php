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
            $table->string('local');
            $table->dateTime('data');
            $table->string('cidade');
            $table->boolean('gratuito')->default(true);
            $table->decimal('valor', 8, 2);
            $table->string('resumo')->nullable();
            $table->string('coordenacao');
            $table->string('areas');
            $table->integer('admin_id')->nullable();
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
