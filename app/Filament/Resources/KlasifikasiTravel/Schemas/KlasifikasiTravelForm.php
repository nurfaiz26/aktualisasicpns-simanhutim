<?php

namespace App\Filament\Resources\KlasifikasiTravel\Schemas;

use App\Models\MasterKlasifikasiTravel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KlasifikasiTravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('travel_id')
                    ->relationship('travel', 'nama')
                    ->required(),
                Select::make('master_klasifikasi_travel_id')
                    ->required()
                    ->options(MasterKlasifikasiTravel::all()->pluck('nama', 'id'))
                    ->searchable(),
            ]);
    }
}
