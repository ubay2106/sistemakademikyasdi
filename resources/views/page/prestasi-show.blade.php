@extends('layout.main')

@section('title', $prestasi->meta_title ?? $prestasi->judul)
@section('meta_description', $prestasi->meta_description ?? $prestasi->deskripsi)

@section('content')

{{-- Breadcrumb --}}
<div class="bg-primary/20 border-b border-gray-100 pt-28 pb-4">
    <div class="container">
        <nav class="flex items-center gap-2 text-xs text-gray-400">
            <a href="{{ url('/') }}" class="hover:text-primary transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
            <a href="{{ route('page.prestasi-index') }}" class="hover:text-primary transition">Prestasi</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
            <span class="text-gray-600 truncate max-w-xs">{{ $prestasi->judul }}</span>
        </nav>
    </div>
</div>

@php
    $juaraEmoji = match($prestasi->juara) {
        '1'         => '🥇',
        '2'         => '🥈',
        '3'         => '🥉',
        'harapan_1','harapan_2','harapan_3' => '🏅',
        'finalis'   => '⭐',
        default     => '🏆',
    };
    $juaraLabel = match($prestasi->juara) {
        '1'         => 'Juara 1',
        '2'         => 'Juara 2',
        '3'         => 'Juara 3',
        'harapan_1' => 'Juara Harapan 1',
        'harapan_2' => 'Juara Harapan 2',
        'harapan_3' => 'Juara Harapan 3',
        'finalis'   => 'Finalis',
        'peserta'   => 'Peserta Terbaik',
        default     => ucfirst($prestasi->juara),
    };
    $tingkatLabel = match($prestasi->tingkat) {
        'internasional' => 'Internasional',
        'nasional'      => 'Nasional',
        'provinsi'      => 'Provinsi',
        'kabupaten'     => 'Kabupaten/Kota',
        'kecamatan'     => 'Kecamatan',
        default         => ucfirst($prestasi->tingkat),
    };
    $tingkatGradient = match($prestasi->tingkat) {
        'internasional' => 'from-purple-600 to-purple-800',
        'nasional'      => 'from-blue-600 to-blue-800',
        'provinsi'      => 'from-cyan-600 to-cyan-800',
        'kabupaten'     => 'from-emerald-600 to-emerald-800',
        default         => 'from-primary to-green-800',
    };
@endphp

<div class="bg-gray-50 min-h-screen pb-20">
    <div class="container py-10">
        <div class="max-w-4xl mx-auto">

            {{-- Hero Card --}}
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 mb-6">

                {{-- Foto / Banner --}}
                <div class="relative h-72 lg:h-96 bg-gradient-to-br {{ $tingkatGradient }} overflow-hidden">
                    @if($prestasi->foto)
                        <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->judul }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <span class="text-9xl block mb-4">{{ $juaraEmoji }}</span>
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    @endif

                    {{-- Overlay Content --}}
                    <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-8">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-white bg-white/20 backdrop-blur border border-white/30 px-3 py-1.5 rounded-full">
                                {{ $tingkatLabel }}
                            </span>
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-white bg-yellow-500 px-3 py-1.5 rounded-full shadow">
                                {{ $juaraEmoji }} {{ $juaraLabel }}
                            </span>
                            @if($prestasi->is_featured)
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-yellow-300 bg-yellow-400/20 border border-yellow-400/30 px-3 py-1.5 rounded-full">
                                ✨ Unggulan
                            </span>
                            @endif
                        </div>
                        <h1 class="text-2xl lg:text-3xl font-extrabold text-white leading-tight">
                            {{ $prestasi->judul }}
                        </h1>
                    </div>
                </div>

                {{-- Meta info strip --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-gray-100 border-b border-gray-100">
                    <div class="px-5 py-4 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-gray-400 font-medium mb-1">Lomba</p>
                        <p class="text-sm font-bold text-gray-800 truncate">{{ $prestasi->nama_lomba }}</p>
                    </div>
                    @if($prestasi->penyelenggara)
                    <div class="px-5 py-4 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-gray-400 font-medium mb-1">Penyelenggara</p>
                        <p class="text-sm font-bold text-gray-800 truncate">{{ $prestasi->penyelenggara }}</p>
                    </div>
                    @endif
                    <div class="px-5 py-4 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-gray-400 font-medium mb-1">Tanggal</p>
                        <p class="text-sm font-bold text-gray-800">{{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="px-5 py-4 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-gray-400 font-medium mb-1">Dilihat</p>
                        <p class="text-sm font-bold text-gray-800">{{ number_format($prestasi->jumlah_dilihat) }}×</p>
                    </div>
                </div>

                {{-- Body --}}
                <div class="p-6 lg:p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

                    {{-- Deskripsi --}}
                    <div class="lg:col-span-2">
                        @if($prestasi->deskripsi)
                        <h2 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                            <span class="w-1 h-5 bg-primary rounded-full inline-block"></span>
                            Tentang Prestasi Ini
                        </h2>
                        <div class="prose prose-sm prose-gray max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($prestasi->deskripsi)) !!}
                        </div>
                        @else
                        <div class="text-center py-10 text-gray-300">
                            <svg class="w-10 h-10 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                            <p class="text-sm">Tidak ada deskripsi.</p>
                        </div>
                        @endif
                    </div>

                    {{-- Info Peserta --}}
                    <div class="lg:col-span-1">
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl border border-gray-100 p-5">
                            <h2 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                                Profil Peserta
                            </h2>

                            <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100">
                                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0zM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 text-sm">{{ $prestasi->nama_peserta }}</p>
                                    @if($prestasi->kelas)
                                    <p class="text-xs text-gray-500">Kelas {{ $prestasi->kelas }}</p>
                                    @endif
                                </div>
                            </div>

                            @if($prestasi->nis_nip)
                            <div class="flex items-center justify-between py-2">
                                <span class="text-xs text-gray-500">NIS/NIP</span>
                                <span class="text-xs font-semibold text-gray-800">{{ $prestasi->nis_nip }}</span>
                            </div>
                            @endif

                            <div class="flex items-center justify-between py-2">
                                <span class="text-xs text-gray-500">Penghargaan</span>
                                <span class="text-xs font-bold text-yellow-600">{{ $juaraLabel }}</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-xs text-gray-500">Tingkat</span>
                                <span class="text-xs font-semibold text-gray-800">{{ $tingkatLabel }}</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-xs text-gray-500">Tahun</span>
                                <span class="text-xs font-semibold text-gray-800">{{ \Carbon\Carbon::parse($prestasi->tanggal)->format('Y') }}</span>
                            </div>
                        </div>

                        {{-- Share --}}
                        <div class="mt-4 p-4 bg-white rounded-2xl border border-gray-100">
                            <p class="text-xs font-bold text-gray-600 mb-3">Bagikan</p>
                            <div class="flex items-center gap-2">
                                <a href="https://wa.me/?text={{ urlencode($prestasi->judul . ' - ' . url()->current()) }}" target="_blank"
                                    class="flex-1 flex items-center justify-center gap-1.5 text-xs font-medium text-green-700 bg-green-50 hover:bg-green-100 px-3 py-2 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.556 4.119 1.527 5.845L.057 23.99l6.305-1.654A11.954 11.954 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.71 9.71 0 0 1-4.948-1.352l-.355-.211-3.683.966.983-3.595-.232-.369A9.711 9.711 0 0 1 2.25 12C2.25 6.615 6.615 2.25 12 2.25S21.75 6.615 21.75 12 17.385 21.75 12 21.75z"/></svg>
                                    WhatsApp
                                </a>
                                <button onclick="navigator.clipboard.writeText(window.location.href).then(()=>alert('Link disalin!'))"
                                    class="flex-1 flex items-center justify-center gap-1.5 text-xs font-medium text-gray-600 bg-gray-50 hover:bg-gray-100 px-3 py-2 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/></svg>
                                    Salin Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigasi --}}
            <div class="flex items-center justify-between gap-4">
                <a href="{{ route('page.prestasi-index') }}"
                    class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-primary bg-white border border-gray-200 hover:border-primary/30 px-5 py-2.5 rounded-xl transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
                    Kembali ke Semua Prestasi
                </a>
            </div>



        </div>
    </div>
</div>

@endsection