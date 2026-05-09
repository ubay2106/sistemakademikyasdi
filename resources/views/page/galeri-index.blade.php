@extends('layout.main')

@section('title', 'Galeri Foto — Yayasan Darul Istiqlal')

@section('content')

    {{-- Hero Header --}}
    <section class="relative pt-36 pb-20 overflow-hidden"
        style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 40%, #1a6b3a 70%, #0d3d20 100%);">

        {{-- Radial glow --}}
        <div class="absolute inset-0 pointer-events-none"
            style="background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(34,197,94,0.1) 0%, transparent 60%),
                           radial-gradient(ellipse 40% 60% at 10% 80%, rgba(16,185,129,0.07) 0%, transparent 50%);">
        </div>

        {{-- Garis atas --}}
        <div class="absolute top-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #4ade80, #34d399, transparent);"></div>

        {{-- Dot pattern --}}
        <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
            style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 28px 28px;">
        </div>

        <div class="container relative mx-auto px-6">
            <div class="max-w-2xl mx-auto text-center">

                {{-- Breadcrumb --}}
                <nav class="flex items-center justify-center gap-2 text-xs text-white/50 mb-6">
                    <a href="/" class="hover:text-white/80 transition-colors">Beranda</a>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <span class="text-green-400">Galeri Foto</span>
                </nav>

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full border text-xs font-semibold tracking-widest uppercase"
                    style="background: rgba(74,222,128,0.12); border-color: rgba(74,222,128,0.3); color: #86efac;">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block animate-pulse"></span>
                    Dokumentasi Kegiatan
                </div>

                <h1 class="text-white text-4xl lg:text-5xl font-extrabold leading-tight mb-4">
                    Galeri <span class="text-green-400">Foto</span> Sekolah
                </h1>
                <p class="text-white/60 text-base leading-relaxed max-w-lg mx-auto">
                    Kumpulan momen berharga dari berbagai kegiatan, prestasi, dan kehidupan sehari-hari
                    di lingkungan Yayasan Darul Istiqlal.
                </p>

                {{-- Stat total foto --}}
                <div class="mt-8 inline-flex items-center gap-2 px-5 py-2.5 rounded-full"
                    style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);">
                    <svg class="w-4 h-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="text-white/70 text-sm font-medium">
                        <span class="text-white font-bold">{{ $galeris->total() }}</span> foto tersedia
                    </span>
                </div>
            </div>
        </div>

        {{-- Garis bawah --}}
        <div class="absolute bottom-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #16a34a, transparent);"></div>
    </section>

    {{-- Galeri Content --}}
    <section class="py-20 bg-white relative overflow-hidden">

        {{-- Dekoratif --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(30%, -30%)"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full opacity-[0.04]"
                style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(-30%, 30%)"></div>
        </div>

        <div class="container relative mx-auto px-6">

            @if ($galeris->isNotEmpty())

                {{-- Masonry-style Grid --}}
                <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-0" id="galeri-grid">
                    @foreach ($galeris as $index => $galeri)
                        <div class="galeri-card break-inside-avoid mb-4 group relative overflow-hidden rounded-2xl bg-gray-100 cursor-pointer block"
                            style="animation: fadeInUp .4s ease both; animation-delay: {{ ($index % 12) * 0.05 }}s;">

                            <img src="{{ asset('storage/' . $galeri->foto) }}"
                                alt="{{ $galeri->judul }}"
                                loading="{{ $index < 8 ? 'eager' : 'lazy' }}"
                                class="w-full h-auto block transition-transform duration-500 ease-out group-hover:scale-105">

                            {{-- Overlay --}}
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4"
                                style="background: linear-gradient(to top, rgba(10,46,26,.85) 0%, rgba(10,46,26,.3) 50%, transparent 100%);">

                                {{-- Judul --}}
                                <div class="w-full transform translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                                    <p class="text-white text-sm font-semibold leading-snug flex items-start gap-2">
                                        <span class="mt-0.5 w-5 h-5 rounded-full flex-shrink-0 flex items-center justify-center"
                                            style="background: rgba(74,222,128,0.3); border: 1px solid rgba(74,222,128,0.5);">
                                            <svg class="w-2.5 h-2.5 text-green-300" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                            </svg>
                                        </span>
                                        {{ $galeri->judul }}
                                    </p>
                                </div>

                                {{-- Nomor urut --}}
                                <div class="absolute top-3 right-3 w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold text-white"
                                    style="background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);">
                                    {{ $galeris->firstItem() + $index }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($galeris->hasPages())
                    <div class="mt-16 flex items-center justify-center gap-2">

                        {{-- Prev --}}
                        @if ($galeris->onFirstPage())
                            <span class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-300 cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </span>
                        @else
                            <a href="{{ $galeris->previousPageUrl() }}"
                                class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-500 hover:border-primary hover:text-primary hover:bg-primary/5 transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </a>
                        @endif

                        {{-- Page numbers --}}
                        @foreach ($galeris->getUrlRange(max(1, $galeris->currentPage() - 2), min($galeris->lastPage(), $galeris->currentPage() + 2)) as $page => $url)
                            @if ($page == $galeris->currentPage())
                                <span class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white text-sm font-bold">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-600 text-sm font-medium hover:border-primary hover:text-primary hover:bg-primary/5 transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($galeris->hasMorePages())
                            <a href="{{ $galeris->nextPageUrl() }}"
                                class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-500 hover:border-primary hover:text-primary hover:bg-primary/5 transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        @else
                            <span class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-300 cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </span>
                        @endif
                    </div>

                    {{-- Info halaman --}}
                    <p class="text-center text-xs text-gray-400 mt-4">
                        Menampilkan {{ $galeris->firstItem() }}–{{ $galeris->lastItem() }} dari {{ $galeris->total() }} foto
                    </p>
                @endif

            @else

                {{-- Empty state --}}
                <div class="text-center py-32">
                    <div class="w-24 h-24 rounded-3xl bg-primary/5 border border-primary/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-primary/25" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700 mb-2">Belum Ada Foto</h3>
                    <p class="text-sm text-gray-400">Foto galeri belum tersedia saat ini. Silakan cek kembali nanti.</p>
                    <a href="{{ route('page.home') }}"
                        class="mt-8 inline-flex items-center gap-2 bg-primary text-white font-semibold text-sm px-6 py-3 rounded-full hover:bg-primary/90 transition-all duration-300">
                        Kembali ke Beranda
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

            @endif
        </div>
    </section>

    {{-- Lightbox overlay --}}
    <div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center"
        style="background: rgba(10,30,18,0.96); backdrop-filter: blur(8px);">

        <button id="lb-close"
            class="absolute top-5 right-5 w-10 h-10 rounded-full flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition-colors z-10">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Prev --}}
        <button id="lb-prev"
            class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition-colors z-10">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        {{-- Next --}}
        <button id="lb-next"
            class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition-colors z-10">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <div class="flex flex-col items-center justify-center w-full h-full px-16 py-8">
            <img id="lb-img" src="" alt="" class="max-w-full max-h-[80vh] rounded-2xl object-contain shadow-2xl transition-opacity duration-200">
            <div class="mt-5 flex items-center gap-3">
                <span class="w-5 h-5 rounded-full flex-shrink-0 flex items-center justify-center"
                    style="background: rgba(74,222,128,0.3); border: 1px solid rgba(74,222,128,0.5);">
                    <svg class="w-2.5 h-2.5 text-green-300" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    </svg>
                </span>
                <p id="lb-title" class="text-white/90 text-sm font-semibold"></p>
            </div>
            <p id="lb-counter" class="text-white/30 text-xs mt-1.5"></p>
        </div>
    </div>

        <script>
            const cards = document.querySelectorAll('.galeri-card');
            const lightbox = document.getElementById('lightbox');
            const lbImg = document.getElementById('lb-img');
            const lbTitle = document.getElementById('lb-title');
            const lbCounter = document.getElementById('lb-counter');
            let current = 0;

            const items = Array.from(cards).map(card => ({
                src: card.querySelector('img').src,
                alt: card.querySelector('img').alt,
                title: card.querySelector('p')?.textContent?.trim() ?? ''
            }));

            function openLightbox(index) {
                current = index;
                showSlide(current);
                lightbox.classList.add('open');
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                lightbox.classList.remove('open');
                document.body.style.overflow = '';
            }

            function showSlide(index) {
                lbImg.style.opacity = '0';
                setTimeout(() => {
                    lbImg.src = items[index].src;
                    lbImg.alt = items[index].alt;
                    lbTitle.textContent = items[index].title;
                    lbCounter.textContent = (index + 1) + ' / ' + items.length;
                    lbImg.style.opacity = '1';
                }, 150);
            }

            cards.forEach((card, i) => {
                card.addEventListener('click', () => openLightbox(i));
            });

            document.getElementById('lb-close').addEventListener('click', closeLightbox);
            document.getElementById('lb-prev').addEventListener('click', () => {
                current = (current - 1 + items.length) % items.length;
                showSlide(current);
            });
            document.getElementById('lb-next').addEventListener('click', () => {
                current = (current + 1) % items.length;
                showSlide(current);
            });

            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) closeLightbox();
            });

            document.addEventListener('keydown', (e) => {
                if (!lightbox.classList.contains('open')) return;
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowLeft') { current = (current - 1 + items.length) % items.length; showSlide(current); }
                if (e.key === 'ArrowRight') { current = (current + 1) % items.length; showSlide(current); }
            });
        </script>

@endsection