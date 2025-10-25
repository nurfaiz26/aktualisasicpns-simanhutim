<?php

namespace App\Filament\Resources\MasterKlasifikasiBeritas;

use App\Filament\Resources\MasterKlasifikasiBeritas\Pages\CreateMasterKlasifikasiBerita;
use App\Filament\Resources\MasterKlasifikasiBeritas\Pages\EditMasterKlasifikasiBerita;
use App\Filament\Resources\MasterKlasifikasiBeritas\Pages\ListMasterKlasifikasiBeritas;
use App\Filament\Resources\MasterKlasifikasiBeritas\Schemas\MasterKlasifikasiBeritaForm;
use App\Filament\Resources\MasterKlasifikasiBeritas\Tables\MasterKlasifikasiBeritasTable;
use App\Models\MasterKlasifikasiBerita;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterKlasifikasiBeritaResource extends Resource
{
    protected static ?string $model = MasterKlasifikasiBerita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::InboxStack;

    protected static ?string $recordTitleAttribute = 'Master Klasifikasi Berita';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Berita";

    protected static string|null $navigationLabel = "Master Klasifikasi Berita";

    public static function form(Schema $schema): Schema
    {
        return MasterKlasifikasiBeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterKlasifikasiBeritasTable::configure($table);
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
            'index' => ListMasterKlasifikasiBeritas::route('/'),
            'create' => CreateMasterKlasifikasiBerita::route('/create'),
            'edit' => EditMasterKlasifikasiBerita::route('/{record}/edit'),
        ];
    }
}
