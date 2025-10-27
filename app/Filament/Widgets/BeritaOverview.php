<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BeritaOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Berita';

    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Berita Total', Berita::all()->count()),
            Stat::make('Jumlah Berita Aktif', Berita::where('status', 'aktif')->count()),
            Stat::make('Jumlah Berita Non Aktif', Berita::where('status', 'nonaktif')->count()),
        ];
    }
}
