<?php

namespace App\Filament\Resources\GambarTravel\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GambarTravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('travel_id')
                    ->relationship('travel', 'nama')
                    ->searchable()
                    ->required(),
                FileUpload::make('url')
                    ->required()
                    ->image()
                    ->maxSize(5120),
            ]);
    }
}
