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

        $klasifikasi = KlasifikasiTravel::where('master_klasifikasi_travel_id', $mKlasifikasi ? $mKlasifikasi->id : null)
            //     ->when($mKlasifikasi, function ($q) use ($mKlasifikasi) {
            //     return $q->where('master_klasifikasi_travel_id', $mKlasifikasi->id);
            // })
            ->get();

        // return response()->json(!$klasifikasi->isEmpty());

        $listTravels = Travel::with(['gambars', 'klasifikasis'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->when($filter, function ($query) use ($klasifikasi) {
                $query->whereIn('id', $klasifikasi->pluck('travel_id'));
            })
            ->where('status', 'aktif')
            ->latest()->limit(5)->get();

        // $listTravels = ($keyword || $filter)
        //     ? $query->paginate(10)
        //     : $query->limit(5)->get();


        // Render Blade partial and return as HTML
        $html = view('components.list-card-travel', compact('listTravels', 'keyword', 'filter'))->render();

        return response()->json([
            'html' => $html,
            'count' => $listTravels->count(),
        ]);
    }
}
