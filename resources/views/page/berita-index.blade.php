@extends('layout.app')

@section('content')

{{-- Hero Section --}}
<div class="pt-32 pb-16 bg-gradient-to-b from-primary/20 to-transparent relative overflow-hidden">
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full opacity-[0.05]"
            style="background: radial-gradient(circle, #16a34a 0%, transparent 70%); transform: translate(30%, -30%)"></div>
    </div>
    <div class="container text-center">
        <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase text-primary border border-primary/30 bg-primary/5 px-4 py-1.5 rounded-full mb-5">
            <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
            Berita & Informasi
        </span>
        <h1 class="text-3xl lg:text-5xl font-bold text-gray-800 mb-4">Semua Berita</h1>
        <p class="text-gray-500 max-w-md mx-auto text-sm leading-relaxed">
            Temukan berbagai informasi terkini seputar kegiatan, prestasi, dan perkembangan sekolah kami.
        </p>
    </div>
</div>

<div class="container pb-32">

    @if(isset($kategoris) && $kategoris->count())
    <div class="flex items-center gap-2 flex-wrap mb-10">
        <a href="{{ route('page.berita-index') }}"
            class="text-xs font-semibold px-4 py-2 rounded-full transition
            {{ !request('kategori') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Semua
        </a>
        @foreach($kategoris as $kat)
        <a href="{{ route('page.berita-index', ['kategori' => $kat->slug]) }}"
            class="text-xs font-semibold px-4 py-2 rounded-full transition
            {{ request('kategori') === $kat->slug ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            {{ $kat->nama }}
        </a>
        @endforeach
    </div>
    @endif

    {{-- Grid Berita --}}
    @if($beritas->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @foreach($beritas as $berita)
        <a href="{{ route('page.berita-show', $berita->slug) }}"
            class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-400 flex flex-col border border-gray-100">

            {{-- Gambar --}}
            <div class="relative overflow-hidden aspect-video">
                @if($berita->gambar_utama)
                    <img src="{{ asset('storage/' . $berita->gambar_utama) }}"
                        alt="{{ $berita->judul }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-600">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-primary/10 to-gray-50 flex items-center justify-center">
                        <svg class="w-10 h-10 text-primary/20" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>

                @if($berita->kategori)
                <span class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                    {{ $berita->kategori->nama }}
                </span>
                @endif
                @if($berita->is_featured)
                <span class="absolute top-3 right-3 bg-amber-400 text-white text-xs font-bold px-2 py-1 rounded-full">
                    ★ Unggulan
                </span>
                @endif
            </div>

            {{-- Konten --}}
            <div class="p-5 flex flex-col flex-1">
                <div class="flex items-center gap-2 mb-3">
                    <span class="text-xs text-gray-400">
                        {{ optional($berita->published_at)->format('d M Y') ?? $berita->created_at->format('d M Y') }}
                    </span>
                    @if($berita->tags->count())
                    <span class="text-gray-200">•</span>
                    @foreach($berita->tags->take(2) as $tag)
                    <span class="text-xs text-primary/70 font-medium">#{{ $tag->nama }}</span>
                    @endforeach
                    @endif
                </div>

                <h3 class="text-base font-bold text-gray-800 leading-snug line-clamp-2 mb-2 group-hover:text-primary transition-colors flex-1">
                    {{ $berita->judul }}
                </h3>
                <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">
                    {{ $berita->ringkasan ?? Str::limit(strip_tags($berita->isi), 100) }}
                </p>

                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                    <div class="flex items-center gap-1.5">
                        <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="w-3 h-3 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <span class="text-xs text-gray-400">{{ $berita->user->name ?? 'Admin' }}</span>
                    </div>
                    <span class="text-xs font-bold text-primary flex items-center gap-1 group-hover:gap-2 transition-all">
                        Baca
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if($beritas->hasPages())
    <div class="flex justify-center">
        {{ $beritas->links() }}
    </div>
    @endif

    @else
    <div class="text-center py-24">
        <div class="w-24 h-24 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-5">
            <svg class="w-12 h-12 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5M6 7.5h3v3H6v-3Z" />
            </svg>
        </div>
        <p class="text-gray-400 font-semibold text-lg mb-1">Belum ada berita</p>
        <p class="text-gray-300 text-sm">Coba pilih kategori lain atau kunjungi kembali nanti.</p>
    </div>
    @endif

</div>

@endsection