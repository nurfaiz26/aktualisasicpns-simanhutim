<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformasiRequest;
use App\Http\Requests\UpdateInformasiRequest;
use App\Models\Informasi;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("informasi.index");
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
    public function store(StoreInformasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        return view("informasi.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformasiRequest $request, Informasi $informasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        //
    }
}
