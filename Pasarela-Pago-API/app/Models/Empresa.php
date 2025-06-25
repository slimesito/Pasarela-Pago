<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $fillable = ['nombre', 'rif', 'activa'];
    public $timestamps = false;

    public function deuda()
    {
        return $this->hasOne(DeudaEmpresa::class, 'empresa_id');
    }
}
