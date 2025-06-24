<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultarDeudaRequest;
use App\Http\Requests\PagarDeudaRequest;
use App\Http\Resources\EmpresaDeudaResource;
use App\Models\Empresa;
use App\Models\PagoDeuda;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class DeudaEmpresaController extends Controller
{
    public function consultarDeuda(ConsultarDeudaRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (!$data['rif'] && !$data['id']) {
            return response()->json(['message' => 'Debe proporcionar el RIF o el ID de la empresa.'], 422);
        }

        $empresa = Empresa::with('deuda')
            ->when($data['rif'] ?? null, fn($q) => $q->where('rif', $data['rif']))
            ->when($data['id'] ?? null, fn($q) => $q->where('id', $data['id']))
            ->first();

        if (!$empresa || !$empresa->deuda) {
            return response()->json(['message' => 'Empresa no encontrada o sin deuda registrada.'], 404);
        }

        return response()->json(new EmpresaDeudaResource($empresa));
    }

    public function pagarDeuda(PagarDeudaRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();
            PagoDeuda::create($data);
            DB::commit();

            return response()->json([
                'message' => 'Pago registrado correctamente',
                'empresa_id' => $data['empresa_id'],
                'monto_pago' => $data['monto_pago'],
                'referencia' => $data['referencia'],
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'No se pudo procesar el pago.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
