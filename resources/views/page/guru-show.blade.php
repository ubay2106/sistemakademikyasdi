@extends('layout.main')

@section('title', 'Profil Guru - ' . $guru->nama)

@section('content')

    {{-- Hero Section --}}
    <section class="relative pt-36 pb-20 overflow-hidden"
        style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 40%, #1a6b3a 70%, #0d3d20 100%);">

        {{-- Decorative radial glows --}}
        <div class="absolute inset-0 pointer-events-none"
            style="background:
                radial-gradient(ellipse 60% 80% at 80% 50%, rgba(34,197,94,0.1) 0%, transparent 60%),
                radial-gradient(ellipse 40% 60% at 10% 80%, rgba(16,185,129,0.07) 0%, transparent 50%);">
        </div>

        {{-- Top accent line --}}
        <div class="absolute top-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #4ade80, #34d399, transparent);"></div>

        <div class="relative container mx-auto px-6 max-w-4xl">

            {{-- Back Button --}}
            <div class="mb-10">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 text-green-300 text-sm font-medium hover:text-white transition-colors duration-200 group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>

            {{-- Profile Hero Card --}}
            <div class="relative bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 sm:p-10 overflow-hidden">

                {{-- Inner decorative glow --}}
                <div class="absolute -top-10 -right-10 w-48 h-48 rounded-full pointer-events-none"
                    style="background: radial-gradient(circle, rgba(74,222,128,0.12) 0%, transparent 70%);"></div>

                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8 relative">

                    {{-- Photo --}}
                    <div class="shrink-0">
                        <div class="relative">
                            {{-- Outer glow rings --}}
                            <div class="absolute inset-0 rounded-full"
                                style="box-shadow: 0 0 0 3px rgba(74,222,128,0.25), 0 0 0 8px rgba(74,222,128,0.08); border-radius: 9999px;">
                            </div>
                            <div class="w-32 h-32 rounded-full overflow-hidden border-2"
                                style="border-color: rgba(74,222,128,0.5);">
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"
                                        style="background: rgba(74,222,128,0.15);">
                                        <span class="text-4xl font-black text-green-300">
                                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Identity --}}
                    <div class="flex-1 text-center sm:text-left">
                        <div class="inline-flex items-center gap-2 mb-4 px-4 py-1.5 rounded-full border text-xs font-semibold tracking-widest uppercase"
                            style="background: rgba(74,222,128,0.12); border-color: rgba(74,222,128,0.3); color: #86efac;">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
                            Tenaga Pendidik
                        </div>

                        <h1 class="text-white text-2xl sm:text-3xl lg:text-4xl font-black leading-tight mb-1">
                            {{ $guru->nama }}
                        </h1>

                        @if ($guru->nip)
                            <p class="font-mono text-sm mb-4" style="color: rgba(134,239,172,0.6);">
                                NIP: {{ $guru->nip }}
                            </p>
                        @endif

                        <div class="flex flex-wrap gap-2 justify-center sm:justify-start mt-4">
                            @if ($guru->jenis_kelamin)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border
                                    {{ $guru->jenis_kelamin === 'L'
                                        ? 'bg-blue-500/10 border-blue-500/30 text-blue-300'
                                        : 'bg-pink-500/10 border-pink-500/30 text-pink-300' }}">
                                    {{ $guru->jenis_kelamin === 'L' ? '♂ Laki-laki' : '♀ Perempuan' }}
                                </span>
                            @endif

                            @if ($guru->no_hp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $guru->no_hp) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border transition-colors duration-200"
                                    style="background: rgba(34,197,94,0.12); border-color: rgba(34,197,94,0.35); color: #86efac;"
                                    onmouseover="this.style.background='rgba(34,197,94,0.22)'"
                                    onmouseout="this.style.background='rgba(34,197,94,0.12)'">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                        <path
                                            d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.122 1.533 5.855L0 24l6.335-1.509A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.028-1.38l-.36-.214-3.732.889.924-3.618-.236-.374A9.818 9.818 0 1112 21.818z" />
                                    </svg>
                                    Hubungi via WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom accent line --}}
        <div class="absolute bottom-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #16a34a, transparent);"></div>
    </section>

    {{-- Detail Section --}}
    <section class="py-20 relative overflow-hidden" style="background: #f0fdf4;">

        {{-- Subtle decorative bg --}}
        <div class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(30%, -30%)">
            </div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(-30%, 30%)">
            </div>
        </div>

        <div class="container mx-auto px-6 max-w-4xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Left: Informasi Pribadi --}}
                <div class="md:col-span-2 space-y-6">

                    <div class="bg-white rounded-2xl border border-green-100 shadow-sm overflow-hidden">
                        {{-- Card header --}}
                        <div class="px-6 py-4 flex items-center gap-3"
                            style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 100%);">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                style="background: rgba(74,222,128,0.2); border: 1px solid rgba(74,222,128,0.3);">
                                <svg class="w-4 h-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                            <h3 class="text-green-300 text-sm font-bold uppercase tracking-widest">Informasi Pribadi</h3>
                        </div>

                        <div class="p-6 space-y-4">

                            @if ($guru->tempat_lahir || $guru->tanggal_lahir)
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border border-green-100">
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0"
                                        style="background: #0f4a28;">
                                        <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-green-700 mb-0.5">
                                            Tempat, Tgl. Lahir</p>
                                        <p class="text-sm font-semibold text-gray-800">
                                            {{ $guru->tempat_lahir ?? '-' }}
                                            @if ($guru->tanggal_lahir)
                                                , {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') }}
                                            @endif
                                        </p>
                                        @if ($guru->tanggal_lahir)
                                            <p class="text-xs text-gray-400 mt-0.5">
                                                {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun</p>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if ($guru->no_hp)
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border border-green-100">
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0"
                                        style="background: #0f4a28;">
                                        <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 8V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-green-700 mb-0.5">
                                            Nomor HP</p>
                                        <p class="text-sm font-semibold text-gray-800">{{ $guru->no_hp }}</p>
                                    </div>
                                </div>
                            @endif

                            @if ($guru->alamat)
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border border-green-100">
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0"
                                        style="background: #0f4a28;">
                                        <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-green-700 mb-0.5">
                                            Alamat</p>
                                        <p class="text-sm font-semibold text-gray-800 leading-relaxed">
                                            {{ $guru->alamat }}</p>
                                    </div>
                                </div>
                            @endif

                            @if (!$guru->tempat_lahir && !$guru->tanggal_lahir && !$guru->no_hp && !$guru->alamat)
                                <div class="py-10 text-center">
                                    <svg class="w-10 h-10 text-green-200 mx-auto mb-3" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0" />
                                    </svg>
                                    <p class="text-gray-400 text-sm">Data pribadi belum tersedia.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Right: ID Card --}}
                <div class="space-y-6">

                    {{-- Mini ID Card --}}
                    <div class="rounded-2xl overflow-hidden shadow-lg"
                        style="background: linear-gradient(145deg, #0a2e1a 0%, #0f4a28 60%, #1a6b3a 100%);">
                        {{-- Card top bar --}}
                        <div class="h-1" style="background: linear-gradient(90deg, #4ade80, #34d399, #4ade80);"></div>

                        <div class="p-6 text-center">
                            <p class="text-xs tracking-[0.25em] uppercase font-bold mb-5"
                                style="color: rgba(134,239,172,0.7);">
                                ✦ Kartu Guru ✦
                            </p>

                            <div class="w-20 h-20 mx-auto mb-4 rounded-full overflow-hidden"
                                style="border: 2px solid rgba(74,222,128,0.5); box-shadow: 0 0 0 4px rgba(74,222,128,0.1);">
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"
                                        style="background: rgba(74,222,128,0.15);">
                                        <span class="text-2xl font-black text-green-300">
                                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <h4 class="text-white font-bold text-sm leading-snug mb-1">{{ $guru->nama }}</h4>

                            @if ($guru->nip)
                                <p class="font-mono text-xs mb-4" style="color: rgba(134,239,172,0.55);">
                                    {{ $guru->nip }}
                                </p>
                            @endif

                            <div class="h-px my-4" style="background: rgba(255,255,255,0.1);"></div>

                            <div class="flex items-center justify-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                <span class="text-xs font-semibold text-green-300 uppercase tracking-wider">
                                    Yayasan Darul Istiqlal
                                </span>
                            </div>
                        </div>

                        <div class="h-1" style="background: linear-gradient(90deg, transparent, #16a34a, transparent);"></div>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="bg-white rounded-2xl border border-green-100 shadow-sm overflow-hidden">
                        <div class="px-5 py-4"
                            style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 100%);">
                            <h3 class="text-green-300 text-xs font-bold uppercase tracking-widest">Info Singkat</h3>
                        </div>
                        <div class="divide-y divide-green-50">
                            <div class="flex items-center justify-between px-5 py-3">
                                <span class="text-xs text-gray-500 font-medium">Status</span>
                                <span class="text-xs font-bold text-green-700 bg-green-100 px-2.5 py-1 rounded-full">
                                    Aktif
                                </span>
                            </div>
                            @if ($guru->jenis_kelamin)
                                <div class="flex items-center justify-between px-5 py-3">
                                    <span class="text-xs text-gray-500 font-medium">Jenis Kelamin</span>
                                    <span class="text-xs font-semibold text-gray-700">
                                        {{ $guru->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </div>
                            @endif
                            @if ($guru->tanggal_lahir)
                                <div class="flex items-center justify-between px-5 py-3">
                                    <span class="text-xs text-gray-500 font-medium">Usia</span>
                                    <span class="text-xs font-semibold text-gray-700">
                                        {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun
                                    </span>
                                </div>
                            @endif
                            <div class="flex items-center justify-between px-5 py-3">
                                <span class="text-xs text-gray-500 font-medium">Instansi</span>
                                <span class="text-xs font-semibold text-gray-700">Darul Istiqlal</span>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp CTA --}}
                    @if ($guru->no_hp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $guru->no_hp) }}" target="_blank"
                            class="flex items-center justify-center gap-2.5 w-full py-3 rounded-xl font-semibold text-sm text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg"
                            style="background: linear-gradient(135deg, #0f4a28, #16a34a); box-shadow: 0 4px 15px rgba(22,163,74,0.25);">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.122 1.533 5.855L0 24l6.335-1.509A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.028-1.38l-.36-.214-3.732.889.924-3.618-.236-.374A9.818 9.818 0 1112 21.818z" />
                            </svg>
                            Hubungi via WhatsApp
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection