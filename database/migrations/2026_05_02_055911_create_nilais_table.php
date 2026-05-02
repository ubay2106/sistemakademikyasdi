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
        Schema::create('nilais', function (Blueprint $table) {
    $table->id();
    $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
    $table->foreignId('pengajar_id')->constrained('pengajars')->cascadeOnDelete();
    $table->foreignId('semester_id')->constrained('semesters')->cascadeOnDelete();

    $table->decimal('nilai_tugas', 5, 2)->nullable();
    $table->decimal('nilai_uts', 5, 2)->nullable();
    $table->decimal('nilai_uas', 5, 2)->nullable();
    $table->decimal('nilai_akhir', 5, 2)->nullable();

    $table->text('catatan')->nullable();
    $table->timestamps();

    $table->unique(['siswa_id', 'pengajar_id', 'semester_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
