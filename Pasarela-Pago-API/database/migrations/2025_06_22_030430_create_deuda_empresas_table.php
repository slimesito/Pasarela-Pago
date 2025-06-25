<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deuda_empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')
                  ->constrained('empresas')
                  ->cascadeOnDelete();
            $table->decimal('deuda_total', 15, 2);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('ultima_actualizacion')->useCurrent()->useCurrentOnUpdate();

            $table->index('empresa_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deuda_empresas');
    }
};
