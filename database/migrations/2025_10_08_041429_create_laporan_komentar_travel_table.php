<?php

use App\Models\KomentarTravel;
use App\Models\UserData;
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
        Schema::create('laporan_komentar_travel', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KomentarTravel::class);
            $table->foreignIdFor(UserData::class);
            $table->text('deskripsi');
            $table->enum('status', ['pending', 'diterima', 'ditolak']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_komentar_travel');
    }
};
