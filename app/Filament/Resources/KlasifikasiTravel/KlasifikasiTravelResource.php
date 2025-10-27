<?php

namespace App\Filament\Resources\KlasifikasiTravel;

use App\Filament\Resources\KlasifikasiTravel\Pages\CreateKlasifikasiTravel;
use App\Filament\Resources\KlasifikasiTravel\Pages\EditKlasifikasiTravel;
use App\Filament\Resources\KlasifikasiTravel\Pages\ListKlasifikasiTravel;
use App\Filament\Resources\KlasifikasiTravel\Schemas\KlasifikasiTravelForm;
use App\Filament\Resources\KlasifikasiTravel\Tables\KlasifikasiTravelTable;
use App\Models\KlasifikasiTravel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class KlasifikasiTravelResource extends Resource
{
    protected static ?string $model = KlasifikasiTravel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    protected static ?string $recordTitleAttribute = 'Klasifikasi Travel';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Travel";

    protected static string|null $navigationLabel = "Klasifikasi Travel";

    public static function form(Schema $schema): Schema
    {
        return KlasifikasiTravelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KlasifikasiTravelTable::configure($table);
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
            'index' => ListKlasifikasiTravel::route('/'),
            'create' => CreateKlasifikasiTravel::route('/create'),
            'edit' => EditKlasifikasiTravel::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
