<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            // Crea id BIGSERIAL NOT NULL PRIMARY KEY
            $table->id();
            $table->string('nombre', 100);
            $table->string('rif', 20)->unique();
            $table->boolean('activa')->default(true);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamp('ultima_actualizacion')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
