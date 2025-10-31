<?php

namespace App\Filament\Resources\KomentarGoogleTravel\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KomentarGoogleTravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('travel_id')
                    ->required()
                    ->relationship('travel', 'nama'),
                TextInput::make('author_name')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
                TextInput::make('time')
                    ->required(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
