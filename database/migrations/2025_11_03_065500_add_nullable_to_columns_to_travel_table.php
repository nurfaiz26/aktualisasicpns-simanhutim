<?php

use App\Models\Kota;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('travel', function (Blueprint $table) {
            $table->foreignIdFor(Kota::class)->nullable()->change();
            $table->double('rating')->nullable()->change();
            $table->integer('jumlah_pelanggaran')->nullable()->change();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->change();
            $table->dateTime('tgl_akreditasi_awal')->nullable()->change();
            $table->dateTime('tgl_akreditasi_akhir')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel', function (Blueprint $table) {
            //
        });
    }
};
