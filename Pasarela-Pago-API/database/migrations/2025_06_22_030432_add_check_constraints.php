<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE deuda_empresas
            ADD CONSTRAINT deuda_empresas_deuda_total_check
            CHECK (deuda_total >= 0)
        ");
        DB::statement("
            ALTER TABLE pagos_deuda
            ADD CONSTRAINT pagos_deuda_monto_pago_check
            CHECK (monto_pago > 0)
        ");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE deuda_empresas DROP CONSTRAINT IF EXISTS deuda_empresas_deuda_total_check");
        DB::statement("ALTER TABLE pagos_deuda   DROP CONSTRAINT IF EXISTS pagos_deuda_monto_pago_check");
    }
};
