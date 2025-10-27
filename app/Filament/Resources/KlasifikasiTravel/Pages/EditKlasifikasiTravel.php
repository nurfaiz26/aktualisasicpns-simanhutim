<?php

namespace App\Filament\Resources\KlasifikasiTravel\Pages;

use App\Filament\Resources\KlasifikasiTravel\KlasifikasiTravelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditKlasifikasiTravel extends EditRecord
{
    protected static string $resource = KlasifikasiTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
