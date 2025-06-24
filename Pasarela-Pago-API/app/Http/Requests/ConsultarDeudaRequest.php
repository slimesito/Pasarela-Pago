<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultarDeudaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rif' => 'nullable|string',
            'id'  => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'rif.string' => 'El RIF debe ser una cadena de texto.',
            'id.integer' => 'El ID debe ser un número entero.',
        ];
    }
}
