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
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->integer('kategoribook_id')->constrained('kategoribooks')->onDelete('cascade');
        $table->softDeletes();
        $table->string('judul');
        $table->string('penulis');
        $table->string('penerbit');
        $table->text('description')->nullable();
        $table->string('code')->unique();
        $table->integer('tahun_terbit');
        $table->integer('jumlah');
        $table->string('gambar')->nullable(); // Tambahkan kolom gambar
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
