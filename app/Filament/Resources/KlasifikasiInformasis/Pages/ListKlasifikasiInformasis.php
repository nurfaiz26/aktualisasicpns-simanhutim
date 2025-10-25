<?php

namespace App\Filament\Resources\KlasifikasiInformasis\Pages;

use App\Filament\Resources\KlasifikasiInformasis\KlasifikasiInformasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKlasifikasiInformasis extends ListRecords
{
    protected static string $resource = KlasifikasiInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
