<?php

use App\Models\Travel;
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
        Schema::create('laporan_travel', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Travel::class);
            $table->foreignIdFor(UserData::class);
            $table->text('deskripsi');
            $table->text('link_bukti');
            $table->enum('status', ['pending, diterima', 'ditolak']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_travel');
    }
};
