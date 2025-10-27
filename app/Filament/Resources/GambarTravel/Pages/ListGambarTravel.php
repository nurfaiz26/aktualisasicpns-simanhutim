<?php

namespace App\Filament\Resources\GambarTravel\Pages;

use App\Filament\Resources\GambarTravel\GambarTravelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGambarTravel extends ListRecords
{
    protected static string $resource = GambarTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
