<?php

use App\Models\Travel;
use App\Models\UserData;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\travel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komentar_travel', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Travel::class);
            $table->foreignIdFor(UserData::class);
            $table->double('rating');
            $table->text('deskripsi');
            $table->enum('status', ['pending', 'diterima', 'ditolak']);
            $table->boolean('is_reported')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar_travel');
    }
};
