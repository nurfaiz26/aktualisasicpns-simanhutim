<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\KlasifikasiTravel;
use App\Models\MasterKlasifikasiTravel;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            ->orderBy('gmap_place_id', 'DESC')->limit(6)->get();

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

    public function placeId()
    {
        if (!request()->namaTempat || request()->namaTempat == '') {
            # code...
            return response()->json([
                'message' => 'Request nama tempat tidak ada',
            ], 400);
        }

        $googleApiKey = env('GOOGLE_API_KEY');
        $apiUrl = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json";
        $namaTempatArr = explode(' ', request()->namaTempat);
        $namaTempat = '';
        foreach ($namaTempatArr as $index => $nama) {
            # code...
            if ($index == 0) {
                # code...
                $namaTempat .= $nama;
            }

            $namaTempat .= '+' . $nama;
        }

        try {
            //code...
            $response = Http::get($apiUrl, [
                'input' => $namaTempat,
                'inputtype' => 'textquery',
                'fields' => 'place_id',
                'key' => $googleApiKey,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Bad Request',
                'error' => $e->getMessage(),
            ], 400);
        }

        return response()->json($response->json());
    }

    public function place()
    {
        if (!request()->tempatId || request()->tempatId == '') {
            # code...
            return response()->json([
                'message' => 'Request tempat id tidak ada',
            ], 400);
        }

        $googleApiKey = env('GOOGLE_API_KEY');
        $apiUrl = "https://maps.googleapis.com/maps/api/place/details/json";
        $tempatId = request()->tempatId;

        // dokumentasi api untuk mendapat data map
        try {
            //code...
            $response = Http::get($apiUrl, [
                'place_id' => $tempatId,
                'fields' => 'url,name,rating,reviews,photos,formatted_address,geometry',
                'language' => 'id',
                'reviews_sort' => 'newest',
                'key' => $googleApiKey,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Bad Request',
                'error' => $e->getMessage(),
            ], 400);
        }

        return response()->json($response->json());
    }
}
