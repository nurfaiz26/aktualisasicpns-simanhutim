<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\KlasifikasiInformasi;
use App\Models\MasterKlasifikasiInformasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function search()
    {
        $keyword = request()->keyword;
        $filter = request()->filter;

        $mKlasifikasi = MasterKlasifikasiInformasi::find($filter);

        $klasifikasi = KlasifikasiInformasi::when($mKlasifikasi, function ($q) use ($mKlasifikasi) {
            return $q->where('master_klasifikasi_berita_id', $mKlasifikasi->id);
        })->get();

        $informasis = Informasi::with(['gambars', 'klasifikasis'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%');
            })
            ->when(!$klasifikasi->isEmpty(), function ($query) use ($klasifikasi) {
                $query->whereIn('id', $klasifikasi->pluck('id'));
            })
            ->where('status', 'aktif')
            ->latest()
            ->get();

        // Render Blade partial and return as HTML
        if ($informasis->isEmpty()) {
            # code...
            $html = '';
        } else {
            $html = view('components.list-card-informasi', compact('informasis'))->render();
        }

        return response()->json([
            'html' => $html,
            'count' => $informasis->count(),
        ]);
    }
}
