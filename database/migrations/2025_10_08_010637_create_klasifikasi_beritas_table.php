<?php

use App\Models\Berita;
use App\Models\MasterKlasifikasiBerita;
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
        Schema::create('klasifikasi_beritas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Berita::class);
            $table->foreignIdFor(MasterKlasifikasiBerita::class);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_beritas');
    }
};
