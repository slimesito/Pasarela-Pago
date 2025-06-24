<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaDeudaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'nombre'   => $this->nombre,
            'rif'      => $this->rif,
            'deuda'    => [
                'deuda_total' => $this->deuda->deuda_total ?? 0.00,
                'actualizado' => $this->deuda->ultima_actualizacion ?? null,
            ],
        ];
    }
}
