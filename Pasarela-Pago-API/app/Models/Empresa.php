<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'pasarela_pago.empresas';
    protected $fillable = ['nombre', 'rif', 'activa'];

    public function deuda()
    {
        return $this->hasOne(DeudaEmpresa::class, 'empresa_id');
    }
}
