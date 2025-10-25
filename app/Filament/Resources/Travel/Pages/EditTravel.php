<?php

namespace App\Filament\Resources\Travel\Pages;

use App\Filament\Resources\Travel\TravelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTravel extends EditRecord
{
    protected static string $resource = TravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
