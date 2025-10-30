<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class TravelController extends Controller
{
    public function search()
    {
        $keyword = request()->keyword;

        $travels = Travel::with(['gambars', 'klasifikasis', 'kota'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->where('status', 'aktif')
            ->latest()
            ->get();

        // Render Blade partial and return as HTML
        $html = view('components.list-card-travel', compact('travels'))->render();

        return response()->json([
            'html' => $html,
            'count' => $travels->count(),
        ]);
    }
}
