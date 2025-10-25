<?php

namespace App\Filament\Resources\MasterKlasifikasiBeritas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterKlasifikasiBeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
