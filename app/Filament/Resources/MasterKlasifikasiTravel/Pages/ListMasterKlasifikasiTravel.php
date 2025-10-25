<?php

namespace App\Filament\Resources\MasterKlasifikasiTravel\Pages;

use App\Filament\Resources\MasterKlasifikasiTravel\MasterKlasifikasiTravelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterKlasifikasiTravel extends ListRecords
{
    protected static string $resource = MasterKlasifikasiTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
