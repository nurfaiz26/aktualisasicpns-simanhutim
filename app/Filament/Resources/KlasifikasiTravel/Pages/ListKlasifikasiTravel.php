<?php

namespace App\Filament\Resources\KlasifikasiTravel\Pages;

use App\Filament\Resources\KlasifikasiTravel\KlasifikasiTravelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKlasifikasiTravel extends ListRecords
{
    protected static string $resource = KlasifikasiTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
