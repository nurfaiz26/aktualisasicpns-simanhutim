<?php

namespace App\Filament\Resources\GambarInformasis;

use App\Filament\Resources\GambarInformasis\Pages\CreateGambarInformasi;
use App\Filament\Resources\GambarInformasis\Pages\EditGambarInformasi;
use App\Filament\Resources\GambarInformasis\Pages\ListGambarInformasis;
use App\Filament\Resources\GambarInformasis\Schemas\GambarInformasiForm;
use App\Filament\Resources\GambarInformasis\Tables\GambarInformasisTable;
use App\Models\GambarInformasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class GambarInformasiResource extends Resource
{
    protected static ?string $model = GambarInformasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Camera;

    protected static ?string $recordTitleAttribute = 'Gambar Informasi';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Informasi";

    protected static string|null $navigationLabel = "Gambar Informasi";

    public static function form(Schema $schema): Schema
    {
        return GambarInformasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GambarInformasisTable::configure($table);
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
            'index' => ListGambarInformasis::route('/'),
            'create' => CreateGambarInformasi::route('/create'),
            'edit' => EditGambarInformasi::route('/{record}/edit'),
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
