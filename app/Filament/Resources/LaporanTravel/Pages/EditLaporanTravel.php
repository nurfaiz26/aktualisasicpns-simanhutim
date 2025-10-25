<?php

namespace App\Filament\Resources\LaporanTravel\Pages;

use App\Filament\Resources\LaporanTravel\LaporanTravelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLaporanTravel extends EditRecord
{
    protected static string $resource = LaporanTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
