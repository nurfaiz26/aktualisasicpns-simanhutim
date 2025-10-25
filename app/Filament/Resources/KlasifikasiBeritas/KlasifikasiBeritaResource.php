<?php

namespace App\Filament\Resources\KlasifikasiBeritas;

use App\Filament\Resources\KlasifikasiBeritas\Pages\CreateKlasifikasiBerita;
use App\Filament\Resources\KlasifikasiBeritas\Pages\EditKlasifikasiBerita;
use App\Filament\Resources\KlasifikasiBeritas\Pages\ListKlasifikasiBeritas;
use App\Filament\Resources\KlasifikasiBeritas\Schemas\KlasifikasiBeritaForm;
use App\Filament\Resources\KlasifikasiBeritas\Tables\KlasifikasiBeritasTable;
use App\Models\KlasifikasiBerita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class KlasifikasiBeritaResource extends Resource
{
    protected static ?string $model = KlasifikasiBerita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    protected static ?string $recordTitleAttribute = 'Klasifikasi Berita';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Berita";

    protected static string|null $navigationLabel = "Klasifikasi Berita";

    public static function form(Schema $schema): Schema
    {
        return KlasifikasiBeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KlasifikasiBeritasTable::configure($table);
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
            'index' => ListKlasifikasiBeritas::route('/'),
            'create' => CreateKlasifikasiBerita::route('/create'),
            'edit' => EditKlasifikasiBerita::route('/{record}/edit'),
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
