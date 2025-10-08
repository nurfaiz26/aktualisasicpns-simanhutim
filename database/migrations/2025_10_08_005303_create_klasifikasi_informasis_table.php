<?php

use App\Models\Informasi;
use App\Models\MasterKlasifikasiInformasi;
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
        Schema::create('klasifikasi_informasis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Informasi::class);
            $table->foreignIdFor(MasterKlasifikasiInformasi::class);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_informasis');
    }
};
