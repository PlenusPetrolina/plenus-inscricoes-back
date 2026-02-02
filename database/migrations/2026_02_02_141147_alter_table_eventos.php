<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("eventos", function (Blueprint $table) {
            Schema::table('eventos', function (Blueprint $table) {
                $table->unsignedBigInteger('segmento_id')->after('id');

                $table->foreign('segmento_id')
                    ->references('id')
                    ->on('segmentos')
                    ->onDelete('cascade');

                $table->unsignedBigInteger('serie_id')->after('segmento_id');

                $table->foreign('serie_id')
                    ->references('id')
                    ->on('series')
                    ->onDelete('cascade');
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropForeign(['segmento_id']);
            $table->dropColumn('segmento_id');
            $table->dropForeign(['serie_id']);
            $table->dropColumn('serie_id');

        });

    }
};
