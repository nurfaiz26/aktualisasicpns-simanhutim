<?php

namespace App\Filament\Resources\GambarBeritas;

use App\Filament\Resources\GambarBeritas\Pages\CreateGambarBerita;
use App\Filament\Resources\GambarBeritas\Pages\EditGambarBerita;
use App\Filament\Resources\GambarBeritas\Pages\ListGambarBeritas;
use App\Filament\Resources\GambarBeritas\Schemas\GambarBeritaForm;
use App\Filament\Resources\GambarBeritas\Tables\GambarBeritasTable;
use App\Models\GambarBerita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class GambarBeritaResource extends Resource
{
    protected static ?string $model = GambarBerita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Camera;

    protected static ?string $recordTitleAttribute = 'Gambar Berita';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Berita";

    protected static string|null $navigationLabel = "Gambar Berita";

    public static function form(Schema $schema): Schema
    {
        return GambarBeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GambarBeritasTable::configure($table);
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
            'index' => ListGambarBeritas::route('/'),
            'create' => CreateGambarBerita::route('/create'),
            'edit' => EditGambarBerita::route('/{record}/edit'),
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
