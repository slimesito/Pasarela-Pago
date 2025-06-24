<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deuda_empresas', function (Blueprint $table) {
            $table->primary('id')->autoIncrement()->startingValue(1);
            $table->integer('empresa_id')->unique();
            $table->decimal('deuda_total', 15, 2);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('ultima_actualizacion')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        // Añadir índice adicional
        Schema::table('deuda_empresas', function (Blueprint $table) {
            $table->index('empresa_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deuda_empresas');
    }
};
