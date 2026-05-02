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
        Schema::create('berita_tag', function (Blueprint $table) {
    $table->id();

    $table->foreignId('berita_id')
        ->constrained('beritas')
        ->cascadeOnDelete();

    $table->foreignId('berita_tag_id')
        ->constrained('berita_tags')
        ->cascadeOnDelete();

    $table->timestamps();

    $table->unique(['berita_id', 'berita_tag_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_tag');
    }
};
