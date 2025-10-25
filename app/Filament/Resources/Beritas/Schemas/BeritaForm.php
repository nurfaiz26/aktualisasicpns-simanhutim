<?php

namespace App\Filament\Resources\Beritas\Schemas;

use App\Models\MasterKlasifikasiBerita;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Berita')
                    ->required(),
                Select::make('status')
                    ->label('Status Berita')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi Berita')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('klasifikasis')
                    ->label('Klasifikasi Berita')
                    ->minItems(1)
                    ->relationship('klasifikasis')
                    ->schema([
                        Select::make('master_klasifikasi_berita_id')
                            ->label('Klasifikasi')
                            ->options(MasterKlasifikasiBerita::query()->pluck('nama', 'id'))
                            ->distinct()
                            ->required(),
                    ]),
                Repeater::make('gambars')
                    ->label('Gambar Berita')
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
