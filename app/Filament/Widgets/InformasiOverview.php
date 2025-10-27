<?php

namespace App\Filament\Widgets;

use App\Models\Informasi;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InformasiOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Informasi';

    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Informasi Total', Informasi::all()->count()),
            Stat::make('Jumlah Informasi Aktif', Informasi::where('status', 'aktif')->count()),
            Stat::make('Jumlah Informasi Non Aktif', Informasi::where('status', 'nonaktif')->count()),
        ];
    }
}
