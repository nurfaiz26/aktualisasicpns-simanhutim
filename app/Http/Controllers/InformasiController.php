<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformasiRequest;
use App\Http\Requests\UpdateInformasiRequest;
use App\Models\Informasi;
use App\Models\KlasifikasiInformasi;
use App\Models\MasterKlasifikasiInformasi;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $klasifikasis = KlasifikasiInformasi::with('informasi', 'masterKlasifikasi')->get();
        $mKlasifikasis = MasterKlasifikasiInformasi::all()->load('klasifikasis');
        $klasifikasis = KlasifikasiInformasi::with('informasi')->whereIn('master_klasifikasi_informasi_id', $mKlasifikasis->pluck('id'))->get()->groupBy('masterKlasifikasi.nama');

        $formattedArray = $klasifikasis->map(function ($items, $key) {
            return [
                'master_klasifikasi' => $key,
                'klasifikasis' => $items->values(),
            ];
        })->values();

        return view('informasi.index', [
            'mKlasifikasis' => $formattedArray,
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
    public function store(StoreInformasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        if ($informasi->status == 'nonaktif') {
            # code...
            return abort(403, "Informasi tidak aktif!");
        }

        return view('informasi.show', ['informasi' => $informasi->load('klasifikasis.masterKlasifikasi')]);
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
