<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransportexOperativoRequest;
use App\Http\Requests\UpdateTransportexOperativoRequest;
use App\Models\Operativo;
use App\Models\TransportexOperativo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransportexOperativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idOperativo)
    {
        return response()->json([
            'status' => true,
            'message' => "Relaciones obtenidas con exito",
            'data' => Operativo::where('idOperativo', $idOperativo)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $relacion = TransportexOperativo::create([
            'idOperativo' => $request->idOperativo,
            'idTransporte' => $request->idTransporte,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Relacion creada con exito",
            'data' =>$relacion
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportexOperativo $transportexOperativo): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Relacion creada con exito",
            'data' => $transportexOperativo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportexOperativo $transportexOperativo): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Relacion eliminada con exito",
            'data' => $transportexOperativo->delete()
        ]);
    }
}
