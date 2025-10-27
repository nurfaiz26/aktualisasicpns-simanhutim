<?php

namespace App\Filament\Resources\GambarTravel;

use App\Filament\Resources\GambarTravel\Pages\CreateGambarTravel;
use App\Filament\Resources\GambarTravel\Pages\EditGambarTravel;
use App\Filament\Resources\GambarTravel\Pages\ListGambarTravel;
use App\Filament\Resources\GambarTravel\Schemas\GambarTravelForm;
use App\Filament\Resources\GambarTravel\Tables\GambarTravelTable;
use App\Models\GambarTravel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class GambarTravelResource extends Resource
{
    protected static ?string $model = GambarTravel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Camera;

    protected static ?string $recordTitleAttribute = 'Gambar Travel';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Travel";

    protected static string|null $navigationLabel = "Gambar Travel";

    public static function form(Schema $schema): Schema
    {
        return GambarTravelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GambarTravelTable::configure($table);
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
            'index' => ListGambarTravel::route('/'),
            'create' => CreateGambarTravel::route('/create'),
            'edit' => EditGambarTravel::route('/{record}/edit'),
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
