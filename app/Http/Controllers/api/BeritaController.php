<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KlasifikasiBerita;
use App\Models\MasterKlasifikasiBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function search()
    {
        $keyword = request()->keyword;
        $filter = request()->filter;

        $mKlasifikasi = MasterKlasifikasiBerita::find($filter);

        $klasifikasi = KlasifikasiBerita::when($mKlasifikasi, function ($q) use ($mKlasifikasi) {
            return $q->where('master_klasifikasi_berita_id', $mKlasifikasi->id);
        })->get();

        $listBeritas = Berita::with(['gambars', 'klasifikasis'])
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
        $html = view('components.list-card-berita', compact('listBeritas'))->render();

        return response()->json([
            'html' => $html,
            'count' => $listBeritas->count(),
        ]);
    }
}
