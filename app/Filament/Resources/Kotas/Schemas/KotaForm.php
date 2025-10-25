<?php

namespace App\Filament\Resources\Kotas\Schemas;

use App\Models\Provinsi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('provinsi_id')
                    ->required()
                    ->relationship('provinsi', 'nama'),
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
