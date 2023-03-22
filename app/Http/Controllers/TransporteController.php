<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransporteRequest;
use App\Http\Requests\UpdateTransporteRequest;
use App\Models\Transporte;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Transportes obtenidas con exito",
            'data' => Transporte::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $transporte = Transporte::create([
            'numero_placa' => $request->numero_placa,
            'soat' => $request->soat,
            'estado' => $request->estado,
            'codigo_etiqueta_nfc' => $request->codigo_etiqueta_nfc,
            'idConsesionaria' => $request->idConsesionaria,
            'idConductor' => $request->idConductor,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Transporte registrado con exito",
            'data' => $transporte
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transporte $transporte): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Transporte obtenido con exito",
            'data' => $transporte
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transporte $transporte): JsonResponse
    {
        $transporte->numero_placa = $request->numero_placa;
        $transporte->soat = $request->soat;
        $transporte->estado = $request->estado;
        $transporte->codigo_etiqueta_nfc = $request->codigo_etiqueta_nfc;
        $transporte->idConsesionaria = $request->idConsesionaria;
        $transporte->idConductor = $request->idConductor;
        $transporte->save();

        return response()->json([
            'status' => true,
            'message' => "Transporte editado con exito",
            'data' => $transporte
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transporte $transporte): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Transporte eliminado con exito",
            'data' => $transporte->delete()
        ]);
    }
}
