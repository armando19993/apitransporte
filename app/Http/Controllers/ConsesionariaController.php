<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsesionariaRequest;
use App\Http\Requests\UpdateConsesionariaRequest;
use App\Models\Consesionaria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsesionariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Consesionarias obtenidas con exito",
            'data' => Consesionaria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $consesionaria = Consesionaria::create([
            'nombre' => $request->nombre,
            'ruc' => $request->ruc,
            'email' => $request->email
        ]);

        return response()->json([
            'status' => true,
            'message' => "Consesionaria registrada con exito",
            'data' => $consesionaria
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consesionaria $consesionaria): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Consesionaria obtenida con exito",
            'data' => $consesionaria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consesionaria $consesionaria): JsonResponse
    {
        $consesionaria->nombre = $request->nombre;
        $consesionaria->ruc = $request->ruc;
        $consesionaria->email = $request->email;
        $consesionaria->save();

        return response()->json([
            'status' => true,
            'message' => "Consesionaria actualizada con exito",
            'data' => $consesionaria
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consesionaria $consesionaria): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Consesionaria eliminada con exito",
            'data' => $consesionaria->delete()
        ]);
    }
}
