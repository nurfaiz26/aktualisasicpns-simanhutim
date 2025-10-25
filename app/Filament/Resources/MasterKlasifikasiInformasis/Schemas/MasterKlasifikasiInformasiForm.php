<?php

namespace App\Filament\Resources\MasterKlasifikasiInformasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterKlasifikasiInformasiForm
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
