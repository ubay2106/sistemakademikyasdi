@extends('layout.app')

@section('content')
    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
            <svg class="w-5 h-5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
            <button onclick="this.parentElement.remove()" class="ml-auto text-green-400 hover:text-green-600 transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
            <svg class="w-5 h-5 flex-shrink-0 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <p class="text-sm font-medium">{{ session('error') }}</p>
            <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    {{-- Top Bar --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-lg font-bold text-gray-800">Rekap Nilai Siswa</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola nilai harian, tugas, UTS, UAS, dan nilai akhir per kelas</p>
        </div>
        <div class="flex items-center gap-2 flex-shrink-0">
            <a href=""
                class="flex items-center gap-2 bg-emerald-600 text-white font-semibold text-sm py-2.5 px-4 rounded-xl hover:bg-emerald-700 transition duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Export Excel
            </a>
        </div>
    </div>

    {{-- Filter Panel --}}
    <div class="bg-white rounded-2xl border border-gray-100 px-5 py-4 mb-5">
        <form method="GET" action="{{ route('admin.nilai.index') }}" class="flex flex-col gap-3">
            <div class="flex items-center gap-2 mb-1">
                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Filter Data</span>
                @if (request()->hasAny(['tahun_ajaran_id', 'semester_id', 'kelas_id', 'mapel_id', 'search']))
                    <a href="{{ route('admin.nilai.index') }}"
                        class="ml-auto text-xs text-red-400 hover:text-red-600 font-medium flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        Reset Filter
                    </a>
                @endif
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                {{-- Tahun Ajaran --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-1 font-medium">Tahun Ajaran</label>
                    <select name="tahun_ajaran_id" onchange="this.form.submit()"
                        class="w-full border border-gray-200 rounded-xl text-sm text-gray-700 px-3 py-2.5 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        <option value="">Semua</option>
                        @foreach ($tahunAjarans as $ta)
                            <option value="{{ $ta->id }}"
                                {{ request('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
                                {{ $ta->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Semester --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-1 font-medium">Semester</label>
                    <select name="semester_id" onchange="this.form.submit()"
                        class="w-full border border-gray-200 rounded-xl text-sm text-gray-700 px-3 py-2.5 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        <option value="">Semua</option>
                        @foreach ($semesters as $sem)
                            <option value="{{ $sem->id }}" {{ request('semester_id') == $sem->id ? 'selected' : '' }}>
                                {{ $sem->nama }} ({{ $sem->tahunAjaran->nama ?? '' }})
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Kelas --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-1 font-medium">Kelas</label>
                    <select name="kelas_id" onchange="this.form.submit()"
                        class="w-full border border-gray-200 rounded-xl text-sm text-gray-700 px-3 py-2.5 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        <option value="">Semua Kelas</option>
                        @foreach ($kelass as $kelas)
                            <option value="{{ $kelas->id }}" {{ request('kelas_id') == $kelas->id ? 'selected' : '' }}>
                                {{ $kelas->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Mata Pelajaran --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-1 font-medium">Mata Pelajaran</label>
                    <select name="mapel_id" onchange="this.form.submit()"
                        class="w-full border border-gray-200 rounded-xl text-sm text-gray-700 px-3 py-2.5 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        <option value="">Semua Mapel</option>
                        @foreach ($mataPelajarans as $mp)
                            <option value="{{ $mp->id }}" {{ request('mapel_id') == $mp->id ? 'selected' : '' }}>
                                {{ $mp->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Search --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-1 font-medium">Cari Siswa</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nama siswa..."
                            class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-violet-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-violet-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $nilais->total() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Total Data</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $rataRata }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Rata-rata Akhir</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 11.25l-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $nilaiTertinggi }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Nilai Tertinggi</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-orange-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $nilaiTerendah }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Nilai Terendah</p>
            </div>
        </div>
    </div>

    {{-- Tabel Rekap Nilai --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px]">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/70">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-5 py-3.5 w-8">
                            #</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3.5">
                            Siswa</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3.5">
                            Kelas</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3.5">Mata
                            Pelajaran</th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3.5 hidden xl:table-cell">
                            Semester</th>
                        <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-3.5">
                            Harian</th>
                        <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-3.5">
                            Tugas</th>
                        <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-3.5">
                            UTS</th>
                        <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-3.5">
                            UAS</th>
                        <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-3.5">
                            Rata-rata</th>
                        <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-5 py-3.5">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($nilais as $i => $n)
                        <tr class="hover:bg-gray-50/60 transition group">
                            <td class="px-5 py-3.5 text-xs text-gray-400">{{ $nilais->firstItem() + $i }}</td>

                            {{-- Siswa --}}
                            <td class="px-4 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-xs
                                {{ ($n->siswa->jenis_kelamin ?? '') === 'P' ? 'bg-pink-50 text-pink-400' : 'bg-blue-50 text-blue-400' }}">
                                        {{ strtoupper(substr($n->siswa->nama ?? '?', 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="font-semibold text-gray-800 text-sm truncate max-w-[140px] group-hover:text-primary transition">
                                            {{ $n->siswa->nama ?? '—' }}
                                        </p>
                                        @if ($n->siswa->nis ?? null)
                                            <p class="text-xs text-gray-400">NIS: {{ $n->siswa->nis }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Kelas --}}
                            <td class="px-4 py-3.5">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 text-xs font-semibold">
                                    {{ $n->pengajar->kelas->nama_kelas ?? '—' }}
                                </span>
                            </td>

                            {{-- Mapel --}}
                            <td class="px-4 py-3.5">
                                <p class="text-sm text-gray-700 font-medium truncate max-w-[150px]">
                                    {{ $n->pengajar->mataPelajaran->nama ?? '—' }}
                                </p>
                                @if ($n->pengajar->guru)
                                    <p class="text-xs text-gray-400 mt-0.5 truncate max-w-[150px]">
                                        {{ $n->pengajar->guru->nama }}</p>
                                @endif
                            </td>

                            {{-- Semester --}}
                            <td class="px-4 py-3.5 hidden xl:table-cell">
                                <p class="text-sm text-gray-600">{{ $n->semester->nama ?? '—' }}</p>
                                <p class="text-xs text-gray-400">{{ $n->semester->tahunAjaran->nama ?? '' }}</p>
                            </td>

                            {{-- Nilai Harian --}}
                            <td class="px-3 py-3.5 text-center">
                                <span
                                    class="text-sm font-semibold {{ $n->nilai_harian !== null && $n->nilai_harian >= 75 ? 'text-gray-700' : ($n->nilai_harian !== null ? 'text-orange-500' : 'text-gray-300') }}">
                                    {{ $n->nilai_harian ?? '—' }}
                                </span>
                            </td>

                            {{-- Nilai Tugas --}}
                            <td class="px-3 py-3.5 text-center">
                                <span
                                    class="text-sm font-semibold {{ $n->nilai_tugas !== null && $n->nilai_tugas >= 75 ? 'text-gray-700' : ($n->nilai_tugas !== null ? 'text-orange-500' : 'text-gray-300') }}">
                                    {{ $n->nilai_tugas ?? '—' }}
                                </span>
                            </td>

                            {{-- Nilai UTS --}}
                            <td class="px-3 py-3.5 text-center">
                                <span
                                    class="text-sm font-semibold {{ $n->nilai_uts !== null && $n->nilai_uts >= 75 ? 'text-gray-700' : ($n->nilai_uts !== null ? 'text-orange-500' : 'text-gray-300') }}">
                                    {{ $n->nilai_uts ?? '—' }}
                                </span>
                            </td>

                            {{-- Nilai UAS --}}
                            <td class="px-3 py-3.5 text-center">
                                <span
                                    class="text-sm font-semibold {{ $n->nilai_uas !== null && $n->nilai_uas >= 75 ? 'text-gray-700' : ($n->nilai_uas !== null ? 'text-orange-500' : 'text-gray-300') }}">
                                    {{ $n->nilai_uas ?? '—' }}
                                </span>
                            </td>

                            {{-- Nilai Akhir --}}
                            <td class="px-3 py-3.5 text-center">
                                <span
                                    class="text-sm font-semibold {{ $n->nilai_akhir !== null && $n->nilai_akhir >= 75 ? 'text-gray-700' : ($n->nilai_akhir !== null ? 'text-orange-500' : 'text-gray-300') }}">
                                    {{ $n->nilai_akhir ?? '—' }}
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-3.5">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('admin.nilai.edit', $n) }}"
                                        class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                        title="Edit Nilai">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.nilai.destroy', $n) }}"
                                        onsubmit="return confirm('Yakin hapus nilai siswa {{ $n->siswa->nama ?? '' }} ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-400 hover:text-red-600 transition"
                                            title="Hapus Nilai">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="px-6 py-20 text-center">
                                <div
                                    class="w-20 h-20 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-gray-200" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                    </svg>
                                </div>
                                <p class="text-gray-400 font-semibold">Belum ada data nilai</p>
                                <p class="text-gray-300 text-sm mt-1">
                                    @if (request()->hasAny(['tahun_ajaran_id', 'semester_id', 'kelas_id', 'mapel_id', 'search']))
                                        Tidak ada data yang sesuai dengan filter. <a href="{{ route('admin.nilai.index') }}"
                                            class="text-primary hover:underline">Reset filter</a>
                                    @else
                                        Mulai dengan menambahkan nilai siswa pertama
                                    @endif
                                </p>
                                @if (!request()->hasAny(['tahun_ajaran_id', 'semester_id', 'kelas_id', 'mapel_id', 'search']))
                                    <a href="{{ route('admin.nilai.create') }}"
                                        class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                                        + Tambah Nilai
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($nilais->hasPages())
            <div class="px-5 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-gray-400">
                    Menampilkan {{ $nilais->firstItem() }}–{{ $nilais->lastItem() }} dari {{ $nilais->total() }} data
                </p>
                {{ $nilais->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection
