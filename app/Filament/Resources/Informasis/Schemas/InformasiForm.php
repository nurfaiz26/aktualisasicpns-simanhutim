<?php

namespace App\Filament\Resources\Informasis\Schemas;

use App\Models\MasterKlasifikasiInformasi;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InformasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Informasi')
                    ->required(),
                Select::make('status')
                    ->label('Status Informasi')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi Informasi')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('klasifikasis')
                    ->label('Klasifikasi Informasi')
                    ->minItems(1)
                    ->relationship('klasifikasis')
                    ->schema([
                        Select::make('master_klasifikasi_informasi_id')
                            ->label('Klasifikasi')
                            ->options(MasterKlasifikasiInformasi::query()->pluck('nama', 'id'))
                            ->distinct()
                            ->required(),
                    ]),
                Repeater::make('gambars')
                    ->label('Gambar Informasi')
                    ->minItems(1)
                    ->relationship('gambars')
                    ->schema([
                        FileUpload::make('url')
                            ->label('Gambar')
                            ->image()
                            ->required()
                            ->maxSize(5120),
                    ]),
            ]);
    }
}
