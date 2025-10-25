<?php

namespace App\Filament\Resources\KlasifikasiBeritas\Pages;

use App\Filament\Resources\KlasifikasiBeritas\KlasifikasiBeritaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditKlasifikasiBerita extends EditRecord
{
    protected static string $resource = KlasifikasiBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
