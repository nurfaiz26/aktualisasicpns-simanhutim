<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Models\Berita;
use App\Models\MasterKlasifikasiBerita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::with('klasifikasis.masterKlasifikasi', 'gambars')->where('status', 'aktif')->limit(5)->get();
        $klasifikasis = MasterKlasifikasiBerita::all();

        return view('berita.index', [
            'beritas' => $beritas,
            'klasifikasis' => $klasifikasis
        ]);
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
    public function store(StoreBeritaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $beritum)
    {
        if ($beritum->status == 'nonaktif') {
            # code...
            return abort(403, "Berita tidak aktif!");
        }

        return view('berita.show', ['berita' => $beritum->load('klasifikasis.masterKlasifikasi')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, Berita $beritum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        //
    }
}
