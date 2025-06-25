<?php

namespace Tests\Feature;

use App\Models\Empresa;
use App\Models\DeudaEmpresa;
use App\Models\User;
use Tests\TestCase;

class DeudaEmpresaTest extends TestCase
{
    public function test_consultar_deuda_exitosa(): void
    {
        $user = User::factory()->create();
        $empresa = Empresa::factory()->create(['rif' => 'J-12345678-9']);
        DeudaEmpresa::factory()->create(['empresa_id' => $empresa->id, 'deuda_total' => 1000]);

        $response = $this->actingAs($user, 'sanctum')
                        ->getJson('/api/deuda/consultar?rif=J-12345678-9');

        $response->assertStatus(200)
                ->assertJsonStructure(['id', 'rif', 'deuda']);
    }

    public function test_pago_deuda_exitosa(): void
    {
        $user = User::factory()->create();
        $empresa = Empresa::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
                         ->postJson('/api/deuda/pagar', [
                             'empresa_id' => $empresa->id,
                             'monto_pago' => 500,
                             'referencia' => 'REF123456',
                         ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'message'    => 'Pago registrado correctamente',
                     'empresa_id' => $empresa->id,
                     'monto_pago' => 500,
                     'referencia' => 'REF123456',
                 ]);
    }
}
