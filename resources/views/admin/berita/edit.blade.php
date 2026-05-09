@extends('layout.app')

@section('content')

{{-- Header --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.berita.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Edit Berita</h1>
        <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $berita->judul }}</p>
    </div>
</div>

@if($errors->any())
<div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
    </svg>
    <div>
        <p class="text-sm font-semibold mb-1">Terdapat kesalahan:</p>
        <ul class="text-sm list-disc list-inside space-y-0.5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition flex-shrink-0">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

<form method="POST" action="{{ route('admin.berita.update', $berita) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri: Konten Utama --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Judul --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Berita <span class="text-red-400">*</span>
                </label>
                <input type="text" id="judul" name="judul"
                    value="{{ old('judul', $berita->judul) }}"
                    placeholder="Masukkan judul berita yang menarik..."
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                @error('judul')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ringkasan --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label for="ringkasan" class="block text-sm font-semibold text-gray-700 mb-2">
                    Ringkasan
                    <span class="text-gray-400 font-normal text-xs ml-1">(opsional, tampil di daftar berita)</span>
                </label>
                <textarea id="ringkasan" name="ringkasan" rows="3"
                    placeholder="Tulis ringkasan singkat berita ini..."
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('ringkasan', $berita->ringkasan) }}</textarea>
                @error('ringkasan')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi Berita --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label for="isi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Isi Berita <span class="text-red-400">*</span>
                </label>
                <textarea id="isi" name="isi" rows="14"
                    placeholder="Tulis isi berita di sini..."
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-y">{{ old('isi', $berita->isi) }}</textarea>
                @error('isi')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- SEO --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">SEO <span class="text-gray-400 font-normal text-xs">(opsional)</span></h3>
                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block text-xs font-medium text-gray-500 mb-1.5">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title"
                            value="{{ old('meta_title', $berita->meta_title) }}"
                            placeholder="Judul untuk mesin pencari..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('meta_title')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="meta_description" class="block text-xs font-medium text-gray-500 mb-1.5">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="2"
                            placeholder="Deskripsi singkat untuk mesin pencari..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('meta_description', $berita->meta_description) }}</textarea>
                        @error('meta_description')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="meta_keywords" class="block text-xs font-medium text-gray-500 mb-1.5">Meta Keywords</label>
                        <input type="text" id="meta_keywords" name="meta_keywords"
                            value="{{ old('meta_keywords', $berita->meta_keywords) }}"
                            placeholder="kata kunci, dipisah koma..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('meta_keywords')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan: Pengaturan --}}
        <div class="space-y-5">

            {{-- Publikasi --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Publikasi</h3>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">Status</label>
                    <div class="flex gap-2">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="status" value="published" class="peer hidden"
                                {{ old('status', $berita->status) === 'published' ? 'checked' : '' }}>
                            <div class="peer-checked:bg-primary/10 peer-checked:border-primary peer-checked:text-primary flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                Publik
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="status" value="draft" class="peer hidden"
                                {{ old('status', $berita->status) === 'draft' ? 'checked' : '' }}>
                            <div class="peer-checked:bg-gray-100 peer-checked:border-gray-400 peer-checked:text-gray-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                Draft
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="status" value="archived" class="peer hidden"
                                {{ old('status', $berita->status) === 'archived' ? 'checked' : '' }}>
                            <div class="peer-checked:bg-amber-50 peer-checked:border-amber-400 peer-checked:text-amber-600 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                Arsip
                            </div>
                        </label>
                    </div>
                    @error('status')
                        <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Is Featured --}}
                <div>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                class="peer sr-only"
                                {{ old('is_featured', $berita->is_featured) ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 peer-checked:bg-primary rounded-full transition"></div>
                            <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-4 shadow-sm"></div>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-600">Berita Unggulan</p>
                            <p class="text-xs text-gray-400">Tampilkan di bagian featured</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Kategori --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Kategori</h3>
                <select name="berita_kategori_id"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition appearance-none cursor-pointer">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ old('berita_kategori_id', $berita->berita_kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('berita_kategori_id')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tags --}}
            @if($tags->count())
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @php $selectedTags = old('tags', $berita->tags->pluck('id')->toArray()); @endphp
                    @foreach($tags as $tag)
                        <label class="cursor-pointer">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="peer sr-only"
                                {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                            <span class="inline-block text-xs font-medium border border-gray-200 peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary text-gray-500 px-3 py-1.5 rounded-full transition">
                                {{ $tag->nama }}
                            </span>
                        </label>
                    @endforeach
                </div>
                @error('tags')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>
            @endif

            {{-- Thumbnail / Gambar Utama --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Thumbnail / Foto Utama</h3>

                {{-- Gambar Lama (jika ada) --}}
                @if($berita->gambar_utama)
                <div class="mb-3">
                    <p class="text-xs text-gray-400 mb-1.5">Gambar saat ini:</p>
                    <div class="relative">
                        <img src="{{ asset('storage/' . $berita->gambar_utama) }}" alt="{{ $berita->judul }}"
                            class="w-full h-36 object-cover rounded-xl border border-gray-200">
                        <span class="absolute top-2 left-2 bg-black/50 text-white text-xs font-medium px-2 py-0.5 rounded-lg">
                            Saat ini
                        </span>
                    </div>
                    @if($berita->caption_gambar)
                        <p class="text-xs text-gray-400 mt-1.5 italic">{{ $berita->caption_gambar }}</p>
                    @endif
                    <p class="text-xs text-gray-400 mt-1.5">Unggah gambar baru untuk mengganti.</p>
                </div>
                @endif

                {{-- Preview Gambar Baru --}}
                <div id="preview-container" class="hidden mb-3 relative">
                    <img id="preview-img" src="#" alt="Preview"
                        class="w-full h-40 object-cover rounded-xl border border-primary/30">
                    <span class="absolute top-2 left-2 bg-primary text-white text-xs font-medium px-2 py-0.5 rounded-lg">
                        Gambar baru
                    </span>
                    <button type="button" onclick="clearImage()"
                        class="absolute top-2 right-2 w-7 h-7 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-200 transition shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Upload Area --}}
                <label id="upload-label" for="gambar_utama"
                    class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-200 rounded-xl py-7 px-4 cursor-pointer hover:border-primary/50 hover:bg-primary/5 transition group">
                    <div class="w-10 h-10 rounded-xl bg-gray-100 group-hover:bg-primary/10 flex items-center justify-center transition">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-primary transition" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-600 group-hover:text-primary transition">
                            {{ $berita->gambar_utama ? 'Ganti gambar' : 'Klik untuk unggah' }}
                        </p>
                        <p class="text-xs text-gray-400 mt-0.5">PNG, JPG, WEBP maks. 2MB</p>
                    </div>
                    <input type="file" id="gambar_utama" name="gambar_utama" accept="image/jpg,image/jpeg,image/png,image/webp" class="hidden" onchange="previewImage(this)">
                </label>

                {{-- Caption --}}
                <div class="mt-3">
                    <input type="text" name="caption_gambar"
                        value="{{ old('caption_gambar', $berita->caption_gambar) }}"
                        placeholder="Caption gambar (opsional)..."
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                    @error('caption_gambar')
                        <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                @error('gambar_utama')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Info Berita --}}
            <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Info</h3>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Dibuat</span>
                        <span class="text-xs font-medium text-gray-600">{{ $berita->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Diperbarui</span>
                        <span class="text-xs font-medium text-gray-600">{{ $berita->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                    @if($berita->published_at)
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Dipublikasi</span>
                        <span class="text-xs font-medium text-gray-600">{{ $berita->published_at->format('d M Y, H:i') }}</span>
                    </div>
                    @endif
                    @if($berita->user)
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Penulis</span>
                        <span class="text-xs font-medium text-gray-600">{{ $berita->user->name }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Slug</span>
                        <span class="text-xs font-medium text-gray-600 truncate max-w-[150px]" title="{{ $berita->slug }}">{{ $berita->slug }}</span>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col gap-2">
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-primary text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-green-700 transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.berita.index') }}"
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
            </div>

        </div>
    </div>
</form>

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-container').classList.remove('hidden');
                document.getElementById('upload-label').classList.add('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function clearImage() {
        document.getElementById('gambar_utama').value = '';
        document.getElementById('preview-img').src = '#';
        document.getElementById('preview-container').classList.add('hidden');
        document.getElementById('upload-label').classList.remove('hidden');
    }
</script>
@endpush

@endsection