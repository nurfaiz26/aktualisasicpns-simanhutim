<?php

namespace App\Filament\Resources\Travel\Schemas;

use App\Models\LaporanTravel;
use App\Models\MasterKlasifikasiTravel;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kota_id')
                    ->nullable()
                    ->relationship('kota', 'nama'),
                TextInput::make('rating')
                    ->nullable()
                    ->maxValue(5)
                    ->numeric(),
                TextInput::make('jumlah_pelanggaran')
                    ->nullable()
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
                    ->nullable(),
                DateTimePicker::make('tgl_akreditasi_akhir')
                    ->nullable(),
                TextInput::make('gmap_place_id')
                    ->nullable(),
                TextInput::make('gmap_url')
                    ->nullable(),
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
                    // ->minItems(1)
                    ->relationship('gambars')
                    ->schema([
                        FileUpload::make('url')
                            ->label('Gambar')
                            ->image()
                            ->required()
                            ->maxSize(5120),
                    ]),
                Repeater::make('komentarGoogles')
                    ->label('Komentar Google')
                    // ->minItems(1)
                    ->relationship('komentarGoogles')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('author_name')
                            ->required(),
                        TextInput::make('rating')
                            ->required()
                            ->numeric(),
                        DateTimePicker::make('time')
                            ->required(),
                        Textarea::make('text')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Laporan Travel')
                ->columnSpanFull()
                    ->description('Daftar laporan yang terkait dengan travel ini')
                    ->schema([
                        Repeater::make('laporans')
                            ->relationship('laporans') // relasi hasMany
                            ->schema([
                                TextInput::make('deskripsi')->label('Deskripsi'),
                                TextInput::make('link_bukti')->label('Link Bukti'),
                                DateTimePicker::make('created_at')->label('Created At'),
                                Select::make('status')->label('Status')->options(['pending' => 'Pending', 'diterima' => 'Diterima', 'ditolak' => 'Ditolak']),
                            ])
                            // ->disabled() // kalau hanya ingin tampilkan tanpa bisa ubah
                            ->columns(3)
                            ->collapsible(),
                    ])
                    ->visible(
                        fn($livewire) =>
                        $livewire instanceof \Filament\Resources\Pages\EditRecord ||
                            $livewire instanceof \Filament\Resources\Pages\ViewRecord
                    ),
            ]);
    }
}
