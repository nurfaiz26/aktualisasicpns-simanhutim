<?php

namespace App\Filament\Resources\Provinsis;

use App\Filament\Resources\Provinsis\Pages\CreateProvinsi;
use App\Filament\Resources\Provinsis\Pages\EditProvinsi;
use App\Filament\Resources\Provinsis\Pages\ListProvinsis;
use App\Filament\Resources\Provinsis\Schemas\ProvinsiForm;
use App\Filament\Resources\Provinsis\Tables\ProvinsisTable;
use App\Models\Provinsi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProvinsiResource extends Resource
{
    protected static ?string $model = Provinsi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::InboxStack;

    protected static ?string $recordTitleAttribute = 'Provinsi';

    protected static string|UnitEnum|null $navigationGroup = "Master Daerah";

    protected static string|null $navigationLabel = "Provinsi";

    public static function form(Schema $schema): Schema
    {
        return ProvinsiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProvinsisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProvinsis::route('/'),
            'create' => CreateProvinsi::route('/create'),
            'edit' => EditProvinsi::route('/{record}/edit'),
        ];
    }
}
