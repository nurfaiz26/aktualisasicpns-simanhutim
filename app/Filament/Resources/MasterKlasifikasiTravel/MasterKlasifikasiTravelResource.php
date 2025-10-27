<?php

namespace App\Filament\Resources\MasterKlasifikasiTravel;

use App\Filament\Resources\MasterKlasifikasiTravel\Pages\CreateMasterKlasifikasiTravel;
use App\Filament\Resources\MasterKlasifikasiTravel\Pages\EditMasterKlasifikasiTravel;
use App\Filament\Resources\MasterKlasifikasiTravel\Pages\ListMasterKlasifikasiTravel;
use App\Filament\Resources\MasterKlasifikasiTravel\Schemas\MasterKlasifikasiTravelForm;
use App\Filament\Resources\MasterKlasifikasiTravel\Tables\MasterKlasifikasiTravelTable;
use App\Models\MasterKlasifikasiTravel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class MasterKlasifikasiTravelResource extends Resource
{
    protected static ?string $model = MasterKlasifikasiTravel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::InboxStack;

    protected static ?string $recordTitleAttribute = 'Master Klasifikasi Travel';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Travel";

    protected static string|null $navigationLabel = "Master Klasifikasi Travel";

    public static function form(Schema $schema): Schema
    {
        return MasterKlasifikasiTravelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterKlasifikasiTravelTable::configure($table);
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
            'index' => ListMasterKlasifikasiTravel::route('/'),
            'create' => CreateMasterKlasifikasiTravel::route('/create'),
            'edit' => EditMasterKlasifikasiTravel::route('/{record}/edit'),
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
