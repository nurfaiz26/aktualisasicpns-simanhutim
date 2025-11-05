<?php

namespace App\Filament\Resources\Travel\Tables;

use App\Models\GambarTravel;
use App\Models\KomentarGoogleTravel;
use App\Models\MasterKlasifikasiTravel;
use App\Models\Travel;
use Carbon\Carbon;
use Exception;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Throw_;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class TravelTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kota.nama')
                    ->numeric()
                    ->getStateUsing(fn($record) => $record->kota_id ?: '-')
                    ->sortable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->getStateUsing(fn($record) => $record->rating ?: '-')
                    ->sortable(),
                TextColumn::make('jumlah_pelanggaran')
                    ->numeric()
                    ->getStateUsing(fn($record) => $record->jumlah_pelanggaran ?: '-')
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
                TextColumn::make('gmap_place_id')
                    ->getStateUsing(fn($record) => $record->gmap_place_id ?: '-')
                    ->searchable(),
                TextColumn::make('gmap_url')
                    ->getStateUsing(fn($record) => $record->gmap_url ?: '-')
                    ->searchable(),
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
                Action::make('updateGmapData')
                    ->label('Update Gmap Data')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation() // optional
                    ->action(function ($record, $livewire) {
                        $googleApiKey = env('GOOGLE_API_KEY');
                        $apiUrl = "https://maps.googleapis.com/maps/api/place/details/json";

                        // dokumentasi api untuk mendapat data map
                        // $apiUrlFindMap = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json";
                        // $response = Http::get($apiUrlFindMap, [
                        //     'input' => 'nama+tempat+di+gmap',
                        //     'inputtype' => 'textquery',
                        //     'fields' => 'place_id',
                        //     'key' => $googleApiKey,
                        // ]);
                        
                        try {
                            //code...
                            # code...
                            // if (Carbon::parse($record->updated_at)->lessThan(Carbon::now()->subDays(7))) {
                            # code...
                            $placeId = $record->gmap_place_id;

                            $response = Http::get($apiUrl, [
                                'place_id' => $placeId,
                                'fields' => 'url,name,rating,reviews,photos,formatted_address,geometry',
                                'language' => 'id',
                                'reviews_sort' => 'newest',
                                'key' => $googleApiKey,
                            ]);

                            if ($response->successful()) {
                                $data = $response->json();

                                // 🧹 1. Remove existing DB entries
                                KomentarGoogleTravel::where('travel_id', $record->id)->delete();
                                foreach (GambarTravel::where('travel_id', $record->id)->get() as $gambarTravel) {
                                    # code...
                                    // 🧹 2. Remove only files, keep the folder
                                    Storage::disk('local')->delete($gambarTravel->url);

                                    $gambarTravel->delete();
                                }

                                // update data
                                if (isset($data['result'])) {
                                    $result = $data['result'];

                                    $record->update([
                                        'gmap_url' => isset($result['url']) ? $result['url'] : null
                                    ]);

                                    // ✅ Store comments (reviews)
                                    if (isset($result['reviews'])) {
                                        foreach ($result['reviews'] as $review) {
                                            KomentarGoogleTravel::updateOrCreate(
                                                [
                                                    'travel_id' => $record->id,
                                                    'author_name' => $review['author_name'] ?? 'Unknown',
                                                    'text' => $review['text'] ?? '',
                                                    'rating' => $review['rating'] ?? null,
                                                    'time' => isset($review['time'])
                                                        ? Carbon::createFromTimestamp($review['time'])
                                                        : now(),
                                                ],
                                            );
                                        }
                                    }

                                    /**
                                     * ✅ Save Photos (Download to storage/app/private)
                                     */
                                    if (!empty($result['photos'])) {
                                        foreach ($result['photos'] as $photo) {
                                            $photoReference = $photo['photo_reference'];
                                            $photoApiUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=800&photo_reference={$photoReference}&key={$googleApiKey}";

                                            // Fetch the photo content
                                            $photoResponse = Http::get($photoApiUrl);

                                            if ($photoResponse->successful()) {
                                                // Create a unique filename
                                                $fileName = Str::random(10) . $record->id . '.jpg';

                                                // Save the image in storage/app/private/google_photos/{travel_id}/
                                                Storage::disk('local')->put($fileName, $photoResponse->body());

                                                // Save DB record
                                                GambarTravel::updateOrCreate(
                                                    [
                                                        'travel_id' => $record->id,
                                                        // 'photo_reference' => $photoReference,
                                                        'url' => $fileName,
                                                    ],
                                                );
                                            }

                                            break; // 1 foto saja yang disimpan
                                        }
                                    }
                                }
                            }

                            Notification::make()
                                ->title('Data Google Map Berhasil Didapat!')
                                ->success()
                                ->send();

                            // ✅ Refresh current record (if needed)
                            $livewire->dispatch('$refresh');
                            // } else {
                            //     throw new Exception("Data Google Map Belum Waktunya Update!");
                            // }
                        } catch (\Exception $e) {
                            //throw $th;
                            Notification::make()
                                ->title('Data Google Map Gagal Didapat! Message:' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(), // Otomatis jadi Soft Delete
                    RestoreBulkAction::make(), // Tombol restore massal
                    ForceDeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Action::make('getGmapData')
                    ->label('Get Google Map Data')
                    ->color('primary')
                    ->requiresConfirmation() // optional
                    ->action(function ($livewire) {
                        $googleApiKey = env('GOOGLE_API_KEY');
                        $apiUrl = "https://maps.googleapis.com/maps/api/place/details/json";
                        // dokumentasi api untuk mendapat data map
                        // $apiUrlFindMap = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json";
                        // $response = Http::get($apiUrlFindMap, [
                        //             'input' => 'nama+tempat+di+gmap',
                        //             'inputtype' => 'textquery',
                        //             'fields' => 'place_id'
                        //             'key' => $googleApiKey,
                        //         ]);

                        try {
                            //code...
                            $travels = Travel::where('status', 'aktif')->where('gmap_place_id', '!=', null)->get();

                            foreach ($travels as $travel) {
                                # code...
                                if (Carbon::parse($travel->updated_at)->lessThan(Carbon::now()->subDays(7))) {
                                    # code...
                                    $placeId = $travel->gmap_place_id;

                                    $response = Http::get($apiUrl, [
                                        'place_id' => $placeId,
                                        'fields' => 'url,name,rating,reviews,photos,formatted_address,geometry',
                                        'language' => 'id',
                                        'reviews_sort' => 'newest',
                                        'key' => $googleApiKey,
                                    ]);

                                    if ($response->successful()) {
                                        $data = $response->json();

                                        // 🧹 1. Remove existing DB entries
                                        KomentarGoogleTravel::where('travel_id', $travel->id)->delete();
                                        foreach (GambarTravel::where('travel_id', $travel->id)->get() as $gambarTravel) {
                                            # code...
                                            // 🧹 2. Remove only files, keep the folder
                                            Storage::disk('local')->delete($gambarTravel->url);

                                            $gambarTravel->delete();
                                        }

                                        // update data
                                        if (isset($data['result'])) {
                                            $result = $data['result'];

                                            $travel->update([
                                                'gmap_url' => isset($result['url']) ? $result['url'] : null
                                            ]);

                                            // ✅ Store comments (reviews)
                                            if (isset($result['reviews'])) {
                                                foreach ($result['reviews'] as $review) {
                                                    KomentarGoogleTravel::updateOrCreate(
                                                        [
                                                            'travel_id' => $travel->id,
                                                            'author_name' => $review['author_name'] ?? 'Unknown',
                                                            'text' => $review['text'] ?? '',
                                                            'rating' => $review['rating'] ?? null,
                                                            'time' => isset($review['time'])
                                                                ? Carbon::createFromTimestamp($review['time'])
                                                                : now(),
                                                        ],
                                                    );
                                                }
                                            }

                                            /**
                                             * ✅ Save Photos (Download to storage/app/private)
                                             */
                                            if (!empty($result['photos'])) {
                                                foreach ($result['photos'] as $photo) {
                                                    $photoReference = $photo['photo_reference'];
                                                    $photoApiUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=800&photo_reference={$photoReference}&key={$googleApiKey}";

                                                    // Fetch the photo content
                                                    $photoResponse = Http::get($photoApiUrl);

                                                    if ($photoResponse->successful()) {
                                                        // Create a unique filename
                                                        $fileName = Str::random(10) . $travel->id . '.jpg';

                                                        // Save the image in storage/app/private/google_photos/{travel_id}/
                                                        Storage::disk('local')->put($fileName, $photoResponse->body());

                                                        // Save DB record
                                                        GambarTravel::updateOrCreate(
                                                            [
                                                                'travel_id' => $travel->id,
                                                                // 'photo_reference' => $photoReference,
                                                                'url' => $fileName,
                                                            ],
                                                        );
                                                    }

                                                    break; // 1 foto saja yang disimpan
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            Notification::make()
                                ->title('Data Google Map Berhasil Didapat!')
                                ->success()
                                ->send();

                            // ✅ Refresh current record (if needed)
                            $livewire->dispatch('$refresh');
                        } catch (\Exception $e) {
                            //throw $th;
                            Notification::make()
                                ->title('Data Google Map Gagal Didapat! Message:' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
            ]);
    }
}
