<?php

namespace App\Filament\Resources\KomentarGoogleTravel\Pages;

use App\Filament\Resources\KomentarGoogleTravel\KomentarGoogleTravelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKomentarGoogleTravel extends EditRecord
{
    protected static string $resource = KomentarGoogleTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
