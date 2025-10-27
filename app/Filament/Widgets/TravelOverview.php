<?php

namespace App\Filament\Widgets;

use App\Models\Travel;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TravelOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Travel';

    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Travel Total', Travel::all()->count()),
            Stat::make('Jumlah Travel Aktif', Travel::where('status', 'aktif')->count()),
            Stat::make('Jumlah Travel Non Aktif', Travel::where('status', 'nonaktif')->count()),
        ];
    }
}
