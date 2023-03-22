<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperativoRequest;
use App\Http\Requests\UpdateOperativoRequest;
use App\Models\Operativo;

class OperativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperativoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Operativo $operativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operativo $operativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperativoRequest $request, Operativo $operativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operativo $operativo)
    {
        //
    }
}
