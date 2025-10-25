<?php

namespace App\Filament\Resources\KlasifikasiInformasis\Pages;

use App\Filament\Resources\KlasifikasiInformasis\KlasifikasiInformasiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditKlasifikasiInformasi extends EditRecord
{
    protected static string $resource = KlasifikasiInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
