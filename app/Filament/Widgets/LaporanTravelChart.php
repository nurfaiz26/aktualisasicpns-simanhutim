<?php

namespace App\Filament\Widgets;

use App\Models\LaporanTravel;
use Filament\Widgets\ChartWidget;

class LaporanTravelChart extends ChartWidget
{
    protected ?string $heading = 'Laporan Travel Chart';

    protected function getData(): array
    {
        $year = now()->year;

        $travelPerMonth = LaporanTravel::whereYear('created_at', $year)
            ->get()
            ->groupBy(fn($item) => $item->created_at->format('F'))
            ->map(fn($group) => $group->count());

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Laporan Travel Terdaftar per Bulan (' . $year . ')',
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
