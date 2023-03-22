<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    public function index($idInspector): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Conductores obtenidos con exito",
            'data' => Conductor::where('idInspector', $idInspector)->get()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $conductor = Conductor::create([
            'nombre_apellido' => $request->nombre_apellido,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'anios_experiencia' => $request->anios_experiencia,
            'numero_licencia' => $request->numero_licencia,
            'idInspector' => $request->idInspector,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Conductor registrado con exito",
            'data' => $conductor
        ]);
    }

    public function show(Conductor $conductor): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Conductor obtenido con exito",
            'data' => $conductor
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conductor $conductor): JsonResponse
    {
        $conductor->nombre_apellido = $request->nombre_apellido;
        $conductor->dni = $request->dni;
        $conductor->celular = $request->celular;
        $conductor->anios_experiencia = $request->anios_experiencia;
        $conductor->numero_licencia = $request->numero_licencia;
        $conductor->save();

        return response()->json([
            'status' => true,
            'message' => "Conductor actualizado con exito",
            'data' => $conductor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conductor $conductor): JsonResponse
    {
        $conductor->delete();

        return response()->json([
            'status' => true,
            'message' => "Conductor eliminado con exito",
            'data' => $conductor
        ]);
    }
}
