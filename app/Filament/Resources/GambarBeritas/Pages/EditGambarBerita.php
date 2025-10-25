<?php

namespace App\Filament\Resources\GambarBeritas\Pages;

use App\Filament\Resources\GambarBeritas\GambarBeritaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditGambarBerita extends EditRecord
{
    protected static string $resource = GambarBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
