<?php

namespace App\Filament\Resources\MasterKlasifikasiBeritas\Pages;

use App\Filament\Resources\MasterKlasifikasiBeritas\MasterKlasifikasiBeritaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterKlasifikasiBeritas extends ListRecords
{
    protected static string $resource = MasterKlasifikasiBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
