<?php

namespace Database\Factories;

use App\Models\DeudaEmpresa;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeudaEmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeudaEmpresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => Empresa::factory(),
            'deuda_total' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
