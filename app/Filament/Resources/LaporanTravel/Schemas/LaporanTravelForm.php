<?php

namespace App\Filament\Resources\LaporanTravel\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LaporanTravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('travel_id')
                    ->required()
                    ->relationship('travel', 'nama'),
                Select::make('user_id')
                    ->nullable()
                    ->relationship('user', 'name'),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('link_bukti')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'diterima' => 'Diterima', 'ditolak' => 'Ditolak'])
                    ->required(),
            ]);
    }
}
