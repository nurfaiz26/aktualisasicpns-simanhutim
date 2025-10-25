<?php

namespace App\Filament\Resources\GambarInformasis\Pages;

use App\Filament\Resources\GambarInformasis\GambarInformasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGambarInformasis extends ListRecords
{
    protected static string $resource = GambarInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
