<?php

namespace App\Filament\Resources\GambarInformasis\Pages;

use App\Filament\Resources\GambarInformasis\GambarInformasiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditGambarInformasi extends EditRecord
{
    protected static string $resource = GambarInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
