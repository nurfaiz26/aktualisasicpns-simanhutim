<?php

namespace App\Filament\Resources\LaporanTravel;

use App\Filament\Resources\LaporanTravel\Pages\CreateLaporanTravel;
use App\Filament\Resources\LaporanTravel\Pages\EditLaporanTravel;
use App\Filament\Resources\LaporanTravel\Pages\ListLaporanTravel;
use App\Filament\Resources\LaporanTravel\Schemas\LaporanTravelForm;
use App\Filament\Resources\LaporanTravel\Tables\LaporanTravelTable;
use App\Models\LaporanTravel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LaporanTravelResource extends Resource
{
    protected static ?string $model = LaporanTravel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ExclamationCircle;

    protected static ?string $recordTitleAttribute = 'Laporan Travel';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Travel";

    protected static string|null $navigationLabel = "Laporan Travel";

    public static function form(Schema $schema): Schema
    {
        return LaporanTravelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaporanTravelTable::configure($table);
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
            'index' => ListLaporanTravel::route('/'),
            'create' => CreateLaporanTravel::route('/create'),
            'edit' => EditLaporanTravel::route('/{record}/edit'),
        ];
    }
}
