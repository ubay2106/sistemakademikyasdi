@extends('layout.app')

@section('content')
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.siswa.index') }}"
            class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-lg font-bold text-gray-800 leading-none">Edit Data Siswa</h1>
            <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $siswa->nama }}</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
            <svg class="w-5 h-5 flex-shrink-0 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            </svg>
            <div>
                <p class="text-sm font-semibold mb-1">Terdapat kesalahan:</p>
                <ul class="text-sm list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="this.parentElement.remove()"
                class="ml-auto text-red-400 hover:text-red-600 transition flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.siswa.update', $siswa) }}">
        @csrf @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Kolom Kiri: Form Utama --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Data Identitas --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                        <span class="w-1 h-4 bg-primary rounded-full"></span>
                        Data Identitas
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        {{-- Nama --}}
                        <div class="sm:col-span-2">
                            <label for="nama" class="block text-xs font-medium text-gray-500 mb-1.5">
                                Nama Lengkap <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}"
                                placeholder="Masukkan nama lengkap siswa..."
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            @error('nama')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- NIS --}}
                        <div>
                            <label for="nis" class="block text-xs font-medium text-gray-500 mb-1.5">
                                NIS <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}"
                                placeholder="Nomor Induk Siswa..."
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition font-mono">
                            @error('nis')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1.5">
                                Jenis Kelamin <span class="text-red-400">*</span>
                            </label>
                            <div class="flex gap-2">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="L" class="peer hidden"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'L' ? 'checked' : '' }}>
                                    <div
                                        class="peer-checked:bg-blue-50 peer-checked:border-blue-400 peer-checked:text-blue-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                        ♂ Laki-laki
                                    </div>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="P" class="peer hidden"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'P' ? 'checked' : '' }}>
                                    <div
                                        class="peer-checked:bg-pink-50 peer-checked:border-pink-400 peer-checked:text-pink-700 flex items-center justify-center gap-1.5 border border-gray-200 rounded-xl py-2.5 text-xs font-semibold text-gray-500 transition hover:border-gray-300">
                                        ♀ Perempuan
                                    </div>
                                </label>
                            </div>
                            @error('jenis_kelamin')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tempat Lahir --}}
                        <div>
                            <label for="tempat_lahir" class="block text-xs font-medium text-gray-500 mb-1.5">Tempat
                                Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" placeholder="Kota tempat lahir..."
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            @error('tempat_lahir')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <label for="tanggal_lahir" class="block text-xs font-medium text-gray-500 mb-1.5">Tanggal
                                Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d') : '') }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                            @error('tanggal_lahir')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

            {{-- Kolom Kanan: Status + Info + Aksi --}}
            <div class="space-y-5">

                {{-- Status --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-4">Status Siswa</h3>

                    <div class="space-y-2">
                        @php
                            $statuses = [
                                'aktif' => [
                                    'label' => 'Aktif',
                                    'dot' => 'bg-green-500',
                                    'checked' =>
                                        'peer-checked:border-green-500 peer-checked:bg-green-100 peer-checked:ring-2 peer-checked:ring-green-200',
                                    'desc' => 'Masih terdaftar dan aktif belajar',
                                ],
                                'lulus' => [
                                    'label' => 'Lulus',
                                    'dot' => 'bg-blue-500',
                                    'checked' =>
                                        'peer-checked:border-blue-500 peer-checked:bg-blue-100 peer-checked:ring-2 peer-checked:ring-blue-200',
                                    'desc' => 'Telah menyelesaikan pendidikan',
                                ],
                                'pindah' => [
                                    'label' => 'Pindah',
                                    'dot' => 'bg-amber-500',
                                    'checked' =>
                                        'peer-checked:border-amber-500 peer-checked:bg-amber-100 peer-checked:ring-2 peer-checked:ring-amber-200',
                                    'desc' => 'Pindah ke sekolah lain',
                                ],
                                'keluar' => [
                                    'label' => 'Keluar',
                                    'dot' => 'bg-red-500',
                                    'checked' =>
                                        'peer-checked:border-red-500 peer-checked:bg-red-100 peer-checked:ring-2 peer-checked:ring-red-200',
                                    'desc' => 'Keluar dari sekolah',
                                ],
                            ];
                        @endphp

                        @foreach ($statuses as $value => $s)
                            <label class="cursor-pointer block">
                                <input type="radio" name="status" value="{{ $value }}" class="peer hidden"
                                    {{ old('status', $siswa->status) === $value ? 'checked' : '' }}>

                                <div
                                    class="flex items-center gap-3 border border-gray-200 rounded-xl px-4 py-3 transition hover:border-gray-300 {{ $s['checked'] }}">
                                    <span class="w-2.5 h-2.5 rounded-full flex-shrink-0 {{ $s['dot'] }}"></span>

                                    <div>
                                        <p class="text-xs font-semibold text-gray-700">{{ $s['label'] }}</p>
                                        <p class="text-xs text-gray-400 leading-snug">{{ $s['desc'] }}</p>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    @error('status')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Info Rekap --}}
                <div class="bg-gray-50 rounded-2xl border border-gray-100 p-5">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Info</h3>
                    <div class="space-y-2.5">
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400">NIS</span>
                            <span class="text-xs font-mono font-medium text-gray-600">{{ $siswa->nis }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400">Ditambahkan</span>
                            <span
                                class="text-xs font-medium text-gray-600">{{ $siswa->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400">Diperbarui</span>
                            <span
                                class="text-xs font-medium text-gray-600">{{ $siswa->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                        @if ($siswa->tanggal_lahir)
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-400">Usia</span>
                                <span
                                    class="text-xs font-medium text-gray-600">{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->age }}
                                    tahun</span>
                            </div>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400">Jenis Kelamin</span>
                            <span
                                class="text-xs font-medium {{ $siswa->jenis_kelamin === 'P' ? 'text-pink-500' : 'text-blue-500' }}">
                                {{ $siswa->jenis_kelamin === 'L' ? '♂ Laki-laki' : ($siswa->jenis_kelamin === 'P' ? '♀ Perempuan' : '—') }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex flex-col gap-2">
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-primary text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-green-700 transition duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.siswa.index') }}"
                        class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                        Batal
                    </a>
                </div>

            </div>
        </div>
    </form>
@endsection
