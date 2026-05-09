@extends('layout.app')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- Back --}}
    <div class="mb-6">
        <a href="{{ route('admin.prestasi.index') }}"
            class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-gray-700 transition">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Data Prestasi
        </a>
    </div>

    <form method="POST" action="{{ route('admin.prestasi.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 space-y-6">

                {{-- Informasi Utama --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-sm font-bold text-gray-700 mb-5 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-md bg-primary/10 flex items-center justify-center">
                            <svg class="w-3 h-3 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5Z"/>
                            </svg>
                        </span>
                        Informasi Prestasi
                    </h2>

                    <div class="space-y-4">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Judul Prestasi <span class="text-red-400">*</span></label>
                            <input type="text" name="judul" value="{{ old('judul') }}"
                                placeholder="Contoh: Juara 1 Olimpiade Matematika Nasional"
                                class="w-full border {{ $errors->has('judul') ? 'border-red-300' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                            @error('judul')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Nama Lomba --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Lomba / Kompetisi <span class="text-red-400">*</span></label>
                            <input type="text" name="nama_lomba" value="{{ old('nama_lomba') }}"
                                placeholder="Contoh: Olimpiade Sains Nasional (OSN)"
                                class="w-full border {{ $errors->has('nama_lomba') ? 'border-red-300' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                            @error('nama_lomba')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        </div>

                        {{-- Penyelenggara & Tanggal --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Penyelenggara</label>
                                <input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}"
                                    placeholder="Contoh: Kemendikbud"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Tanggal <span class="text-red-400">*</span></label>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                                    class="w-full border {{ $errors->has('tanggal') ? 'border-red-300' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                                @error('tanggal')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Tingkat <span class="text-red-400">*</span></label>
                                <select name="tingkat"
                                    class="w-full border {{ $errors->has('tingkat') ? 'border-red-300' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition bg-white">
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="kecamatan"  {{ old('tingkat') == 'kecamatan'     ? 'selected' : '' }}>Kecamatan</option>
                                    <option value="kabupaten"  {{ old('tingkat') == 'kabupaten'     ? 'selected' : '' }}>Kabupaten / Kota</option>
                                    <option value="provinsi"   {{ old('tingkat') == 'provinsi'      ? 'selected' : '' }}>Provinsi</option>
                                    <option value="nasional"   {{ old('tingkat') == 'nasional'      ? 'selected' : '' }}>Nasional</option>
                                    <option value="internasional" {{ old('tingkat') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                                </select>
                                @error('tingkat')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Juara / Penghargaan <span class="text-red-400">*</span></label>
                                <select name="juara"
                                    class="w-full border {{ $errors->has('juara') ? 'border-red-300' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition bg-white">
                                    <option value="">-- Pilih Juara --</option>
                                    <option value="Juara 1"         {{ old('juara') == '1'         ? 'selected' : '' }}>Juara 1</option>
                                    <option value="Juara 2"         {{ old('juara') == '2'         ? 'selected' : '' }}>Juara 2</option>
                                    <option value="Juara 3"         {{ old('juara') == '3'         ? 'selected' : '' }}>Juara 3</option>
                                    <option value="Harapan 1" {{ old('juara') == 'harapan_1' ? 'selected' : '' }}>Juara Harapan 1</option>
                                    <option value="Harapan 2" {{ old('juara') == 'harapan_2' ? 'selected' : '' }}>Juara Harapan 2</option>
                                    <option value="Harapan 3" {{ old('juara') == 'harapan_3' ? 'selected' : '' }}>Juara Harapan 3</option>
                                    <option value="Finalis"   {{ old('juara') == 'finalis'   ? 'selected' : '' }}>Finalis</option>
                                    <option value="Peserta Terbaik"   {{ old('juara') == 'peserta'   ? 'selected' : '' }}>Peserta Terbaik</option>
                                </select>
                                @error('juara')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                placeholder="Ceritakan lebih lanjut tentang prestasi ini..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300 resize-none">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Informasi Peserta --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-sm font-bold text-gray-700 mb-5 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-md bg-blue-50 flex items-center justify-center">
                            <svg class="w-3 h-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                        </span>
                        Informasi Peserta
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Peserta <span class="text-red-400">*</span></label>
                            <input type="text" name="nama_peserta" value="{{ old('nama_peserta') }}"
                                placeholder="Nama lengkap peserta"
                                class="w-full border {{ $errors->has('nama_peserta') ? 'border-red-300' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                            @error('nama_peserta')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">NIS / NIP</label>
                                <input type="text" name="nis_nip" value="{{ old('nis_nip') }}"
                                    placeholder="Nomor induk"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Kelas</label>
                                <input type="text" name="kelas" value="{{ old('kelas') }}"
                                    placeholder="Contoh: XII IPA 1"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-sm font-bold text-gray-700 mb-1 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-md bg-purple-50 flex items-center justify-center">
                            <svg class="w-3 h-3 text-purple-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 15.803 7.5 7.5 0 0016.803 15.803z"/>
                            </svg>
                        </span>
                        SEO
                    </h2>
                    <p class="text-xs text-gray-400 mb-5">Opsional — biarkan kosong untuk menggunakan judul & deskripsi utama.</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                placeholder="Judul untuk mesin pencari"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Meta Description</label>
                            <textarea name="meta_description" rows="2"
                                placeholder="Deskripsi singkat untuk mesin pencari..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition placeholder:text-gray-300 resize-none">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

            <div class="space-y-6">

                {{-- Publish --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-sm font-bold text-gray-700 mb-5">Publikasi</h2>

                    <div class="space-y-3 mb-6">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <div class="relative">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-10 h-6 rounded-full bg-gray-200 peer-checked:bg-primary transition-colors"></div>
                                <div class="absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white shadow transition-transform peer-checked:translate-x-4"></div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700">Unggulan</p>
                                <p class="text-xs text-gray-400">Tampilkan di halaman utama</p>
                            </div>
                        </label>
                    </div>

                    <div class="flex flex-col gap-2">
                        <button type="submit"
                            class="w-full bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200">
                            Simpan Prestasi
                        </button>
                        <a href="{{ route('admin.prestasi.index') }}"
                            class="w-full text-center text-sm text-gray-400 hover:text-gray-600 py-2.5 px-5 rounded-xl border border-gray-200 hover:border-gray-300 transition duration-200">
                            Batal
                        </a>
                    </div>
                </div>

                {{-- Foto --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-sm font-bold text-gray-700 mb-1">Foto Prestasi</h2>
                    <p class="text-xs text-gray-400 mb-4">JPG, PNG, atau WebP. Maks 2 MB.</p>

                    <div id="drop-zone"
                        class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center cursor-pointer hover:border-primary/40 hover:bg-green-50/30 transition group"
                        onclick="document.getElementById('foto-input').click()">
                        <div id="drop-preview" class="hidden">
                            <img id="preview-img" src="" alt="Preview" class="w-full h-40 object-cover rounded-lg mb-3">
                            <p id="preview-name" class="text-xs text-gray-500 truncate"></p>
                        </div>
                        <div id="drop-placeholder">
                            <div class="w-12 h-12 rounded-xl bg-gray-100 group-hover:bg-green-100 flex items-center justify-center mx-auto mb-3 transition">
                                <svg class="w-6 h-6 text-gray-300 group-hover:text-primary transition" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-400 group-hover:text-gray-600 transition">Klik untuk pilih foto</p>
                            <p class="text-xs text-gray-300 mt-0.5">atau seret & lepas di sini</p>
                        </div>
                        <input id="foto-input" type="file" name="foto" accept="image/*" class="hidden">
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    const input = document.getElementById('foto-input');
    const dropZone = document.getElementById('drop-zone');
    const preview = document.getElementById('drop-preview');
    const placeholder = document.getElementById('drop-placeholder');
    const previewImg = document.getElementById('preview-img');
    const previewName = document.getElementById('preview-name');

    function showPreview(file) {
        if (!file || !file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = e => {
            previewImg.src = e.target.result;
            previewName.textContent = file.name;
            placeholder.classList.add('hidden');
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    input.addEventListener('change', () => showPreview(input.files[0]));

    dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('border-primary'); });
    dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-primary'));
    dropZone.addEventListener('drop', e => {
        e.preventDefault();
        dropZone.classList.remove('border-primary');
        const file = e.dataTransfer.files[0];
        if (file) {
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            showPreview(file);
        }
    });
</script>
@endpush