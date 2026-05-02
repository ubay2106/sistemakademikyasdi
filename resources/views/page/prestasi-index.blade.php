@extends('layout.app')

@section('title', 'Prestasi Siswa')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-primary to-green-800 pt-36 pb-20 overflow-hidden">
    {{-- Decorative --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-white/5 rounded-full"></div>
        <div class="absolute bottom-0 left-10 w-48 h-48 bg-yellow-400/10 rounded-full"></div>
        <svg class="absolute right-0 bottom-0 opacity-5 w-96" viewBox="0 0 200 200" fill="white">
            <path d="M100 10 L120 70 L180 70 L135 110 L150 170 L100 135 L50 170 L65 110 L20 70 L80 70 Z"/>
        </svg>
    </div>

    <div class="container relative text-center">
        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-yellow-300 bg-yellow-400/10 border border-yellow-400/20 px-4 py-2 rounded-full mb-6">
            🏆 Prestasi Siswa
        </span>
        <h1 class="text-3xl lg:text-5xl font-extrabold text-white leading-tight mb-4">
            Galeri Prestasi & Pencapaian
        </h1>
        <p class="text-green-100 text-base max-w-xl mx-auto mb-10">
            Setiap medali, piala, dan penghargaan adalah bukti kerja keras dan dedikasi siswa-siswi kami.
        </p>

    </div>
</section>

{{-- Prestasi Grid --}}
<section class="py-16 bg-gray-50 min-h-[60vh]">
    <div class="container">

        @if($prestasis->isEmpty())
        <div class="text-center py-24">
            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5Z"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-700 mb-2">Belum Ada Prestasi</h3>
            <p class="text-gray-400 text-sm">Coba ubah filter atau kata kunci pencarian Anda.</p>
        </div>
        @else

        {{-- Hasil Info --}}
        <div class="flex items-center justify-between mb-8">
            <p class="text-sm text-gray-500">
                Menampilkan <span class="font-semibold text-gray-700">{{ $prestasis->total() }}</span> prestasi
            </p>
            <div class="flex items-center gap-2 text-xs text-gray-400">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                Terbaru
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach($prestasis as $item)
            @php
                $juaraEmoji = match($item->juara) {
                    '1'         => '🥇',
                    '2'         => '🥈',
                    '3'         => '🥉',
                    'harapan_1','harapan_2','harapan_3' => '🏅',
                    'finalis'   => '⭐',
                    default     => '🏆',
                };
                $juaraLabel = match($item->juara) {
                    '1'         => 'Juara 1',
                    '2'         => 'Juara 2',
                    '3'         => 'Juara 3',
                    'harapan_1' => 'Harapan 1',
                    'harapan_2' => 'Harapan 2',
                    'harapan_3' => 'Harapan 3',
                    'finalis'   => 'Finalis',
                    'peserta'   => 'Peserta Terbaik',
                    default     => ucfirst($item->juara),
                };
                $tingkatColor = match($item->tingkat) {
                    'internasional' => 'bg-purple-100 text-purple-700',
                    'nasional'      => 'bg-blue-100 text-blue-700',
                    'provinsi'      => 'bg-cyan-100 text-cyan-700',
                    'kabupaten'     => 'bg-emerald-100 text-emerald-700',
                    default         => 'bg-gray-100 text-gray-600',
                };
                $tingkatLabel = match($item->tingkat) {
                    'internasional' => 'Internasional',
                    'nasional'      => 'Nasional',
                    'provinsi'      => 'Provinsi',
                    'kabupaten'     => 'Kab/Kota',
                    default         => ucfirst($item->tingkat),
                };
            @endphp
            <a href="{{ route('page.prestasi-show', $item->slug) }}"
                class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">

                {{-- Foto --}}
                <div class="relative h-48 bg-gradient-to-br from-primary/10 via-green-50 to-yellow-50 overflow-hidden flex-shrink-0">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-5xl">{{ $juaraEmoji }}</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    {{-- Badges overlay --}}
                    <div class="absolute top-3 left-3">
                        <span class="text-[10px] font-bold uppercase tracking-wider {{ $tingkatColor }} px-2.5 py-1 rounded-full">
                            {{ $tingkatLabel }}
                        </span>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span class="text-[10px] font-bold text-white bg-yellow-500 px-2.5 py-1 rounded-full shadow">
                            {{ $juaraEmoji }} {{ $juaraLabel }}
                        </span>
                    </div>

                    {{-- View count --}}
                    <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-[10px] text-white bg-black/40 backdrop-blur px-2 py-1 rounded-full flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                            {{ $item->jumlah_dilihat }}
                        </span>
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-4 flex flex-col flex-1">
                    <h3 class="font-bold text-gray-900 text-sm leading-snug line-clamp-2 mb-2 group-hover:text-primary transition-colors">
                        {{ $item->judul }}
                    </h3>
                    <p class="text-xs text-gray-500 line-clamp-1 mb-auto">{{ $item->nama_lomba }}</p>

                    <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0zM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-800 truncate max-w-[110px]">{{ $item->nama_peserta }}</p>
                                @if($item->kelas)
                                <p class="text-[10px] text-gray-400">{{ $item->kelas }}</p>
                                @endif
                            </div>
                        </div>
                        <span class="text-[10px] text-gray-400 font-medium">
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M Y') }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $prestasis->withQueryString()->links() }}
        </div>

        @endif
    </div>
</section>

@endsection