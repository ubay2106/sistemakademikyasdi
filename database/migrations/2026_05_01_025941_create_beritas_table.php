<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->foreignId('berita_kategori_id')->nullable()->constrained('berita_kategoris')->nullOnDelete();

            $table->string('judul');
            $table->string('slug')->unique();

            $table->string('ringkasan', 300)->nullable();
            $table->longText('isi');

            $table->string('gambar_utama')->nullable();
            $table->string('caption_gambar')->nullable();

            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('jumlah_dilihat')->default(0);

            $table->timestamp('published_at')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
