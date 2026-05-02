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
       Schema::create('prestasis', function (Blueprint $table) {
    $table->id();

    $table->string('judul'); // Judul prestasi
    $table->string('slug')->unique();

    $table->string('nama_peserta'); // Nama siswa/guru
    $table->string('nis_nip')->nullable(); // opsional

    $table->string('kelas')->nullable(); // contoh: XII RPL
    $table->string('tingkat'); 
    $table->string('juara'); // Juara 1, 2, 3, harapan, dll
    $table->string('nama_lomba'); // nama kegiatan/lomba

    $table->string('penyelenggara')->nullable();
    $table->date('tanggal');

    $table->text('deskripsi')->nullable();

    $table->string('foto')->nullable(); 

    $table->boolean('is_featured')->default(false);

    $table->unsignedInteger('jumlah_dilihat')->default(0);

    $table->string('meta_title')->nullable();
    $table->string('meta_description')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
