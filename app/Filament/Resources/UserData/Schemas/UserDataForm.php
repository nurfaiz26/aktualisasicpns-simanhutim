<?php

namespace App\Filament\Resources\UserData\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserDataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kota_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('no_telepon')
                    ->tel()
                    ->required(),
                TextInput::make('no_ktp')
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
