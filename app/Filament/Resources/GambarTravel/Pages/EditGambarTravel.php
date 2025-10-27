<?php

namespace App\Filament\Resources\GambarTravel\Pages;

use App\Filament\Resources\GambarTravel\GambarTravelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditGambarTravel extends EditRecord
{
    protected static string $resource = GambarTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
