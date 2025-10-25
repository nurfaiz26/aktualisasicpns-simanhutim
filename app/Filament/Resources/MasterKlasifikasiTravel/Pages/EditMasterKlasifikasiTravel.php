<?php

namespace App\Filament\Resources\MasterKlasifikasiTravel\Pages;

use App\Filament\Resources\MasterKlasifikasiTravel\MasterKlasifikasiTravelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterKlasifikasiTravel extends EditRecord
{
    protected static string $resource = MasterKlasifikasiTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
