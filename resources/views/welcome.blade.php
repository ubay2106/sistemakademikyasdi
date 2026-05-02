@extends('layout.app')
@section('content')
    <section class="relative pt-36 pb-12 overflow-hidden"
        style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 40%, #1a6b3a 70%, #0d3d20 100%);">

        <div class="absolute inset-0 pointer-events-none"
            style="background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(34,197,94,0.1) 0%, transparent 60%),
                           radial-gradient(ellipse 40% 60% at 10% 80%, rgba(16,185,129,0.07) 0%, transparent 50%);">
        </div>

        <div class="absolute top-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #4ade80, #34d399, transparent);"></div>

        <div class="relative container mx-auto px-6">
            <div class="flex flex-wrap items-center justify-between gap-10">

                <div class="w-full flex justify-center lg:hidden mb-4">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="max-w-[150px]">
                </div>

                <div class="w-full lg:w-1/2 self-center px-6 lg:px-16">

                    <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full border text-xs font-medium tracking-widest uppercase"
                        style="background: rgba(74,222,128,0.12); border-color: rgba(74,222,128,0.3); color: #86efac;">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
                        Website Resmi
                    </div>

                    <h1 class="text-white text-3xl font-bold leading-tight lg:text-5xl mb-2">
                        YAYASAN<br>
                        <span class="text-green-400">DARUL ISTIQLAL</span>
                    </h1>
                    <h2 class="text-green-300 font-medium text-sm mb-5 lg:text-base">
                        Bilapora Rebba Kec. Lenteng Kab. Sumenep
                    </h2>
                    <p class="text-white/70 text-sm leading-relaxed mb-8 max-w-md">
                        Berkomitmen menghadirkan pendidikan yang holistik menggabungkan nilai-nilai
                        keimanan, akhlak mulia, kecerdasan intelektual, serta keterampilan hidup.
                        Kami percaya setiap anak memiliki potensi luar biasa yang perlu dibimbing
                        dengan penuh cinta dan keteladanan.
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="#berita"
                            class="px-5 py-2.5 rounded-lg bg-green-600 hover:bg-green-500 text-white text-sm font-semibold transition duration-300">
                            Lihat Berita
                        </a>
                        <a href="#visi-misi"
                            class="px-5 py-2.5 rounded-lg text-green-400 text-sm font-semibold border transition duration-300 hover:bg-green-400/10"
                            style="border-color: rgba(74,222,128,0.35);">
                            Visi &amp; Misi
                        </a>
                    </div>
                </div>

                <div class="hidden lg:flex w-1/3 justify-center items-center">
                    <div class="relative flex items-center justify-center">
                        <div class="absolute w-72 h-72 rounded-full" style="border: 1px solid rgba(74,222,128,0.08);"></div>
                        <div class="absolute w-60 h-60 rounded-full" style="border: 1px solid rgba(74,222,128,0.15);"></div>
                        <div class="w-52 h-52 rounded-full flex items-center justify-center"
                            style="background: rgba(74,222,128,0.07); border: 2px solid rgba(74,222,128,0.28);">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="max-w-[170px]">
                        </div>
                    </div>
                </div>

            </div>

            {{-- Stats bar --}}
            <div class="mt-14 pt-8 grid grid-cols-2 lg:grid-cols-4 gap-0"
                style="border-top: 1px solid rgba(255,255,255,0.1);">
                <div class="text-center px-4 py-2" style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">20+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Tahun Berdiri</p>
                </div>
                <div class="text-center px-4 py-2" style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">140+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Santri Aktif</p>
                </div>
                <div class="text-center px-4 py-2 border-t lg:border-t-0"
                    style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">50+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Tenaga Pendidik</p>
                </div>
                <div class="text-center px-4 py-2 border-t lg:border-t-0">
                    <p class="text-green-400 text-2xl font-bold">100%</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Lulusan Berprestasi</p>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #16a34a, transparent);"></div>
    </section>

    <section id="visi-misi" class="relative py-28 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('img/guruku.jpg') }}" alt="Background" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/80"></div>
        </div>

        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-green-400 to-transparent"></div>

        <div class="relative container mx-auto px-6">

            <div class="text-center mb-16">
                <span class="inline-block text-green-400 text-sm font-semibold tracking-widest uppercase mb-3">Yayasan Darul
                    Istiqlal</span>
                <h2 class="text-4xl lg:text-5xl font-bold text-white">Visi & Misi</h2>
                <div class="mt-4 mx-auto w-20 h-1 bg-green-400 rounded-full"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 max-w-5xl mx-auto">

                <div
                    class="flex-1 group relative bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 hover:bg-white/15 transition duration-300">
                    <div
                        class="w-14 h-14 mb-6 rounded-xl bg-green-400/20 border border-green-400/40 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 text-green-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>

                    <h3 class="text-green-300 text-xl font-bold uppercase tracking-wider mb-4">Visi</h3>
                    <div class="w-10 h-0.5 bg-green-400/50 mb-5"></div>

                    <p class="text-white/90 text-base leading-relaxed">
                        Terciptanya anak didik yang
                        <span class="font-bold text-green-300">bertaqwa</span>,
                        <span class="font-bold text-green-300">berakhlakul karimah</span>,
                        <span class="font-bold text-green-300">cerdas</span>, dan
                        <span class="font-bold text-green-300">terampil</span>.
                    </p>
                </div>

                <div class="hidden lg:flex flex-col items-center gap-2 py-8">
                    <div class="w-0.5 flex-1 bg-white/20"></div>
                    <div class="w-2 h-2 rounded-full bg-green-400"></div>
                    <div class="w-0.5 flex-1 bg-white/20"></div>
                </div>
                <div class="lg:hidden h-0.5 bg-white/20 mx-8"></div>

                <div
                    class="flex-1 group relative bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 hover:bg-white/15 transition duration-300">
                    <div
                        class="w-14 h-14 mb-6 rounded-xl bg-green-400/20 border border-green-400/40 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 text-green-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                    </div>

                    <h3 class="text-green-300 text-xl font-bold uppercase tracking-wider mb-4">Misi</h3>
                    <div class="w-10 h-0.5 bg-primary/50 mb-5"></div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-white/90 text-base leading-relaxed">
                            <span class="mt-1.5 flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                            Melaksanakan pembelajaran aktif, kreatif, efektif, dan menyenangkan (PAKEM).
                        </li>
                        <li class="flex items-start gap-3 text-white/90 text-base leading-relaxed">
                            <span class="mt-1.5 flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                            Memberikan bimbingan dan pembinaan untuk mengembangkan potensi serta kreativitas anak didik.
                        </li>
                        <li class="flex items-start gap-3 text-white/90 text-base leading-relaxed">
                            <span class="mt-1.5 flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                            Meningkatkan penghayatan dan pengamalan nilai-nilai agama, moral, dan budaya.
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-primary to-transparent">
        </div>
    </section>

    <section id="berita" class="pt-36 pb-32 relative overflow-hidden">

        {{-- Background dekoratif --}}
        <div class="absolute inset-0 -z-10">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, var(--color-primary, #16a34a) 0%, transparent 70%); transform: translate(30%, -30%)">
            </div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, var(--color-primary, #16a34a) 0%, transparent 70%); transform: translate(-30%, 30%)">
            </div>
        </div>

        <div class="container">

            {{-- Header --}}
            <div class="max-w-2xl text-center mx-auto mb-16">
                <span
                    class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase text-primary border border-primary/30 bg-primary/5 px-4 py-1.5 rounded-full mb-5">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    Berita Terkini
                </span>
                <h2 class="text-2xl lg:text-4xl font-bold text-gray-800 leading-snug mb-4">
                    Berbagai Informasi Menarik<br>
                    <span class="text-primary">Seputar Sekolah Kami</span>
                </h2>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Pendidikan, Inovasi, dan Perkembangan Terbaru — langsung dari sumber terpercaya.
                </p>
            </div>

            @if ($beritas->isNotEmpty())
                {{-- Featured + Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12">

                    {{-- Card Featured (berita pertama) --}}
                    @php $featured = $beritas->first(); @endphp
                    <div class="lg:col-span-6">
                        <a href="{{ route('page.berita-show', $featured->slug) }}"
                            class="group block rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 bg-white h-full">
                            <div class="relative overflow-hidden aspect-[16/10]">
                                @if ($featured->gambar_utama)
                                    <img src="{{ asset('storage/' . $featured->gambar_utama) }}"
                                        alt="{{ $featured->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-primary/20 to-primary/5 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-primary/30" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </div>
                                @endif

                                {{-- Overlay gradient --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent">
                                </div>

                                {{-- Badge kategori --}}
                                @if ($featured->kategori)
                                    <span
                                        class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                                        {{ $featured->kategori->nama }}
                                    </span>
                                @endif
                                @if ($featured->is_featured)
                                    <span
                                        class="absolute top-4 right-4 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                        Unggulan
                                    </span>
                                @endif

                                {{-- Tanggal di sudut bawah gambar --}}
                                <div class="absolute bottom-4 left-4 text-white">
                                    <p class="text-xs opacity-80">
                                        {{ optional($featured->published_at)->format('d M Y') ?? $featured->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3
                                    class="text-lg font-bold text-gray-800 leading-snug mb-3 group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $featured->judul }}
                                </h3>
                                <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 mb-4">
                                    {{ $featured->ringkasan ?? Str::limit(strip_tags($featured->isi), 120) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-primary/10 flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-400">{{ $featured->user->name ?? 'Admin' }}</span>
                                    </div>
                                    <span
                                        class="text-xs font-semibold text-primary flex items-center gap-1 group-hover:gap-2 transition-all">
                                        Baca Selengkapnya
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Grid 4 berita sisanya --}}
                    <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($beritas->skip(1)->take(4) as $berita)
                            <a href="{{ route('berita.show', $berita->slug) }}"
                                class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col">
                                <div class="relative overflow-hidden aspect-video">
                                    @if ($berita->gambar_utama)
                                        <img src="{{ asset('storage/' . $berita->gambar_utama) }}"
                                            alt="{{ $berita->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-50 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                    @if ($berita->kategori)
                                        <span
                                            class="absolute top-2 left-2 bg-white/90 text-primary text-xs font-bold px-2 py-0.5 rounded-full">
                                            {{ $berita->kategori->nama }}
                                        </span>
                                    @endif
                                    @if ($featured->is_featured)
                                        <span
                                            class="absolute top-4 right-4 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                            </svg>
                                            Unggulan
                                        </span>
                                    @endif
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <h4
                                        class="text-sm font-bold text-gray-800 leading-snug line-clamp-2 mb-2 group-hover:text-primary transition-colors flex-1">
                                        {{ $berita->judul }}
                                    </h4>
                                    <div class="flex items-center justify-between mt-2">
                                        <p class="text-xs text-gray-400">
                                            {{ optional($berita->published_at)->format('d M Y') ?? $berita->created_at->format('d M Y') }}
                                        </p>
                                        <span
                                            class="text-xs text-primary font-semibold flex items-center gap-0.5 group-hover:gap-1.5 transition-all">
                                            Baca
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                {{-- State Kosong --}}
                <div class="text-center py-20">
                    <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                    </div>
                    <p class="text-gray-400 font-medium">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endif

            {{-- Tombol Lihat Semua --}}
            <div class="text-center">
                <a href="{{ route('page.berita-index') }}"
                    class="inline-flex items-center gap-2 bg-primary text-white font-semibold text-sm px-7 py-3 rounded-full hover:bg-primary/90 hover:gap-3 transition-all duration-300 shadow-lg shadow-primary/20">
                    Lihat Semua Berita
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <section class="pt-36 pb-32 bg-cover bg-no-repeat" style="background-image: url('{{ asset('img/bg2.jpeg') }}')">
        <div class="container">
            <div class="max-w-full text-center">
                <p
                    class="text-xs sm:text-sm text-white max-w-36 border border-white uppercase font-sans px-2 py-1 mx-auto rounded-full mb-2 -mt-10">
                    GURU KAMI</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-sans text-white mb-12 sm:mb-16 tracking-wider">
                    Tenaga pendidik profesional di sekolah kami</h2>
            </div>
            <div class="swiper max-w-full mx-auto px-3 py-3">
                <div class="swiper-wrapper mb-7">
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum, dolor sit amet consectetur adipisicing
                                    elit. Cum earum magni, corporis harum expedita quod eligendi exercitationem iste.</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Sekretaris</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit. Similique corrupti numquam facere sed recusandae modi eum itaque?</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Ketua</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Illo quaerat necessitatibus corrupti voluptatem ipsa consectetur dignis.</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Bendahara</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Animi reiciendis voluptatem dolores, quam nobis impedit commodi deserunt</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Humas</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section id="prestasi" class="py-28 bg-white relative overflow-hidden">

        {{-- Decorative background --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-72 h-72 bg-primary/5 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400/5 rounded-full translate-x-1/3 translate-y-1/3">
            </div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-px bg-gradient-to-r from-transparent via-gray-100 to-transparent">
            </div>
        </div>

        <div class="container relative">

            {{-- Header --}}
            <div class="max-w-2xl mx-auto text-center mb-16">
                <span
                    class="inline-flex items-center gap-2 text-xs font-bold tracking-[0.2em] uppercase text-primary bg-primary/10 px-4 py-2 rounded-full mb-5">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5Z" />
                    </svg>
                    Prestasi Siswa
                </span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                    Bakat yang <span class="text-primary">Bersinar</span>,<br>Prestasi yang Menginspirasi
                </h2>
                <p class="text-gray-500 text-base">Karya dan pencapaian luar biasa dari generasi terbaik kami di berbagai
                    bidang kompetisi.</p>
            </div>

            {{-- Grid Prestasi --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
                @foreach ($prestasis as $item)
                    <a href="{{ route('page.prestasi-show', $item->slug) }}"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">

                        {{-- Badge Tingkat --}}
                        <div class="absolute top-3 left-3 z-10">
                            @php
                                $tingkatColor = match ($item->tingkat) {
                                    'internasional' => 'bg-purple-600',
                                    'nasional' => 'bg-blue-600',
                                    'provinsi' => 'bg-cyan-600',
                                    'kabupaten' => 'bg-emerald-600',
                                    default => 'bg-gray-600',
                                };
                                $tingkatLabel = match ($item->tingkat) {
                                    'internasional' => 'Internasional',
                                    'nasional' => 'Nasional',
                                    'provinsi' => 'Provinsi',
                                    'kabupaten' => 'Kab/Kota',
                                    default => ucfirst($item->tingkat),
                                };
                            @endphp
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-white {{ $tingkatColor }} px-2.5 py-1 rounded-full shadow-sm">
                                {{ $tingkatLabel }}
                            </span>
                        </div>

                        {{-- Foto --}}
                        <div class="relative h-44 bg-gradient-to-br from-primary/10 to-primary/5 overflow-hidden">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-primary/20" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5Z" />
                                    </svg>
                                </div>
                            @endif
                            {{-- Overlay gradient --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </div>

                        {{-- Juara Badge --}}
                        <div class="absolute top-36 right-3 z-10">
                            @php
                                $juaraLabel = match ($item->juara) {
                                    'Juara 1' => 'Juara 1',
                                    'Juara 2' => 'Juara 2',
                                    'Juara 3' => 'Juara 3',
                                    'Harapan 1' => 'Harapan 1',
                                    'Harapan 2' => 'Harapan 2',
                                    'Harapan 3' => 'Harapan 3',
                                    'Finalis' => 'Finalis',
                                    'Peserta Terbaik' => 'Peserta Terbaik',
                                    default => '🏆 ' . ucfirst($item->juara),
                                };
                            @endphp
                            <span class="text-[10px] font-bold text-white bg-yellow-500 px-2.5 py-1 rounded-full shadow">
                                {{ $juaraLabel }}
                            </span>
                        </div>

                        {{-- Content --}}
                        <div class="p-4">
                            <h3
                                class="font-bold text-gray-900 text-sm leading-snug line-clamp-2 mb-2 group-hover:text-primary transition-colors">
                                {{ $item->judul }}
                            </h3>
                            <p class="text-xs text-gray-500 line-clamp-1 mb-3">{{ $item->nama_lomba }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0" />
                                        </svg>
                                    </div>
                                    <span
                                        class="text-xs text-gray-600 font-medium truncate max-w-[100px]">{{ $item->nama_peserta }}</span>
                                </div>
                                <span
                                    class="text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($item->tanggal)->format('Y') }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="text-center">
                <a href="{{ route('page.prestasi-index') }}"
                    class="inline-flex items-center gap-2 bg-primary text-white font-semibold text-sm px-7 py-3 rounded-full hover:bg-primary/90 hover:shadow-lg hover:shadow-primary/20 hover:-translate-y-0.5 transition-all duration-300">
                    Lihat Semua Prestasi
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection
