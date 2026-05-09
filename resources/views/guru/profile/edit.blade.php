@extends('layout.app')

@section('page-title', 'Profil Saya')
@section('page-subtitle', 'Kelola identitas dan password akun Anda')

@section('content')

@if(session('success'))
<div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <p class="text-sm font-medium">{{ session('success') }}</p>
    <button onclick="this.parentElement.remove()" class="ml-auto text-green-400 hover:text-green-600 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

@if(session('error'))
<div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
    </svg>
    <p class="text-sm font-medium">{{ session('error') }}</p>
    <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- ── Kolom Kiri: Kartu Profil ── --}}
    <div class="space-y-5">

        {{-- Card Foto & Identitas --}}
        <div class="bg-white rounded-2xl border border-gray-100">
            {{-- Cover --}}
            <div class="h-24 bg-gradient-to-r from-primary to-green-700 rounded-t-2xl relative">
                <div class="absolute inset-0 rounded-t-2xl opacity-10"
                    style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,.15) 10px, rgba(255,255,255,.15) 20px);">
                </div>
            </div>

            <div class="px-6 pb-6">
                {{-- Foto — dikeluarkan dari overflow, pakai margin negatif yang lebih besar --}}
                <div class="relative -mt-10 mb-4 w-fit">
                    @if($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                            class="w-20 h-20 rounded-2xl object-cover shadow-lg border-4 border-white">
                    @else
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-primary to-green-700 flex items-center justify-center shadow-lg border-4 border-white">
                            <span class="text-white font-bold text-3xl">
                                {{ strtoupper(substr($guru->nama ?? 'G', 0, 1)) }}
                            </span>
                        </div>
                    @endif
                </div>

                <h2 class="text-base font-bold text-gray-800 leading-tight">{{ $guru->nama }}</h2>

                @if($guru->nip)
                <p class="text-xs font-mono text-gray-400 mt-0.5">NIP: {{ $guru->nip }}</p>
                @endif

                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="inline-flex items-center gap-1 text-xs font-medium bg-green-50 text-green-700 px-2.5 py-1 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        Aktif
                    </span>
                    @if($guru->jenis_kelamin)
                    <span class="text-xs font-medium px-2.5 py-1 rounded-full
                        {{ $guru->jenis_kelamin === 'P' ? 'bg-pink-50 text-pink-600' : 'bg-blue-50 text-blue-600' }}">
                        {{ $guru->jenis_kelamin === 'L' ? '♂ Laki-laki' : '♀ Perempuan' }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Info Akun --}}
        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5">
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Info Akun</h3>
            <div class="space-y-2.5">
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Username</span>
                    <span class="text-xs font-mono font-semibold text-gray-700">{{ $user->username }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Role</span>
                    <span class="text-xs font-semibold text-gray-700 capitalize">{{ $user->role }}</span>
                </div>
                @if($guru->no_hp)
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">No. HP</span>
                    <span class="text-xs font-semibold text-gray-700">{{ $guru->no_hp }}</span>
                </div>
                @endif
                @if($guru->tanggal_lahir)
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Usia</span>
                    <span class="text-xs font-semibold text-gray-700">{{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun</span>
                </div>
                @endif
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Bergabung</span>
                    <span class="text-xs font-semibold text-gray-700">{{ $user->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Kolom Kanan: Form ── --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- Form Edit Identitas --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                <span class="w-1 h-4 bg-primary rounded-full"></span>
                Edit Identitas
            </h3>

            <form method="POST" action="{{ route('guru.profile.updateIdentitas') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    {{-- Nama --}}
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">
                            Nama Lengkap <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}"
                            placeholder="Nama lengkap..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">NIP</label>
                        <input type="text" name="nip" value="{{ old('nip', $guru->nip) }}"
                            placeholder="Nomor Induk Pegawai..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition font-mono">
                        @error('nip') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Jenis Kelamin</label>
                        <div class="flex gap-2">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="jenis_kelamin" value="L" class="peer hidden"
                                    {{ old('jenis_kelamin', $guru->jenis_kelamin) === 'L' ? 'checked' : '' }}>
                                <div class="peer-checked:bg-blue-50 peer-checked:border-blue-400 peer-checked:text-blue-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                    ♂ Laki-laki
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="jenis_kelamin" value="P" class="peer hidden"
                                    {{ old('jenis_kelamin', $guru->jenis_kelamin) === 'P' ? 'checked' : '' }}>
                                <div class="peer-checked:bg-pink-50 peer-checked:border-pink-400 peer-checked:text-pink-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                    ♀ Perempuan
                                </div>
                            </label>
                        </div>
                        @error('jenis_kelamin') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}"
                            placeholder="Kota tempat lahir..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('tempat_lahir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $guru->tanggal_lahir ? \Carbon\Carbon::parse($guru->tanggal_lahir)->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('tanggal_lahir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">No. HP / WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $guru->no_hp) }}"
                            placeholder="08xx-xxxx-xxxx"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('no_hp') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Alamat</label>
                        <textarea name="alamat" rows="3"
                            placeholder="Alamat lengkap..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('alamat', $guru->alamat) }}</textarea>
                        @error('alamat') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Foto Profil</label>

                        {{-- Foto saat ini + Preview baru berdampingan --}}
                        <div class="flex items-end gap-4 mb-3">
                            @if($guru->foto)
                            <div class="flex flex-col items-center gap-1">
                                <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                    class="w-16 h-16 rounded-2xl object-cover border-2 border-gray-200 flex-shrink-0">
                                <p class="text-xs text-gray-400">Saat ini</p>
                            </div>
                            <div id="panah-ganti" class="hidden flex-shrink-0 text-gray-300 pb-5">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                            @endif
                            <div id="preview-container" class="hidden flex-col items-center gap-1">
                                <div class="relative">
                                    <img id="preview-img" src="#" alt="Preview"
                                        class="w-16 h-16 rounded-2xl object-cover border-2 border-primary/40">
                                    <button type="button" onclick="clearFoto()"
                                        class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-white border border-gray-200 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-300 transition shadow-sm">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <span class="text-xs font-medium text-primary">Foto baru</span>
                            </div>
                        </div>

                        <label id="upload-label" for="foto"
                            class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-200 rounded-xl py-6 px-4 cursor-pointer hover:border-primary/50 hover:bg-primary/5 transition group">
                            <div class="w-10 h-10 rounded-xl bg-gray-100 group-hover:bg-primary/10 flex items-center justify-center transition">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-primary transition" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-600 group-hover:text-primary transition">
                                    {{ $guru->foto ? 'Ganti foto' : 'Klik untuk unggah' }}
                                </p>
                                <p class="text-xs text-gray-400 mt-0.5">JPG, PNG maks. 2MB</p>
                            </div>
                            <input type="file" id="foto" name="foto" accept="image/jpg,image/jpeg,image/png" class="hidden" onchange="previewFoto(this)">
                        </label>
                        @error('foto') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-6 pt-5 border-t border-gray-100">
                    <button type="submit"
                        class="flex items-center gap-2 bg-primary text-white font-semibold text-sm px-6 py-2.5 rounded-xl hover:bg-green-700 transition duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Simpan Identitas
                    </button>
                </div>
            </form>
        </div>

        {{-- Form Ubah Password --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                <span class="w-1 h-4 bg-blue-400 rounded-full"></span>
                Ubah Password
            </h3>
            <p class="text-xs text-gray-400 mb-5">Pastikan password baru minimal 6 karakter.</p>

            <form method="POST" action="{{ route('guru.profile.updatePassword') }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    {{-- Password Lama --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Password Lama <span class="text-red-400">*</span></label>
                        <div class="relative">
                            <input type="password" id="pw_lama" name="password_lama"
                                placeholder="••••••••"
                                class="w-full px-4 py-2.5 pr-10 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            <button type="button" onclick="togglePw('pw_lama')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_lama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Password Baru --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Password Baru <span class="text-red-400">*</span></label>
                        <div class="relative">
                            <input type="password" id="pw_baru" name="password_baru"
                                placeholder="Min. 6 karakter"
                                class="w-full px-4 py-2.5 pr-10 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            <button type="button" onclick="togglePw('pw_baru')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_baru') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Konfirmasi --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Konfirmasi Password <span class="text-red-400">*</span></label>
                        <div class="relative">
                            <input type="password" id="pw_konfirm" name="password_baru_confirmation"
                                placeholder="Ulangi password baru"
                                class="w-full px-4 py-2.5 pr-10 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            <button type="button" onclick="togglePw('pw_konfirm')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_baru_confirmation') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-6 pt-5 border-t border-gray-100">
                    <button type="submit"
                        class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                        </svg>
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@push('scripts')
<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('preview-container').classList.remove('hidden');
            document.getElementById('preview-container').classList.add('flex');
            document.getElementById('upload-label').classList.add('hidden');
            // tampilkan panah jika ada foto lama
            const panah = document.getElementById('panah-ganti');
            if (panah) { panah.classList.remove('hidden'); panah.classList.add('flex'); }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearFoto() {
    document.getElementById('foto').value = '';
    document.getElementById('preview-img').src = '#';
    document.getElementById('preview-container').classList.add('hidden');
    document.getElementById('preview-container').classList.remove('flex');
    document.getElementById('upload-label').classList.remove('hidden');
    const panah = document.getElementById('panah-ganti');
    if (panah) { panah.classList.add('hidden'); panah.classList.remove('flex'); }
}

function togglePw(id) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endpush

@endsection