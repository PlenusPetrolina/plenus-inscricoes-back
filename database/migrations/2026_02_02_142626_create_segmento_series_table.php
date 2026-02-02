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
        Schema::create('segmento_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('segmento_id')->default(1)->constrained('segmentos');
            $table->foreignId(column: 'serie_id')->default(1)->constrained('series');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segmento_series');
    }
};
