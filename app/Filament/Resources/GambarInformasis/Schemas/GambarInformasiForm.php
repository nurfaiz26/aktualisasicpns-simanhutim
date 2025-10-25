<?php

namespace App\Filament\Resources\GambarInformasis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GambarInformasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('informasi_id')
                    ->relationship('informasi', 'judul')
                    ->searchable()
                    ->required(),
                FileUpload::make('url')
                    ->required()
                    ->image()
                    ->maxSize(5120),
            ]);
    }
}
