<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos_deuda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')
                  ->constrained('empresas')
                  ->cascadeOnDelete();
            $table->decimal('monto_pago', 15, 2);
            $table->string('referencia', 50)->unique();
            $table->timestamp('fecha_pago')->useCurrent();

            $table->index(['empresa_id', 'fecha_pago']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos_deuda');
    }
};
