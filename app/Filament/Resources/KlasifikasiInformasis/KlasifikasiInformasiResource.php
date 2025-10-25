<?php

namespace App\Filament\Resources\KlasifikasiInformasis;

use App\Filament\Resources\KlasifikasiInformasis\Pages\CreateKlasifikasiInformasi;
use App\Filament\Resources\KlasifikasiInformasis\Pages\EditKlasifikasiInformasi;
use App\Filament\Resources\KlasifikasiInformasis\Pages\ListKlasifikasiInformasis;
use App\Filament\Resources\KlasifikasiInformasis\Schemas\KlasifikasiInformasiForm;
use App\Filament\Resources\KlasifikasiInformasis\Tables\KlasifikasiInformasisTable;
use App\Models\KlasifikasiInformasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class KlasifikasiInformasiResource extends Resource
{
    protected static ?string $model = KlasifikasiInformasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    protected static ?string $recordTitleAttribute = 'Klasifikasi Informasi';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Informasi";

    protected static string|null $navigationLabel = "Klasifikasi Informasi";

    public static function form(Schema $schema): Schema
    {
        return KlasifikasiInformasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KlasifikasiInformasisTable::configure($table);
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
            'index' => ListKlasifikasiInformasis::route('/'),
            'create' => CreateKlasifikasiInformasi::route('/create'),
            'edit' => EditKlasifikasiInformasi::route('/{record}/edit'),
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
