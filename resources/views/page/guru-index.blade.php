@extends('layout.main')

@section('title', 'Tenaga Pendidik - Yayasan Darul Istiqlal')

@section('content')

    {{-- Hero Section --}}
    <section class="relative pt-36 pb-16 overflow-hidden"
        style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 40%, #1a6b3a 70%, #0d3d20 100%);">

        <div class="absolute inset-0 pointer-events-none"
            style="background:
                radial-gradient(ellipse 60% 80% at 80% 50%, rgba(34,197,94,0.1) 0%, transparent 60%),
                radial-gradient(ellipse 40% 60% at 10% 80%, rgba(16,185,129,0.07) 0%, transparent 50%);">
        </div>

        <div class="absolute top-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #4ade80, #34d399, transparent);"></div>

        <div class="relative container mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full border text-xs font-medium tracking-widest uppercase"
                style="background: rgba(74,222,128,0.12); border-color: rgba(74,222,128,0.3); color: #86efac;">
                <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
                Yayasan Darul Istiqlal
            </div>
            <h1 class="text-white text-3xl lg:text-5xl font-black leading-tight mb-3">
                Tenaga <span class="text-green-400">Pendidik</span>
            </h1>
            <p class="text-white/60 text-sm lg:text-base max-w-xl mx-auto leading-relaxed">
                Didedikasikan untuk mencerdaskan generasi bangsa dengan pengalaman dan keahlian terbaik.
            </p>

            {{-- Stats bar --}}
            <div class="mt-12 pt-8 max-w-2xl mx-auto grid grid-cols-2 gap-0"
                style="border-top: 1px solid rgba(255,255,255,0.1);">
                <div class="text-center px-4 py-2" style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">{{ $gurus->total() }}</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Total Guru</p>
                </div>
                <div class="text-center px-4 py-2">
                    <p class="text-green-400 text-2xl font-bold">100%</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Berdedikasi</p>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #16a34a, transparent);"></div>
    </section>

    {{-- Grid Section --}}
    <section class="py-24 relative overflow-hidden" style="background: #f0fdf4;">

        <div class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(30%, -30%)">
            </div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(-30%, 30%)">
            </div>
        </div>

        <div class="container mx-auto px-6">

            @if ($gurus->isNotEmpty())

                {{-- Grid Guru --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 mb-14">
                    @foreach ($gurus as $guru)
                        <a href="{{ route('page.guru-show', $guru->id) }}"
                            class="group relative flex flex-col bg-white rounded-2xl overflow-hidden shadow-sm border border-green-100 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">

                            {{-- Top accent --}}
                            <div class="h-1 w-full scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500"
                                style="background: linear-gradient(90deg, #4ade80, #16a34a);"></div>

                            {{-- Photo --}}
                            <div class="relative pt-7 pb-3 flex flex-col items-center px-4">
                                <div class="relative">
                                    <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-green-100 group-hover:border-green-400 transition-colors duration-300 shadow-md">
                                        @if ($guru->foto)
                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center"
                                                style="background: linear-gradient(135deg, #0a2e1a, #1a6b3a);">
                                                <span class="text-2xl font-black text-green-300">
                                                    {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Gender dot --}}
                                    @if ($guru->jenis_kelamin)
                                        <span class="absolute bottom-0 right-0 w-5 h-5 rounded-full border-2 border-white flex items-center justify-center text-[9px]
                                            {{ $guru->jenis_kelamin === 'L' ? 'bg-blue-500' : 'bg-pink-500' }}">
                                            {{ $guru->jenis_kelamin === 'L' ? '♂' : '♀' }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="px-4 pb-5 text-center flex flex-col flex-1">
                                <h3 class="text-sm font-bold text-gray-800 leading-snug line-clamp-2 mb-1 group-hover:text-green-700 transition-colors">
                                    {{ $guru->nama }}
                                </h3>

                                @if ($guru->nip)
                                    <p class="font-mono text-[10px] text-gray-400 mb-3">{{ $guru->nip }}</p>
                                @else
                                    <p class="text-[10px] text-gray-300 mb-3">—</p>
                                @endif

                                <div class="mt-auto">
                                    <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-green-700 group-hover:gap-1.5 transition-all">
                                        Lihat Profil
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                        </a>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($gurus->hasPages())
                    <div class="flex justify-center">
                        <nav class="inline-flex items-center gap-1">
                            {{-- Previous --}}
                            @if ($gurus->onFirstPage())
                                <span class="px-3 py-2 rounded-lg text-xs text-gray-300 bg-white border border-gray-100 cursor-not-allowed">
                                    &lsaquo;
                                </span>
                            @else
                                <a href="{{ $gurus->previousPageUrl() }}"
                                    class="px-3 py-2 rounded-lg text-xs font-semibold text-green-700 bg-white border border-green-200 hover:bg-green-50 transition-colors">
                                    &lsaquo;
                                </a>
                            @endif

                            {{-- Pages --}}
                            @foreach ($gurus->getUrlRange(1, $gurus->lastPage()) as $page => $url)
                                @if ($page == $gurus->currentPage())
                                    <span class="px-3.5 py-2 rounded-lg text-xs font-bold text-white"
                                        style="background: linear-gradient(135deg, #0f4a28, #16a34a);">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3.5 py-2 rounded-lg text-xs font-semibold text-gray-600 bg-white border border-gray-100 hover:bg-green-50 hover:text-green-700 hover:border-green-200 transition-colors">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if ($gurus->hasMorePages())
                                <a href="{{ $gurus->nextPageUrl() }}"
                                    class="px-3 py-2 rounded-lg text-xs font-semibold text-green-700 bg-white border border-green-200 hover:bg-green-50 transition-colors">
                                    &rsaquo;
                                </a>
                            @else
                                <span class="px-3 py-2 rounded-lg text-xs text-gray-300 bg-white border border-gray-100 cursor-not-allowed">
                                    &rsaquo;
                                </span>
                            @endif
                        </nav>
                    </div>
                @endif

            @else
                {{-- Empty State --}}
                <div class="text-center py-24">
                    <div class="w-20 h-20 mx-auto mb-5 rounded-3xl flex items-center justify-center"
                        style="background: linear-gradient(135deg, #0a2e1a, #1a6b3a);">
                        <svg class="w-10 h-10 text-green-300" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium text-sm">Belum ada data guru yang tersedia.</p>
                </div>
            @endif

        </div>
    </section>

@endsection