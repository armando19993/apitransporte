<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreObservacionesRequest;
use App\Http\Requests\UpdateObservacionesRequest;
use App\Models\Observaciones;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ObservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idTransportexOperativo): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Obaservaciones obtenidas con exito",
            'data' => Observaciones::where('idTransportexOperativo', $idTransportexOperativo)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $observacion = Observaciones::create([
            'estado' => $request->estado,
            'tipoObservacion' => $request->tipoObservacion,
            'descripcion' => $request->descripcion,
            'idTransportexOperativo' => $request->idTransportexOperativo,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Obaservacion registrada con exito",
            'data' => $observacion
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Observaciones $observaciones)
    {
        return response()->json([
            'status' => true,
            'message' => "Obaservacion obtenida con exito",
            'data' => $observaciones
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Observaciones $observaciones): JsonResponse
    {
        $observaciones->estado = $request->estado;
        $observaciones->tipoObservacion = $request->tipoObservacion;
        $observaciones->descripcion = $request->descripcion;
        $observaciones->save();

        return response()->json([
            'status' => true,
            'message' => "Obaservacion actualizada con exito",
            'data' => $observaciones
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observaciones $observaciones)
    {
        return response()->json([
            'status' => true,
            'message' => "Obaservacion obtenida con exito",
            'data' => $observaciones->delete()
        ]);
    }
}
