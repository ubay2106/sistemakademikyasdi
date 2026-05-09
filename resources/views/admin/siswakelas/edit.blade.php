@extends('layout.app')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.siswakelas.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Edit Siswa Kelas</h1>
        <p class="text-xs text-gray-400 mt-0.5">Perbarui data penempatan siswa</p>
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

<form method="POST" action="{{ route('admin.siswakelas.update', $siswaKelas) }}">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Siswa & Kelas --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-500 rounded-full"></span>
                    Penempatan Siswa
                </h3>

                <div class="space-y-4">

                    {{-- Siswa --}}
                    <div>
                        <label for="siswa_id" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Siswa <span class="text-red-400">*</span>
                        </label>
                        <select id="siswa_id" name="siswa_id"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 focus:bg-white transition appearance-none
                                {{ $errors->has('siswa_id') ? 'border-red-300 bg-red-50' : '' }}">
                            <option value="" disabled>Pilih siswa...</option>
                            @foreach($siswas as $s)
                                <option value="{{ $s->id }}" {{ old('siswa_id', $siswaKelas->siswa_id) == $s->id ? 'selected' : '' }}>
                                    {{ $s->nama }}{{ $s->nis ? ' — ' . $s->nis : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('siswa_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Kelas --}}
                    <div>
                        <label for="kelas_id" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Kelas <span class="text-red-400">*</span>
                        </label>
                        <select id="kelas_id" name="kelas_id"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 focus:bg-white transition appearance-none
                                {{ $errors->has('kelas_id') ? 'border-red-300 bg-red-50' : '' }}">
                            <option value="" disabled>Pilih kelas...</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id', $siswaKelas->kelas_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tahun Ajaran --}}
                    <div>
                        <label for="tahun_ajaran_id" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Tahun Ajaran <span class="text-red-400">*</span>
                        </label>
                        <select id="tahun_ajaran_id" name="tahun_ajaran_id"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 focus:bg-white transition appearance-none
                                {{ $errors->has('tahun_ajaran_id') ? 'border-red-300 bg-red-50' : '' }}">
                            <option value="" disabled>Pilih tahun ajaran...</option>
                            @foreach($tahunAjarans as $ta)
                                <option value="{{ $ta->id }}" {{ old('tahun_ajaran_id', $siswaKelas->tahun_ajaran_id) == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->nama }}{{ $ta->is_active ? ' (Aktif)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>
            </div>

            {{-- Status --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-500 rounded-full"></span>
                    Status Siswa
                </h3>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @php
                        $statusOptions = [
                            'aktif'   => ['label' => 'Aktif',        'desc' => 'Sedang berjalan', 'color' => 'green',  'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
                            'naik'    => ['label' => 'Naik Kelas',   'desc' => 'Lanjut ke atas',  'color' => 'blue',   'icon' => 'M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18'],
                            'tinggal' => ['label' => 'Tinggal Kelas','desc' => 'Tidak naik',      'color' => 'orange', 'icon' => 'M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3'],
                            'lulus'   => ['label' => 'Lulus',        'desc' => 'Telah lulus',     'color' => 'emerald','icon' => 'M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.741-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5'],
                        ];
                        $colorMap = [
                            'green'  => ['border' => 'peer-checked:border-green-500',  'bg' => 'peer-checked:bg-green-50',  'icon' => 'bg-green-100 text-green-600'],
                            'blue'   => ['border' => 'peer-checked:border-blue-500',   'bg' => 'peer-checked:bg-blue-50',   'icon' => 'bg-blue-100 text-blue-600'],
                            'orange' => ['border' => 'peer-checked:border-orange-400', 'bg' => 'peer-checked:bg-orange-50', 'icon' => 'bg-orange-100 text-orange-500'],
                            'emerald'=> ['border' => 'peer-checked:border-emerald-500','bg' => 'peer-checked:bg-emerald-50','icon' => 'bg-emerald-100 text-emerald-600'],
                        ];
                    @endphp

                    @foreach($statusOptions as $val => $opt)
                    @php $cm = $colorMap[$opt['color']]; @endphp
                    <label class="cursor-pointer">
                        <input type="radio" name="status" value="{{ $val }}" class="peer sr-only"
                            {{ old('status', $siswaKelas->status) === $val ? 'checked' : '' }}>
                        <div class="flex flex-col items-center gap-2 border-2 border-gray-200 rounded-xl p-3.5 text-center transition {{ $cm['border'] }} {{ $cm['bg'] }}">
                            <div class="w-8 h-8 rounded-lg {{ $cm['icon'] }} flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $opt['icon'] }}" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-700">{{ $opt['label'] }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $opt['desc'] }}</p>
                            </div>
                        </div>
                    </label>
                    @endforeach
                </div>
                @error('status') <p class="text-xs text-red-500 mt-2">{{ $message }}</p> @enderror
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-5">

            {{-- Data Saat Ini --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Data Saat Ini</p>
                <div class="space-y-3">
                    {{-- Siswa --}}
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 flex items-center justify-center flex-shrink-0 font-bold text-xs text-cyan-600">
                            {{ strtoupper(substr($siswaKelas->siswa?->nama ?? '?', 0, 2)) }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Siswa</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $siswaKelas->siswa?->nama ?? '—' }}</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-50 pt-3 grid grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs text-gray-400">Kelas</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $siswaKelas->kelas?->nama_kelas ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Tahun Ajaran</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $siswaKelas->tahunAjaran?->nama ?? '—' }}</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-50 pt-3">
                        <p class="text-xs text-gray-400 mb-1.5">Status</p>
                        @php
                            $statusBadge = [
                                'aktif'   => 'bg-green-50 text-green-700',
                                'naik'    => 'bg-blue-50 text-blue-600',
                                'tinggal' => 'bg-orange-50 text-orange-600',
                                'lulus'   => 'bg-emerald-50 text-emerald-700',
                            ];
                            $statusLabel = [
                                'aktif'   => 'Aktif',
                                'naik'    => 'Naik Kelas',
                                'tinggal' => 'Tinggal Kelas',
                                'lulus'   => 'Lulus',
                            ];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1 rounded-full {{ $statusBadge[$siswaKelas->status] ?? 'bg-gray-100 text-gray-500' }}">
                            {{ $statusLabel[$siswaKelas->status] ?? ucfirst($siswaKelas->status) }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Info --}}
            <div class="bg-amber-50 rounded-2xl border border-amber-100 p-5">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-amber-700 mb-1">Perhatian</p>
                        <p class="text-xs text-amber-600 leading-relaxed">Mengubah siswa atau tahun ajaran dapat menyebabkan konflik jika siswa sudah terdaftar di tahun ajaran yang sama.</p>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col gap-2">
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-blue-500 text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-blue-600 transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                    </svg>
                    Perbarui Data
                </button>
                <a href="{{ route('admin.siswakelas.index') }}"
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
            </div>

        </div>
    </div>
</form>

@endsection