<?php

namespace App\Filament\Resources\Travel\Tables;

use App\Models\MasterKlasifikasiTravel;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TravelTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kota.nama')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jumlah_pelanggaran')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('no_telepon')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('direktur')
                    ->searchable(),
                TextColumn::make('no_sk')
                    ->searchable(),
                TextColumn::make('akreditasi')
                    ->searchable(),
                SelectColumn::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif']),
                TextColumn::make('tgl_sk')
                    ->label('Tgl. SK')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('tgl_akreditasi_awal')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('tgl_akreditasi_akhir')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->searchable(),
                SelectFilter::make('master_klasifikasi')
                    ->label('Klasifikasi')
                    ->searchable()
                    ->options(MasterKlasifikasiTravel::query()->pluck('nama', 'id'))
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['values'])) {
                            return $query;
                        }

                        return $query->whereHas('klasifikasis', function (Builder $subQuery) use ($data) {
                            $subQuery->whereIn('master_klasifikasi_travel_id', $data['values']);
                        });
                    }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(), // Otomatis jadi Soft Delete
                RestoreAction::make(), // Tombol untuk restore
                ForceDeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(), // Otomatis jadi Soft Delete
                    RestoreBulkAction::make(), // Tombol restore massal
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}
