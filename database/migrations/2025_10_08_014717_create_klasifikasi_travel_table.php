<?php

use App\Models\MasterKlasifikasiTravel;
use App\Models\Travel;
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
        Schema::create('klasifikasi_travel', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Travel::class);
            $table->foreignIdFor(MasterKlasifikasiTravel::class);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_travel');
    }
};
