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
        Schema::create('travel', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kota::class);
            $table->double('rating');
            $table->integer('jumlah_pelanggaran');
            $table->text('alamat');
            $table->string('nama');
            $table->string('no_telepon');
            $table->string('email');
            $table->string('direktur');
            $table->string('no_sk');
            $table->string('akreditasi');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->dateTime('tgl_sk');
            $table->dateTime('tgl_akreditasi_awal');
            $table->dateTime('tgl_akreditasi_akhir');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
