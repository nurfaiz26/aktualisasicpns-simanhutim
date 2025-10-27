<?php

use App\Models\Kota;
use App\Models\User;
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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kota::class);
            $table->foreignIdFor(User::class);
            $table->string('nama');
            $table->string('no_telepon');
            $table->string('no_ktp');
            $table->text('alamat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
