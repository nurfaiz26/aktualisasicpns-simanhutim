<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\KlasifikasiTravel;
use App\Models\MasterKlasifikasiTravel;
use App\Models\Travel;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class TravelController extends Controller
{
    public function search()
    {
        $keyword = request()->keyword;
        $filter = request()->filter;

        $mKlasifikasi = MasterKlasifikasiTravel::find($filter);

        $klasifikasi = KlasifikasiTravel::when($mKlasifikasi, function ($q) use ($mKlasifikasi) {
            return $q->where('master_klasifikasi_travel_id', $mKlasifikasi->id);
        })->get();

        // return response()->json(!$klasifikasi->isEmpty());

        $listTravels = Travel::with(['gambars', 'klasifikasis'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%');
            })
            ->whereIn('id', $klasifikasi->pluck('id'))
            ->where('status', 'aktif')
            ->latest()
            ->get();

        // Render Blade partial and return as HTML
        $html = view('components.list-card-travel', compact('listTravels'))->render();

        return response()->json([
            'html' => $html,
            'count' => $listTravels->count(),
        ]);
    }
}
