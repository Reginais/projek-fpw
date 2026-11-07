<?php

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
        // Tugas Pertemuan 9 Soal No.3
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tugas Pertemuan 9 Soal No.3
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};