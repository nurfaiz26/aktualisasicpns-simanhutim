<?php

namespace App\Filament\Resources\KomentarGoogleTravel;

use App\Filament\Resources\KomentarGoogleTravel\Pages\CreateKomentarGoogleTravel;
use App\Filament\Resources\KomentarGoogleTravel\Pages\EditKomentarGoogleTravel;
use App\Filament\Resources\KomentarGoogleTravel\Pages\ListKomentarGoogleTravel;
use App\Filament\Resources\KomentarGoogleTravel\Schemas\KomentarGoogleTravelForm;
use App\Filament\Resources\KomentarGoogleTravel\Tables\KomentarGoogleTravelTable;
use App\Models\KomentarGoogleTravel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KomentarGoogleTravelResource extends Resource
{
    protected static ?string $model = KomentarGoogleTravel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChatBubbleBottomCenterText;

    protected static ?string $recordTitleAttribute = 'Komentar Google Travel';

    protected static string|UnitEnum|null $navigationGroup = "Manajemen Travel";

    protected static string|null $navigationLabel = "Komentar Google Travel";

    public static function form(Schema $schema): Schema
    {
        return KomentarGoogleTravelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KomentarGoogleTravelTable::configure($table);
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
            'index' => ListKomentarGoogleTravel::route('/'),
            'create' => CreateKomentarGoogleTravel::route('/create'),
            'edit' => EditKomentarGoogleTravel::route('/{record}/edit'),
        ];
    }
}
