<?php

namespace App\Filament\Resources\KlasifikasiBeritas\Pages;

use App\Filament\Resources\KlasifikasiBeritas\KlasifikasiBeritaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKlasifikasiBeritas extends ListRecords
{
    protected static string $resource = KlasifikasiBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
