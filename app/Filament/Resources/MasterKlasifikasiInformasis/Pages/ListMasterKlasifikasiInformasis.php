<?php

namespace App\Filament\Resources\MasterKlasifikasiInformasis\Pages;

use App\Filament\Resources\MasterKlasifikasiInformasis\MasterKlasifikasiInformasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterKlasifikasiInformasis extends ListRecords
{
    protected static string $resource = MasterKlasifikasiInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
