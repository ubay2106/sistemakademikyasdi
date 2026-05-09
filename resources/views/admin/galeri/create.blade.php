@extends('layout.app')

@section('title', 'Tambah Foto Galeri')

@section('content')
    <div class="max-w-xl space-y-6">

        {{-- Page Header --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.galeri.index') }}"
                class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 bg-white hover:bg-gray-50 transition-colors text-gray-500">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Tambah Foto</h1>
                <p class="text-sm text-gray-500 mt-0.5">Upload foto baru ke galeri sekolah.</p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            {{-- Card header --}}
            <div class="px-6 py-4 border-b border-gray-50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
                <h2 class="text-sm font-semibold text-gray-700">Data Foto</h2>
            </div>

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-5">
                @csrf

                {{-- Judul --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Judul Foto <span class="text-red-500">*</span>
                    </label>
                    @php
                        $judulClass = $errors->has('judul') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white';
                    @endphp
                    <input type="text" name="judul" value="{{ old('judul') }}"
                        class="w-full border rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors {{ $judulClass }}"
                        placeholder="Contoh: Upacara Bendera 17 Agustus" placeholder="Contoh: Upacara Bendera 17 Agustus">
                    @error('judul')
                        <p class="text-xs text-red-500 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Uploada Foto --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Upload Foto <span class="text-red-500">*</span>
                    </label>

                    @php
                        $fotoClass = $errors->has('foto')
                            ? 'border-red-400 bg-red-50'
                            : 'border-gray-200 bg-gray-50 hover:border-primary/50 hover:bg-primary/5';
                    @endphp
                    <label for="foto-input"
                        class="group relative flex flex-col items-center justify-center w-full h-52 border-2 border-dashed rounded-2xl cursor-pointer transition-colors {{ $fotoClass }}"
                        id="drop-zone" id="drop-zone">

                        {{-- Preview (hidden until selected) --}}
                        <img id="foto-preview" src="" alt="Preview"
                            class="hidden absolute inset-0 w-full h-full object-cover rounded-2xl">

                        {{-- Overlay on preview --}}
                        <div id="drop-overlay" class="absolute inset-0 rounded-2xl hidden items-center justify-center"
                            style="background: rgba(0,0,0,0.45);">
                            <span class="text-white text-xs font-semibold">Klik untuk ganti foto</span>
                        </div>

                        <div id="drop-placeholder" class="flex flex-col items-center gap-2 pointer-events-none">
                            <div
                                class="w-12 h-12 rounded-xl bg-white border border-gray-200 flex items-center justify-center group-hover:border-primary/30 transition-colors">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-primary transition-colors" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-600 group-hover:text-primary transition-colors">Klik
                                    untuk upload foto</p>
                                <p class="text-xs text-gray-400 mt-0.5">JPG, JPEG, PNG, WEBP — Maks. 2MB</p>
                            </div>
                        </div>
                    </label>

                    <input type="file" id="foto-input" name="foto" accept="image/jpg,image/jpeg,image/png,image/webp"
                        class="hidden">

                    @error('foto')
                        <p class="text-xs text-red-500 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('admin.galeri.index') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-colors shadow-sm shadow-primary/20">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('foto-input');
            const preview = document.getElementById('foto-preview');
            const placeholder = document.getElementById('drop-placeholder');
            const overlay = document.getElementById('drop-overlay');

            input.addEventListener('change', function() {
                const file = this.files[0];

                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');

                    placeholder.classList.add('hidden');

                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
