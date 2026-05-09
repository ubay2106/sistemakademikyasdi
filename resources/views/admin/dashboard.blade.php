@extends('layout.app')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data dan aktivitas terkini')

@section('content')

{{-- ── Info Tahun Ajaran & Semester Aktif ── --}}
<div class="flex flex-col sm:flex-row gap-3 mb-6">
    <div class="flex items-center gap-3 bg-primary/5 border border-primary/20 px-5 py-3 rounded-2xl flex-1">
        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Tahun Ajaran Aktif</p>
            <p class="text-sm font-bold text-gray-700">{{ $tahunAktif?->nama ?? '—' }}</p>
        </div>
        @if($tahunAktif)
        <span class="ml-auto inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1 rounded-full flex-shrink-0">
            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
            Aktif
        </span>
        @endif
    </div>
    <div class="flex items-center gap-3 bg-blue-50 border border-blue-100 px-5 py-3 rounded-2xl flex-1">
        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25A8.967 8.967 0 0118 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Semester Aktif</p>
            <p class="text-sm font-bold text-gray-700">
                {{ $semesterAktif?->nama ?? '—' }}
                @if($semesterAktif?->tahunAjaran)
                <span class="text-gray-400 font-normal">· {{ $semesterAktif->tahunAjaran->nama }}</span>
                @endif
            </p>
        </div>
        @if($semesterAktif)
        <span class="ml-auto inline-flex items-center gap-1.5 text-xs font-semibold bg-blue-100 text-blue-700 px-3 py-1 rounded-full flex-shrink-0">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
            Aktif
        </span>
        @endif
    </div>
</div>

{{-- ── Statistik Utama ── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
        $stats = [
            ['label' => 'Total Guru',       'value' => $totalGuru,   'color' => 'blue',   'href' => route('admin.guru.index'),
             'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0Zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'],
            ['label' => 'Siswa Aktif',      'value' => $totalSiswa,  'color' => 'green',  'href' => route('admin.siswa.index'),
             'icon' => 'M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z'],
            ['label' => 'Total Kelas',      'value' => $totalKelas,  'color' => 'purple', 'href' => route('admin.kelas.index'),
             'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
            ['label' => 'Mata Pelajaran',   'value' => $totalMapel,  'color' => 'amber',  'href' => route('admin.matapelajaran.index'),
             'icon' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25A8.967 8.967 0 0118 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],
        ];
    @endphp
    @foreach($stats as $s)
    <a href="{{ $s['href'] }}"
        class="bg-white rounded-xl border border-gray-100 px-4 py-4 flex items-center gap-3 hover:shadow-md hover:border-{{ $s['color'] }}-200 transition-all duration-300 group">
        <div class="w-10 h-10 rounded-xl bg-{{ $s['color'] }}-50 group-hover:bg-{{ $s['color'] }}-100 flex items-center justify-center flex-shrink-0 transition">
            <svg class="w-5 h-5 text-{{ $s['color'] }}-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}" />
            </svg>
        </div>
        <div>
            <p class="text-xl font-bold text-gray-800 leading-none">{{ number_format($s['value']) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $s['label'] }}</p>
        </div>
    </a>
    @endforeach
</div>

{{-- ── Statistik Akademik & Konten ── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-4 flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-cyan-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
        </div>
        <div>
            <p class="text-xl font-bold text-gray-800 leading-none">{{ number_format($totalPengajar) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Pengajar Aktif</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-4 flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 19.5m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125" />
            </svg>
        </div>
        <div>
            <p class="text-xl font-bold text-gray-800 leading-none">{{ number_format($totalNilai) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Total Nilai</p>
        </div>
    </div>
    <a href="{{ route('admin.berita.index') }}"
        class="bg-white rounded-xl border border-gray-100 px-4 py-4 flex items-center gap-3 hover:shadow-md transition-all group">
        <div class="w-10 h-10 rounded-xl bg-orange-50 group-hover:bg-orange-100 flex items-center justify-center flex-shrink-0 transition">
            <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
            </svg>
        </div>
        <div>
            <p class="text-xl font-bold text-gray-800 leading-none">{{ number_format($totalBerita) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Total Berita</p>
        </div>
    </a>
    <a href="{{ route('admin.prestasi.index') }}"
        class="bg-white rounded-xl border border-gray-100 px-4 py-4 flex items-center gap-3 hover:shadow-md transition-all group">
        <div class="w-10 h-10 rounded-xl bg-amber-50 group-hover:bg-amber-100 flex items-center justify-center flex-shrink-0 transition">
            <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
            </svg>
        </div>
        <div>
            <p class="text-xl font-bold text-gray-800 leading-none">{{ number_format($totalPrestasi) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Total Prestasi</p>
        </div>
    </a>
</div>


{{-- ── Baris Tengah: Kelas Terisi + Pengajar Terbaru ── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

    {{-- Kelas Terisi --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="text-sm font-semibold text-gray-700">Kapasitas Kelas</h3>
            <a href="{{ route('admin.kelas.index') }}" class="text-xs font-semibold text-primary hover:underline">Lihat Semua</a>
        </div>
        <div class="p-4 space-y-3">
            @forelse($kelasTerisi as $kelas)
            @php
                $max    = 40; // sesuaikan kapasitas default
                $terisi = $kelas->total_siswa_aktif;
                $persen = $max > 0 ? min(100, round(($terisi / $max) * 100)) : 0;
                $color  = $persen >= 90 ? 'bg-red-400' : ($persen >= 70 ? 'bg-amber-400' : 'bg-primary');
            @endphp
            <div>
                <div class="flex items-center justify-between mb-1">
                    <p class="text-xs font-semibold text-gray-700">{{ $kelas->nama_kelas }}</p>
                    <span class="text-xs text-gray-400">{{ $terisi }} siswa</span>
                </div>
                <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="{{ $color }} h-2 rounded-full transition-all duration-500" style="width: {{ $persen }}%"></div>
                </div>
            </div>
            @empty
            <div class="py-8 text-center">
                <p class="text-gray-400 text-sm">Belum ada data kelas</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Pengajar Terbaru --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="text-sm font-semibold text-gray-700">Pengajar Terbaru</h3>
            <a href="{{ route('admin.pengajar.index') }}" class="text-xs font-semibold text-primary hover:underline">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($pengajarTerbaru as $p)
            <div class="flex items-center gap-3 px-6 py-3">
                <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0 font-bold text-sm text-primary">
                    {{ strtoupper(substr($p->guru->nama ?? '?', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-700 truncate">{{ $p->guru->nama ?? '—' }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ $p->mataPelajaran->nama ?? '—' }} · Kelas {{ $p->kelas->nama_kelas ?? '—' }}</p>
                </div>
                <span class="text-xs text-gray-400 flex-shrink-0">{{ $p->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <div class="py-8 text-center">
                <p class="text-gray-400 text-sm">Belum ada data pengajar</p>
            </div>
            @endforelse
        </div>
    </div>

</div>

{{-- ── Baris Bawah: Nilai Terbaru + Berita + Prestasi ── --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Nilai Terbaru --}}
    <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="text-sm font-semibold text-gray-700">Nilai Terbaru</h3>
            <a href="{{ route('admin.nilai.index') }}" class="text-xs font-semibold text-primary hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/70 border-b border-gray-100">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3">Siswa</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3 hidden md:table-cell">Mata Pelajaran</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3 hidden lg:table-cell">Kelas</th>
                        <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3">Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($nilaiTerbaru as $n)
                    @php
                        $na    = $n->nilai_akhir ?? 0;
                        $badge = $na >= 85 ? ['bg-green-50','text-green-700'] :
                                ($na >= 70 ? ['bg-blue-50','text-blue-700'] :
                                ($na >= 55 ? ['bg-amber-50','text-amber-700'] : ['bg-red-50','text-red-600']));
                    @endphp
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-3">
                            <p class="text-sm font-semibold text-gray-700">{{ $n->siswa->nama ?? '—' }}</p>
                            <p class="text-xs text-gray-400">{{ $n->semester->nama ?? '—' }}</p>
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            <p class="text-sm text-gray-600">{{ $n->pengajar->mataPelajaran->nama ?? '—' }}</p>
                        </td>
                        <td class="px-4 py-3 hidden lg:table-cell">
                            <span class="text-xs font-medium bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full">
                                {{ $n->pengajar->kelas->nama_kelas ?? '—' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($n->nilai_akhir !== null)
                            <span class="inline-block text-sm font-bold {{ $badge[0] }} {{ $badge[1] }} px-3 py-1 rounded-full min-w-[3rem]">
                                {{ $n->nilai_akhir }}
                            </span>
                            @else
                            <span class="text-xs text-gray-300">—</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada data nilai</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Berita & Prestasi Terbaru --}}
    <div class="space-y-5">

        {{-- Berita Terbaru --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <h3 class="text-sm font-semibold text-gray-700">Berita Terbaru</h3>
                <a href="{{ route('admin.berita.index') }}" class="text-xs font-semibold text-primary hover:underline">Semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($beritaTerbaru as $b)
                <div class="px-5 py-3 flex items-start gap-3 hover:bg-gray-50/50 transition">
                    @if($b->gambar_utama)
                        <img src="{{ asset('storage/' . $b->gambar_utama) }}" alt="{{ $b->judul }}"
                            class="w-10 h-10 rounded-xl object-cover flex-shrink-0">
                    @else
                        <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5" />
                            </svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-semibold text-gray-700 line-clamp-2 leading-snug">{{ $b->judul }}</p>
                        <div class="flex items-center gap-1.5 mt-1">
                            @php
                                $statusColor = match($b->status) {
                                    'published' => 'bg-green-50 text-green-700',
                                    'draft'     => 'bg-gray-100 text-gray-500',
                                    default     => 'bg-amber-50 text-amber-600',
                                };
                            @endphp
                            <span class="text-[10px] font-semibold {{ $statusColor }} px-2 py-0.5 rounded-full">
                                {{ ucfirst($b->status) }}
                            </span>
                            <span class="text-[10px] text-gray-400">{{ $b->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-5 py-8 text-center text-gray-400 text-sm">Belum ada berita</div>
                @endforelse
            </div>
        </div>

        {{-- Prestasi Terbaru --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <h3 class="text-sm font-semibold text-gray-700">Prestasi Terbaru</h3>
                <a href="{{ route('admin.prestasi.index') }}" class="text-xs font-semibold text-primary hover:underline">Semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($prestasiTerbaru as $pr)
                @php
                    $juaraColor = match($pr->juara) {
                        '1'     => 'bg-yellow-50 text-yellow-700',
                        '2'     => 'bg-gray-100 text-gray-600',
                        '3'     => 'bg-orange-50 text-orange-600',
                        default => 'bg-green-50 text-green-700',
                    };
                    $juaraLabel = match($pr->juara) {
                        '1' => '🥇 Juara 1', '2' => '🥈 Juara 2', '3' => '🥉 Juara 3',
                        default => ucfirst($pr->juara ?? '—'),
                    };
                @endphp
                <div class="px-5 py-3 flex items-start gap-3 hover:bg-gray-50/50 transition">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center flex-shrink-0 text-lg">
                        {{ $pr->juara === '1' ? '🥇' : ($pr->juara === '2' ? '🥈' : ($pr->juara === '3' ? '🥉' : '🏅')) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-semibold text-gray-700 line-clamp-1">{{ $pr->nama_peserta }}</p>
                        <p class="text-[10px] text-gray-400 line-clamp-1 mt-0.5">{{ $pr->nama_lomba }}</p>
                        <div class="flex items-center gap-1.5 mt-1">
                            <span class="text-[10px] font-semibold {{ $juaraColor }} px-2 py-0.5 rounded-full">{{ $juaraLabel }}</span>
                            @if($pr->tingkat)
                            <span class="text-[10px] text-gray-400">· {{ ucfirst($pr->tingkat) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-5 py-8 text-center text-gray-400 text-sm">Belum ada prestasi</div>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection