<?php

namespace App\Filament\Resources\MasterKlasifikasiBeritas\Pages;

use App\Filament\Resources\MasterKlasifikasiBeritas\MasterKlasifikasiBeritaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterKlasifikasiBerita extends EditRecord
{
    protected static string $resource = MasterKlasifikasiBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
