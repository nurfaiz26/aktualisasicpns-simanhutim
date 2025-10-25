<?php

namespace App\Filament\Resources\MasterKlasifikasiInformasis\Pages;

use App\Filament\Resources\MasterKlasifikasiInformasis\MasterKlasifikasiInformasiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterKlasifikasiInformasi extends EditRecord
{
    protected static string $resource = MasterKlasifikasiInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
