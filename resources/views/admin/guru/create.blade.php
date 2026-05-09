@extends('layout.app')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.guru.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Tambah Guru</h1>
        <p class="text-xs text-gray-400 mt-0.5">Isi data guru dan buat akun login sekaligus</p>
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

<form method="POST" action="{{ route('admin.guru.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Data Pribadi --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-primary rounded-full"></span>
                    Data Pribadi
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    {{-- Nama --}}
                    <div class="sm:col-span-2">
                        <label for="nama" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Nama Lengkap <span class="text-red-400">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap guru..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label for="nip" class="block text-xs font-medium text-gray-500 mb-1.5">NIP</label>
                        <input type="text" id="nip" name="nip" value="{{ old('nip') }}"
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
                                    {{ old('jenis_kelamin') === 'L' ? 'checked' : '' }}>
                                <div class="peer-checked:bg-blue-50 peer-checked:border-blue-400 peer-checked:text-blue-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                    ♂ Laki-laki
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="jenis_kelamin" value="P" class="peer hidden"
                                    {{ old('jenis_kelamin') === 'P' ? 'checked' : '' }}>
                                <div class="peer-checked:bg-pink-50 peer-checked:border-pink-400 peer-checked:text-pink-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                    ♀ Perempuan
                                </div>
                            </label>
                        </div>
                        @error('jenis_kelamin') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label for="tempat_lahir" class="block text-xs font-medium text-gray-500 mb-1.5">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            placeholder="Kota tempat lahir..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('tempat_lahir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tanggal_lahir" class="block text-xs font-medium text-gray-500 mb-1.5">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('tanggal_lahir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label for="no_hp" class="block text-xs font-medium text-gray-500 mb-1.5">No. HP / WhatsApp</label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                            placeholder="08xx-xxxx-xxxx"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('no_hp') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="sm:col-span-2">
                        <label for="alamat" class="block text-xs font-medium text-gray-500 mb-1.5">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3"
                            placeholder="Alamat lengkap guru..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('alamat') }}</textarea>
                        @error('alamat') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>
            </div>

            {{-- Akun Login --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-400 rounded-full"></span>
                    Akun Login
                </h3>
                <p class="text-xs text-gray-400 mb-5">Guru akan menggunakan username dan password ini untuk login ke sistem.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    {{-- Username --}}
                    <div>
                        <label for="username" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Username <span class="text-red-400">*</span>
                        </label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            placeholder="username unik..."
                            autocomplete="off"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition font-mono">
                        @error('username') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Password <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                placeholder="Minimal 6 karakter..."
                                autocomplete="new-password"
                                class="w-full px-4 py-2.5 pr-10 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            <button type="button" onclick="togglePassword('password', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-5">

            {{-- Foto --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Foto Guru</h3>

                {{-- Preview --}}
                <div id="preview-container" class="hidden mb-3 relative">
                    <img id="preview-img" src="#" alt="Preview"
                        class="w-full h-44 object-cover rounded-xl border border-gray-200">
                    <button type="button" onclick="clearFoto()"
                        class="absolute top-2 right-2 w-7 h-7 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-200 transition shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <label id="upload-label" for="foto"
                    class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-200 rounded-xl py-8 px-4 cursor-pointer hover:border-primary/50 hover:bg-primary/5 transition group">
                    <div class="w-12 h-12 rounded-xl bg-gray-100 group-hover:bg-primary/10 flex items-center justify-center transition">
                        <svg class="w-6 h-6 text-gray-400 group-hover:text-primary transition" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-600 group-hover:text-primary transition">Klik untuk unggah foto</p>
                        <p class="text-xs text-gray-400 mt-0.5">JPG, PNG maks. 2MB</p>
                    </div>
                    <input type="file" id="foto" name="foto" accept="image/jpg,image/jpeg,image/png" class="hidden" onchange="previewFoto(this)">
                </label>

                @error('foto') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
            </div>

            {{-- Info --}}
            <div class="bg-blue-50 rounded-2xl border border-blue-100 p-5">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-blue-700 mb-1">Informasi</p>
                        <p class="text-xs text-blue-600 leading-relaxed">Akun login akan dibuat otomatis dengan role <strong>guru</strong> dan status aktif. Guru dapat login menggunakan username dan password yang ditentukan.</p>
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
                    Simpan Data Guru
                </button>
                <a href="{{ route('admin.guru.index') }}"
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
            </div>

        </div>
    </div>
</form>

@push('scripts')
<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('preview-container').classList.remove('hidden');
            document.getElementById('upload-label').classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearFoto() {
    document.getElementById('foto').value = '';
    document.getElementById('preview-img').src = '#';
    document.getElementById('preview-container').classList.add('hidden');
    document.getElementById('upload-label').classList.remove('hidden');
}

function togglePassword(id, btn) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endpush

@endsection