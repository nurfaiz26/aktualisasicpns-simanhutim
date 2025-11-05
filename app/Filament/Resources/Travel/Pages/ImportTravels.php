<?php

namespace App\Filament\Resources\TravelResource\Pages;

use App\Filament\Resources\Travel\TravelResource;
use App\Models\KlasifikasiTravel;
use App\Models\MasterKlasifikasiTravel;
use App\Models\Travel; // <-- 1. Import model Anda
use Carbon\Carbon;
use Exception;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader; // <-- 2. Import library CSV

class ImportTravels extends Page implements HasForms
{
    use InteractsWithForms;

    // Properti untuk menampung file yang di-upload
    public ?array $file = [];

    protected static string $resource = TravelResource::class;
    protected string $view = 'filament.resources.travel.pages.import-travels';
    protected static ?string $title = 'Import Travels'; // Judul halaman

    // Method untuk mendefinisikan skema form
    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('file')
                ->label('File CSV')
                ->required()
                ->acceptedFileTypes(['text/csv']) // <-- 3. Validasi hanya CSV
                ->maxSize(10240) // Contoh: maks 10MB
                ->storeFiles(false), // Kita tidak simpan file, hanya proses
        ];
    }

    // Method untuk logika import
    public function import(): void
    {
        $this->validate();

        // $filePath = $this->file[0]->getRealPath();

        // 1. Ambil semua data yang tervalidasi dari form
        $formData = $this->form->getState();

        // 2. Ambil array file dari data form
        $fileUploads = $formData['file'];

        // 3. Ambil file pertama dari array tersebut
        $filePath = $fileUploads->getRealPath();

        try {
            // Memulai transaksi database
            DB::beginTransaction();

            // Membaca file CSV
            $csv = Reader::createFromPath($filePath, 'r');
            $csv->setHeaderOffset(0); // Anggap baris pertama adalah header
            // --- TAMBAHKAN BARIS INI ---
            $csv->setDelimiter(';');

            $records = $csv->getRecords();

            foreach ($records as $record) {
                // Sesuaikan nama kolom di CSV dengan kolom di database Anda
                $existingTravel = Travel::where('nama', 'LIKE', '%' . strtoupper($record['travel']) . '%')->first();

                if ($existingTravel) {
                    if ($record['klasifikasi'] == 'PPIU') {
                        # code...
                        KlasifikasiTravel::create([
                            'travel_id' => $existingTravel->id,
                            'master_klasifikasi_travel_id' => MasterKlasifikasiTravel::where('nama', 'PPIU')->first()->id,
                        ]);
                    } else if ($record['klasifikasi'] == 'PIHK') {
                        KlasifikasiTravel::create([
                            'travel_id' => $existingTravel->id,
                            'master_klasifikasi_travel_id' => MasterKlasifikasiTravel::where('nama', 'PIHK')->first()->id,
                        ]);
                    }

                    continue;
                }

                // dd($this->parseTanggal($record['tgl_sk']) ? $this->parseTanggal($record['tgl_sk']) . ' 00:00:00' : null);
                // dd($record['akreditasi']);

                $createTravel = Travel::create([
                    'alamat' => $record['alamat'],
                    'nama' => strtoupper($record['travel']),
                    'no_telepon' => $record['no_telepon'],
                    'email' => $record['email'],
                    'direktur' => $record['direktur'],
                    'no_sk' => $record['no_sk'],
                    'akreditasi' => $record['akreditasi'] == "" || $record['akreditasi'] == null ? '-' : $record['akreditasi'],
                    'tgl_sk' => $this->parseTanggal($record['tgl_sk']) ? $this->parseTanggal($record['tgl_sk']) . ' 00:00:00' : Carbon::create('1900'),
                ]);

                if ($record['klasifikasi'] == 'PPIU') {
                    # code...
                    KlasifikasiTravel::create([
                        'travel_id' => $createTravel->id,
                        'master_klasifikasi_travel_id' => MasterKlasifikasiTravel::where('nama', 'PPIU')->first()->id,
                    ]);
                } else if ($record['klasifikasi'] == 'PIHK') {
                    KlasifikasiTravel::create([
                        'travel_id' => $createTravel->id,
                        'master_klasifikasi_travel_id' => MasterKlasifikasiTravel::where('nama', 'PIHK')->first()->id,
                    ]);
                }
            }

            // Jika semua berhasil, commit transaksi
            DB::commit();

            Notification::make()
                ->title('Impor Berhasil')
                ->body('Data travel dari file CSV berhasil diimpor.')
                ->success()
                ->send();

            // Kosongkan form setelah berhasil
            $this->form->fill();
        } catch (\Exception $e) {
            // Jika ada error, rollback transaksi
            DB::rollBack();

            Notification::make()
                ->title('Impor Gagal')
                ->body('Terjadi kesalahan: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    function parseTanggal($tanggal)
    {
        if (empty($tanggal)) {
            return null;
        }

        $formats = ['d/m/Y', 'Y-m-d', 'd-m-Y', 'm/d/Y'];

        foreach ($formats as $format) {
            try {
                return Carbon::createFromFormat($format, trim($tanggal))->format('Y-m-d');
            } catch (Exception $e) {
                continue;
            }
        }

        return Carbon::create('1900'); // kalau semua gagal
    }
}
