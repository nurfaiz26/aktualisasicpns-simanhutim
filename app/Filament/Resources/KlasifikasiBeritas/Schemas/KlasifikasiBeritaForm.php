<?php

namespace App\Filament\Resources\KlasifikasiBeritas\Schemas;

use App\Models\MasterKlasifikasiBerita;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KlasifikasiBeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('berita_id')
                    ->relationship('berita', 'judul')
                    ->searchable()
                    ->required(),
                Select::make('master_klasifikasi_berita_id')
                    ->required()
                    ->options(MasterKlasifikasiBerita::query()->pluck('nama', 'id'))
                    ->searchable(),
            ]);
    }
}
