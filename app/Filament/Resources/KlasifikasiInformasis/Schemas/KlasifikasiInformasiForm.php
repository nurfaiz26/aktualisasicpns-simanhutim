<?php

namespace App\Filament\Resources\KlasifikasiInformasis\Schemas;

use App\Models\MasterKlasifikasiInformasi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KlasifikasiInformasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('informasi_id')
                    ->relationship('informasi', 'judul')
                    ->required(),
                Select::make('master_klasifikasi_informasi_id')
                    ->required()
                    ->options(MasterKlasifikasiInformasi::query()->pluck('nama', 'id'))
                    ->searchable(),
            ]);
    }
}
