@extends('admin.layout.app')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('guru.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Edit Data Guru</h1>
        <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $guru->nama }}</p>
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

<form method="POST" action="{{ route('guru.update', $guru) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

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
                        <input type="text" id="nama" name="nama"
                            value="{{ old('nama', $guru->nama) }}"
                            placeholder="Masukkan nama lengkap guru..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label for="nip" class="block text-xs font-medium text-gray-500 mb-1.5">NIP</label>
                        <input type="text" id="nip" name="nip"
                            value="{{ old('nip', $guru->nip) }}"
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
                        <label for="tempat_lahir" class="block text-xs font-medium text-gray-500 mb-1.5">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir', $guru->tempat_lahir) }}"
                            placeholder="Kota tempat lahir..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('tempat_lahir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tanggal_lahir" class="block text-xs font-medium text-gray-500 mb-1.5">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', optional($guru->tanggal_lahir instanceof \Carbon\Carbon ? $guru->tanggal_lahir : \Carbon\Carbon::parse($guru->tanggal_lahir))->format('Y-m-d')) }}"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('tanggal_lahir') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label for="no_hp" class="block text-xs font-medium text-gray-500 mb-1.5">No. HP / WhatsApp</label>
                        <input type="text" id="no_hp" name="no_hp"
                            value="{{ old('no_hp', $guru->no_hp) }}"
                            placeholder="08xx-xxxx-xxxx"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                        @error('no_hp') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="sm:col-span-2">
                        <label for="alamat" class="block text-xs font-medium text-gray-500 mb-1.5">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3"
                            placeholder="Alamat lengkap guru..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('alamat', $guru->alamat) }}</textarea>
                        @error('alamat') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>
            </div>

            {{-- Akun Login (info saja, password tidak bisa diubah di sini) --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-400 rounded-full"></span>
                    Akun Login
                </h3>
                <p class="text-xs text-gray-400 mb-5">Informasi akun login guru. Nama akan diperbarui otomatis sesuai nama di atas.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Username (readonly) --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Username</label>
                        <div class="flex items-center gap-2 px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl">
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                            </svg>
                            <span class="text-sm font-mono text-gray-600 font-medium">{{ $guru->user?->username ?? '—' }}</span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Username tidak dapat diubah.</p>
                    </div>

                    {{-- Status Akun --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Status Akun</label>
                        <div class="flex items-center gap-2 px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl">
                            @if($guru->user?->is_active)
                                <span class="w-2 h-2 rounded-full bg-green-500 flex-shrink-0"></span>
                                <span class="text-sm text-green-700 font-semibold">Aktif</span>
                            @else
                                <span class="w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                                <span class="text-sm text-gray-600 font-semibold">Nonaktif</span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Ubah status di manajemen pengguna.</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-5">

            {{-- Foto --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Foto Guru</h3>

                {{-- Foto saat ini --}}
                @if($guru->foto)
                <div class="mb-3">
                    <p class="text-xs text-gray-400 mb-1.5">Foto saat ini:</p>
                    <div class="relative">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                            class="w-full h-40 object-cover rounded-xl border border-gray-200">
                        <span class="absolute top-2 left-2 bg-black/50 text-white text-xs font-medium px-2 py-0.5 rounded-lg">
                            Saat ini
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1.5">Unggah foto baru untuk mengganti.</p>
                </div>
                @endif

                {{-- Preview baru --}}
                <div id="preview-container" class="hidden mb-3 relative">
                    <img id="preview-img" src="#" alt="Preview"
                        class="w-full h-44 object-cover rounded-xl border border-primary/30">
                    <span class="absolute top-2 left-2 bg-primary text-white text-xs font-medium px-2 py-0.5 rounded-lg">
                        Foto baru
                    </span>
                    <button type="button" onclick="clearFoto()"
                        class="absolute top-2 right-2 w-7 h-7 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-200 transition shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <label id="upload-label" for="foto"
                    class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-200 rounded-xl py-7 px-4 cursor-pointer hover:border-primary/50 hover:bg-primary/5 transition group">
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

            {{-- Info Rekap --}}
            <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Info</h3>
                <div class="space-y-2.5">
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Ditambahkan</span>
                        <span class="text-xs font-medium text-gray-600">{{ $guru->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Diperbarui</span>
                        <span class="text-xs font-medium text-gray-600">{{ $guru->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                    @if($guru->tanggal_lahir)
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Usia</span>
                        <span class="text-xs font-medium text-gray-600">{{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">Jenis Kelamin</span>
                        <span class="text-xs font-medium {{ $guru->jenis_kelamin === 'P' ? 'text-pink-500' : 'text-blue-500' }}">
                            {{ $guru->jenis_kelamin === 'L' ? '♂ Laki-laki' : ($guru->jenis_kelamin === 'P' ? '♀ Perempuan' : '—') }}
                        </span>
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
                <a href="{{ route('guru.index') }}"
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
</script>
@endpush

@endsection