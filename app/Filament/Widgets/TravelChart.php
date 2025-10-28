<?php

namespace App\Filament\Widgets;

use App\Models\Travel;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class TravelChart extends ChartWidget
{
    protected ?string $heading = 'Travel Chart';

    protected function getData(): array
    {
        $year = now()->year;

        $travelPerMonth = Travel::whereYear('created_at', $year)
            ->get()
            ->groupBy(fn($item) => $item->created_at->format('F'))
            ->map(fn($group) => $group->count());

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Travel Terdaftar per Bulan (' . $year . ')',
                    'data' => $travelPerMonth->values(), // ambil nilai jumlah
                ],
            ],
            'labels' => $travelPerMonth->keys(), // ambil nama bulan
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
