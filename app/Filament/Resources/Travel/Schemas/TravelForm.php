<?php

namespace App\Filament\Resources\Travel\Schemas;

use App\Models\Kota;
use App\Models\MasterKlasifikasiTravel;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kota_id')
                    ->required()
                    ->relationship('kota', 'nama'),
                TextInput::make('rating')
                    ->required()
                    ->maxValue(5)
                    ->numeric(),
                TextInput::make('jumlah_pelanggaran')
                    ->required()
                    ->numeric(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('no_telepon')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('direktur')
                    ->required(),
                TextInput::make('no_sk')
                    ->required(),
                TextInput::make('akreditasi')
                    ->required(),
                Select::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->required(),
                DateTimePicker::make('tgl_sk')
                    ->required(),
                DateTimePicker::make('tgl_akreditasi_awal')
                    ->required(),
                DateTimePicker::make('tgl_akreditasi_akhir')
                    ->required(),
                Repeater::make('klasifikasis')
                    ->label('Klasifikasi Travel')
                    ->minItems(1)
                    ->relationship('klasifikasis')
                    ->schema([
                        Select::make('master_klasifikasi_travel_id')
                            ->label('Klasifikasi')
                            ->options(MasterKlasifikasiTravel::query()->pluck('nama', 'id'))
                            ->distinct()
                            ->required(),
                    ]),
                Repeater::make('gambars')
                    ->label('Gambar Travel')
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
