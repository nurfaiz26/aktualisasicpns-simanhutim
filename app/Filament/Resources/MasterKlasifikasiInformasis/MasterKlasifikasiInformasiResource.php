<?php

namespace App\Filament\Resources\MasterKlasifikasiInformasis;

use App\Filament\Resources\MasterKlasifikasiInformasis\Pages\CreateMasterKlasifikasiInformasi;
use App\Filament\Resources\MasterKlasifikasiInformasis\Pages\EditMasterKlasifikasiInformasi;
use App\Filament\Resources\MasterKlasifikasiInformasis\Pages\ListMasterKlasifikasiInformasis;
use App\Filament\Resources\MasterKlasifikasiInformasis\Schemas\MasterKlasifikasiInformasiForm;
use App\Filament\Resources\MasterKlasifikasiInformasis\Tables\MasterKlasifikasiInformasisTable;
use App\Models\MasterKlasifikasiInformasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterKlasifikasiInformasiResource extends Resource
{
    protected static ?string $model = MasterKlasifikasiInformasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Master Klasifikasi Informasi';

    public static function form(Schema $schema): Schema
    {
        return MasterKlasifikasiInformasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterKlasifikasiInformasisTable::configure($table);
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
            'index' => ListMasterKlasifikasiInformasis::route('/'),
            'create' => CreateMasterKlasifikasiInformasi::route('/create'),
            'edit' => EditMasterKlasifikasiInformasi::route('/{record}/edit'),
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
