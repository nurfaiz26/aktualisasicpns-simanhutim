<?php

namespace App\Filament\Resources\Travel\Pages;

use App\Filament\Resources\Travel\TravelResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTravel extends ListRecords
{
    protected static string $resource = TravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            // Tambahkan action untuk mengarahkan ke halaman import
            Action::make('import')
                ->label('Import CSV')
                ->icon('heroicon-o-arrow-up-tray')
                ->url(static::getResource()::getUrl('import')),
        ];
    }
}
