<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'isAdmin'  => $validated['isAdmin'] ?? false,
        ]);

        return response()->json([
            'message' => 'Usuario registrado correctamente.',
            'user'    => $user->only(['id', 'name', 'email', 'isAdmin']),
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message'      => 'Inicio de sesión exitoso.',
            'token' => $token,
            'expires_in'   => config('sanctum.expiration') * 60,
            'user'         => $user->only(['id', 'name', 'email', 'isAdmin']),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            // Revocar y eliminar todos los tokens del usuario
            $user->tokens()->delete();

            return response()->json([
                'message' => 'Sesión cerrada correctamente. Todos los tokens han sido revocados.',
            ]);
        }

        return response()->json([
            'message' => 'No se encontró usuario autenticado.',
        ], 401);
    }
}
