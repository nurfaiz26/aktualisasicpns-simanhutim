<?php

namespace App\Filament\Resources\GambarBeritas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GambarBeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('berita_id')
                    ->relationship('berita', 'judul')
                    ->searchable()
                    ->required(),
                Textarea::make('url')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
