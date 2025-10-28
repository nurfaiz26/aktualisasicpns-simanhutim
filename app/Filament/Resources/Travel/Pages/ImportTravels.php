<?php

namespace App\Filament\Resources\TravelResource\Pages;

use App\Filament\Resources\Travel\TravelResource;
use App\Models\Travel; // <-- 1. Import model Anda
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

            $records = $csv->getRecords();

            foreach ($records as $index => $record) {
                // Sesuaikan nama kolom di CSV dengan kolom di database Anda
                // Travel::create([
                //     'nama_kolom_db_1' => $record['nama_kolom_csv_1'],
                //     'nama_kolom_db_2' => $record['nama_kolom_csv_2'],
                //     'harga'           => $record['price'], // Contoh
                //     // ... tambahkan semua kolom yang relevan
                // ]);
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
}
