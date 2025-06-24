<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagarDeudaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'empresa_id' => 'required|exists:empresas,id',
            'monto_pago' => 'required|numeric|min:0.01',
            'referencia' => 'required|string|unique:pagos_deuda,referencia',
        ];
    }

    public function messages(): array
    {
        return [
            'empresa_id.required' => 'El campo empresa_id es obligatorio.',
            'empresa_id.exists'   => 'La empresa especificada no existe.',
            'monto_pago.required' => 'El monto del pago es obligatorio.',
            'monto_pago.numeric'  => 'El monto debe ser un valor numérico.',
            'monto_pago.min'      => 'El monto mínimo permitido es 0.01.',
            'referencia.required' => 'La referencia es obligatoria.',
            'referencia.unique'   => 'Ya existe un pago con esta referencia.',
        ];
    }
}
