<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperativoRequest;
use App\Http\Requests\UpdateOperativoRequest;
use App\Models\Operativo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OperativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idInspector): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Operativos obtenidos con exito",
            'data' => Operativo::where('idInspector', $idInspector)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $operativo = Operativo::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'ubicacion' => $request->ubicacion,
            'idInspector' => $request->idInspector,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Operativo regitrado con exito",
            'data' => $operativo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Operativo $operativo): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Operativo obtenido con exito",
            'data' => $operativo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operativo $operativo)
    {
        $operativo->fecha = $request->fecha;
        $operativo->hora = $request->hora;
        $operativo->ubicacion = $request->ubicacion;
        $operativo->save();

        return response()->json([
            'status' => true,
            'message' => "Operativo actualizado con exito",
            'data' => $operativo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operativo $operativo)
    {
        return response()->json([
            'status' => true,
            'message' => "Operativo eliminado con exito",
            'data' => $operativo->delete()
        ]);
    }
}
