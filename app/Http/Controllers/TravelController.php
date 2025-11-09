<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\LaporanTravel;
use App\Models\MasterKlasifikasiTravel;
use App\Models\Travel;
use Illuminate\Support\Facades\Auth;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::with('klasifikasis.masterKlasifikasi', 'gambars')->limit(5)->orderBy('gmap_place_id', 'DESC')->get();
        $klasifikasis = MasterKlasifikasiTravel::all();

        return view('travel.index', [
            'travels' => $travels,
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
    public function store(StoreTravelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        if ($travel->status == 'nonaktif') {
            # code...
            return abort(403, "Travel tidak aktif!");
        }

        return view('travel.show', ['travel' => $travel->load('klasifikasis.masterKlasifikasi')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        //
    }
    
    public function lapor(Travel $travel)
    {
        try {
            //code...
            $laporan = LaporanTravel::create([
                'travel_id' => $travel->id,
                'user_id' => Auth::user() ? Auth::user()->id : null,
                'deskripsi' => request()->deskripsi,
                'link_bukti' => request()->link_bukti,
            ]);
        } catch (\Exception $e) {
            //throw $th;
            
            return back()->with('error', 'Laporan Gagal Dikirim, message: ' . $e->getMessage());
        }

        return back()->with('sukses', 'Laporan Berhasil Dikirim');
    }
}
