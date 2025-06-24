<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoDeuda extends Model
{
    protected $table = 'pasarela_pago.pagos_deuda';
    public $timestamps = false;

    protected $fillable = ['empresa_id', 'monto_pago', 'referencia'];
}
