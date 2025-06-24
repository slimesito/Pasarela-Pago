<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos_deuda', function (Blueprint $table) {
            $table->primary('id')->autoIncrement()->startingValue(1);
            $table->integer('empresa_id');
            $table->decimal('monto_pago', 15, 2);
            $table->string('referencia', 50)->unique();
            $table->timestamp('fecha_pago')->useCurrent();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        // Añadir índices adicionales
        Schema::table('pagos_deuda', function (Blueprint $table) {
            $table->index('empresa_id');
            $table->index('fecha_pago');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos_deuda');
    }
};
