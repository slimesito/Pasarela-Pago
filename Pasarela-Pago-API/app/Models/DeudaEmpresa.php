<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeudaEmpresa extends Model
{
    use HasFactory;
    protected $table = 'deuda_empresas';
    public $timestamps = false;

    protected $fillable = ['empresa_id', 'deuda_total'];
}
