<?php

namespace App\Filament\Resources\LaporanTravel\Pages;

use App\Filament\Resources\LaporanTravel\LaporanTravelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLaporanTravel extends ListRecords
{
    protected static string $resource = LaporanTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
