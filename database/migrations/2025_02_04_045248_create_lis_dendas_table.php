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
        Schema::create('lis_dendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('peminjamanbook_id')->constrained('peminjamanbooks')->onDelete('cascade');
            $table->decimal('nominal', 10, 2);
            $table->boolean('dibayar')->default(false);
            $table->enum('status', ['belum_dibayar', 'sudah_dibayar'])->default('belum_dibayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('lis_dendas');
    }
};
