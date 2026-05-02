@extends('layout.app')

@section('title', 'Profil Guru - ' . $guru->nama)

@push('styles')

@endpush

@section('content')
<div class="guru-show-page dot-grid">

    {{-- Hero / Header --}}
    <div class="relative pt-16 pb-10 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] rounded-full bg-[#4f8ef7]/5 blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 max-w-4xl">

            {{-- Back button --}}
            <div class="mb-8 fade-up">
                <a href="{{ url()->previous() }}" class="back-btn">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali
                </a>
            </div>

            {{-- Profile Card --}}
            <div class="glow-card p-8 sm:p-10 fade-up delay-100">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8">

                    {{-- Photo --}}
                    <div class="shrink-0">
                        <div class="photo-ring w-32 h-32">
                            <div class="photo-ring-inner w-full h-full">
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}"
                                        alt="{{ $guru->nama }}"
                                        class="w-full h-full rounded-full object-cover">
                                @else
                                    <div class="w-full h-full rounded-full bg-gradient-to-br from-[#1e3a5f] to-[#1e1b4b] flex items-center justify-center">
                                        <span class="text-4xl font-black text-[#4f8ef7] display-font">
                                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Identity --}}
                    <div class="flex-1 text-center sm:text-left">
                        <span class="glass-tag mb-3 inline-block">Tenaga Pendidik</span>
                        <h1 class="display-font text-2xl sm:text-3xl lg:text-4xl font-black text-white leading-tight mb-1">
                            {{ $guru->nama }}
                        </h1>
                        @if ($guru->nip)
                        <p class="font-mono text-sm text-[#4f8ef7]/70 mb-3">NIP: {{ $guru->nip }}</p>
                        @endif

                        <div class="flex flex-wrap gap-2 justify-center sm:justify-start mt-3">
                            @if ($guru->jenis_kelamin)
                            <span class="glass-tag {{ $guru->jenis_kelamin === 'L' ? '!text-blue-400 !border-blue-500/30 !bg-blue-500/10' : '!text-pink-400 !border-pink-500/30 !bg-pink-500/10' }}">
                                {{ $guru->jenis_kelamin === 'L' ? '♂ Laki-laki' : '♀ Perempuan' }}
                            </span>
                            @endif
                            @if ($guru->no_hp)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $guru->no_hp) }}" target="_blank"
                                class="glass-tag !text-green-400 !border-green-500/30 !bg-green-500/10 hover:!bg-green-500/20 transition-colors cursor-pointer">
                                💬 WhatsApp
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Detail Section --}}
    <div class="container mx-auto px-4 max-w-4xl pb-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            {{-- Left: Info Pribadi --}}
            <div class="md:col-span-2 space-y-5">

                {{-- Informasi Pribadi --}}
                <div class="glow-card p-6 fade-up delay-200">
                    <p class="section-label">✦ Informasi Pribadi</p>
                    <div class="space-y-3">

                        @if ($guru->tempat_lahir || $guru->tanggal_lahir)
                        <div class="stat-badge">
                            <div class="w-8 h-8 rounded-lg bg-[#4f8ef7]/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-[#4f8ef7]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-[#4f8ef7]/60 font-semibold uppercase tracking-wider mb-0.5">Tempat, Tgl Lahir</p>
                                <p class="text-sm text-white font-medium">
                                    {{ $guru->tempat_lahir ?? '-' }}
                                    @if ($guru->tanggal_lahir)
                                        , {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') }}
                                    @endif
                                </p>
                                @if ($guru->tanggal_lahir)
                                <p class="text-xs text-[#8b9ab5] mt-0.5">
                                    {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun
                                </p>
                                @endif
                            </div>
                        </div>
                        @endif

                        @if ($guru->no_hp)
                        <div class="stat-badge">
                            <div class="w-8 h-8 rounded-lg bg-[#4f8ef7]/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-[#4f8ef7]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 8V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-[#4f8ef7]/60 font-semibold uppercase tracking-wider mb-0.5">No. HP</p>
                                <p class="text-sm text-white font-medium">{{ $guru->no_hp }}</p>
                            </div>
                        </div>
                        @endif

                        @if ($guru->alamat)
                        <div class="stat-badge">
                            <div class="w-8 h-8 rounded-lg bg-[#4f8ef7]/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-[#4f8ef7]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-[#4f8ef7]/60 font-semibold uppercase tracking-wider mb-0.5">Alamat</p>
                                <p class="text-sm text-white font-medium leading-relaxed">{{ $guru->alamat }}</p>
                            </div>
                        </div>
                        @endif

                        @if (!$guru->tempat_lahir && !$guru->tanggal_lahir && !$guru->no_hp && !$guru->alamat)
                        <p class="text-[#8b9ab5] text-sm py-4 text-center">Data pribadi belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right sidebar --}}
            <div class="space-y-5">

                {{-- ID Card mini --}}
                <div class="glow-card p-5 fade-up delay-200 bg-gradient-to-br from-[#0f1e3a] to-[#111827]">
                    <p class="section-label">✦ ID Guru</p>
                    <div class="text-center py-3">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full overflow-hidden border-2 border-[#4f8ef7]/30">
                            @if ($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-[#1e3a5f] flex items-center justify-center">
                                    <span class="text-xl font-black text-[#4f8ef7]">{{ strtoupper(substr($guru->nama, 0, 1)) }}</span>
                                </div>
                            @endif
                        </div>
                        <p class="text-white font-semibold text-sm leading-snug">{{ $guru->nama }}</p>
                        @if ($guru->nip)
                        <p class="font-mono text-xs text-[#4f8ef7]/60 mt-1">{{ $guru->nip }}</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection