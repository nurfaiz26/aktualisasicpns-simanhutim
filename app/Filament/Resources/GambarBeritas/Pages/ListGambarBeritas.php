<?php

namespace App\Filament\Resources\GambarBeritas\Pages;

use App\Filament\Resources\GambarBeritas\GambarBeritaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGambarBeritas extends ListRecords
{
    protected static string $resource = GambarBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
