<?php

namespace App\Filament\Resources\KomentarGoogleTravel\Pages;

use App\Filament\Resources\KomentarGoogleTravel\KomentarGoogleTravelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKomentarGoogleTravel extends ListRecords
{
    protected static string $resource = KomentarGoogleTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
