<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,
            'rif' => 'J-' . $this->faker->randomNumber(8) . '-9',
        ];
    }
}
