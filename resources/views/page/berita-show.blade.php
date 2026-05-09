@extends('layout.main')

@section('title', $berita->meta_title ?? $berita->judul)
@section('meta_description', $berita->meta_description ?? $berita->ringkasan)

@section('content')

{{-- Hero Gambar --}}
<div class="relative pt-24 bg-gradient-to-b from-primary/20 to-transparent overflow-hidden">
    @if($berita->gambar_utama)
    <div class="relative h-[380px] lg:h-[500px] overflow-hidden">
        <img src="{{ asset('storage/' . $berita->gambar_utama) }}"
            alt="{{ $berita->judul }}"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/10"></div>

        {{-- Konten di atas gambar --}}
        <div class="absolute bottom-0 left-0 right-0 px-6 pb-8 lg:px-0 lg:pb-12">
            <div class="max-w-4xl mx-auto">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    @if($berita->kategori)
                    <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ $berita->kategori->nama }}
                    </span>
                    @endif
                    @if($berita->is_featured)
                    <span class="bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>
                        </svg>
                        Unggulan
                    </span>
                    @endif
                    @foreach($berita->tags as $tag)
                    <span class="bg-white/20 text-white text-xs font-medium px-3 py-1 rounded-full backdrop-blur-sm">
                        #{{ $tag->nama }}
                    </span>
                    @endforeach
                </div>
                <h1 class="text-2xl lg:text-4xl font-bold text-white leading-snug">
                    {{ $berita->judul }}
                </h1>
            </div>
        </div>
    </div>

    @if($berita->caption_gambar)
    <p class="text-xs text-gray-400 text-center py-2 italic bg-gray-50">{{ $berita->caption_gambar }}</p>
    @endif

    @else
    {{-- Fallback tanpa gambar --}}
    <div class="bg-gradient-to-b from-primary/8 to-transparent pb-10 pt-8 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-wrap items-center gap-2 mb-4">
                @if($berita->kategori)
                <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                    {{ $berita->kategori->nama }}
                </span>
                @endif
                @foreach($berita->tags as $tag)
                <span class="bg-primary/10 text-primary text-xs font-medium px-3 py-1 rounded-full">
                    #{{ $tag->nama }}
                </span>
                @endforeach
            </div>
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-800 leading-snug">
                {{ $berita->judul }}
            </h1>
        </div>
    </div>
    @endif
</div>

{{-- Konten Utama --}}
<div class="container pb-32">
    <div class="max-w-4xl mx-auto">

        {{-- Meta info + Share --}}
        <div class="flex flex-wrap items-center justify-between gap-4 py-5 border-b border-gray-100 mb-8">

            {{-- Kiri: penulis, tanggal, dilihat --}}
            <div class="flex flex-wrap items-center gap-4">

                {{-- Penulis --}}
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 leading-none">Penulis</p>
                        <p class="text-sm font-semibold text-gray-700 leading-tight mt-0.5">{{ $berita->user->name ?? 'Admin' }}</p>
                    </div>
                </div>

                <div class="w-px h-8 bg-gray-200 hidden sm:block"></div>

                {{-- Tanggal --}}
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 leading-none">Diterbitkan</p>
                        <p class="text-sm font-semibold text-gray-700 leading-tight mt-0.5">
                            {{ optional($berita->published_at)->isoFormat('D MMMM Y') ?? $berita->created_at->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                </div>

                <div class="w-px h-8 bg-gray-200 hidden sm:block"></div>

                {{-- Jumlah Dilihat --}}
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 leading-none">Dilihat</p>
                        <p class="text-sm font-semibold text-gray-700 leading-tight mt-0.5">
                            {{ number_format($berita->jumlah_dilihat) }}x
                        </p>
                    </div>
                </div>
            </div>

            {{-- Kanan: Tombol kembali --}}
            <a href="{{ route('page.berita-index') }}"
                class="flex items-center gap-1.5 text-sm text-gray-500 hover:text-primary transition font-medium">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>
        </div>

        {{-- Ringkasan --}}
        @if($berita->ringkasan)
        <div class="bg-primary/5 border-l-4 border-primary rounded-r-2xl px-6 py-4 mb-8">
            <p class="text-sm text-gray-700 leading-relaxed italic font-medium">{{ $berita->ringkasan }}</p>
        </div>
        @endif
        @php
            $isiHtml   = $berita->isi;
            $isHtml    = $isiHtml !== strip_tags($isiHtml); // true jika mengandung tag HTML
        @endphp

        <article class="mb-10">
            @if($isHtml)
                {{-- Konten dari rich text editor (TinyMCE, Quill, dll) --}}
                <div class="
                    prose prose-sm lg:prose-base max-w-none
                    prose-headings:font-bold prose-headings:text-gray-800 prose-headings:mt-8 prose-headings:mb-3
                    prose-p:text-gray-600 prose-p:leading-[1.9] prose-p:my-5
                    prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-a:font-medium
                    prose-img:rounded-2xl prose-img:shadow-md prose-img:my-6
                    prose-blockquote:border-l-4 prose-blockquote:border-primary prose-blockquote:bg-primary/5
                    prose-blockquote:rounded-r-xl prose-blockquote:not-italic prose-blockquote:py-1
                    prose-strong:text-gray-800 prose-strong:font-bold
                    prose-ul:my-4 prose-li:text-gray-600 prose-li:leading-relaxed
                    prose-ol:my-4
                    prose-hr:border-gray-100
                ">
                    {!! $isiHtml !!}
                </div>
            @else
                {{-- Konten plain text — pecah per baris kosong menjadi paragraf --}}
                @php
                    // Pisahkan berdasarkan baris kosong (double newline) → paragraf
                    $paragraphs = preg_split('/\n{2,}/', trim($isiHtml));
                @endphp
                <div class="space-y-5">
                    @foreach($paragraphs as $paragraph)
                        @if(trim($paragraph) !== '')
                        <p class="text-gray-600 leading-[1.9] text-base">
                            {{-- nl2br untuk baris tunggal di dalam satu paragraf --}}
                            {!! nl2br(e(trim($paragraph))) !!}
                        </p>
                        @endif
                    @endforeach
                </div>
            @endif
        </article>

        {{-- Tags --}}
        @if($berita->tags->count())
        <div class="flex flex-wrap items-center gap-2 pt-6 border-t border-gray-100 mb-8">
            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tags:</span>
            @foreach($berita->tags as $tag)
            <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1.5 rounded-full hover:bg-primary/10 hover:text-primary transition cursor-default">
                #{{ $tag->nama }}
            </span>
            @endforeach
        </div>
        @endif

        {{-- ============================================================
             SHARE BOX
        ============================================================ --}}
        <div class="bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-2xl p-6 mb-10">
            <p class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                </svg>
                Bagikan Berita Ini
            </p>

            <div class="flex flex-wrap gap-3">

                {{-- Share WhatsApp --}}
                @php
                    $shareUrl    = url()->current();
                    $shareText   = 'Baca berita: *' . $berita->judul . "*\n" . $shareUrl;
                    $waUrl       = 'https://wa.me/?text=' . rawurlencode($shareText);
                @endphp
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-2 bg-[#25D366] hover:bg-[#20bc5a] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-[#25D366]/30">
                    {{-- WhatsApp Icon --}}
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                    </svg>
                    WhatsApp
                </a>

                {{-- Salin Link --}}
                <button onclick="salinLink()"
                    id="btn-salin"
                    class="flex items-center gap-2 bg-white border border-gray-200 hover:border-primary text-gray-600 hover:text-primary text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg id="icon-salin" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                    <span id="teks-salin">Salin Link</span>
                </button>

                {{-- URL Box --}}
                <div class="flex-1 min-w-48 flex items-center gap-2 bg-gray-100 rounded-xl px-4 py-2.5 overflow-hidden">
                    <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253" />
                    </svg>
                    <span id="url-display" class="text-xs text-gray-500 truncate font-mono select-all">{{ url()->current() }}</span>
                </div>

            </div>

            {{-- Toast notif salin --}}
            <div id="toast-salin"
                class="hidden mt-3 items-center gap-2 text-xs text-green-700 bg-green-50 border border-green-200 px-4 py-2.5 rounded-xl w-fit">
                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Link berhasil disalin ke clipboard!
            </div>
        </div>

        {{-- Berita Terkait --}}
        @if(isset($beritaTerkait) && $beritaTerkait->isNotEmpty())
        <div class="pt-8 border-t border-gray-100">
            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                <span class="w-1 h-5 bg-primary rounded-full inline-block"></span>
                Berita Terkait
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($beritaTerkait as $terkait)
                <a href="{{ route('berita.show', $terkait->slug) }}"
                    class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col">
                    <div class="relative overflow-hidden aspect-video">
                        @if($terkait->gambar_utama)
                            <img src="{{ asset('storage/' . $terkait->gambar_utama) }}"
                                alt="{{ $terkait->judul }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-50 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-4 flex-1 flex flex-col">
                        <h4 class="text-sm font-bold text-gray-700 line-clamp-2 mb-2 group-hover:text-primary transition-colors flex-1">
                            {{ $terkait->judul }}
                        </h4>
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-400">
                                {{ optional($terkait->published_at)->isoFormat('D MMM Y') ?? $terkait->created_at->isoFormat('D MMM Y') }}
                            </p>
                            @if(isset($terkait->jumlah_dilihat))
                            <span class="flex items-center gap-1 text-xs text-gray-400">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                {{ number_format($terkait->jumlah_dilihat) }}
                            </span>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
function salinLink() {
    const url = '{{ url()->current() }}';

    // Gunakan Clipboard API modern jika tersedia
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url).then(() => tampilkanNotif());
    } else {
        // Fallback untuk browser lama / non-HTTPS
        const el = document.createElement('textarea');
        el.value = url;
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        tampilkanNotif();
    }
}

function tampilkanNotif() {
    // Ganti ikon dan teks tombol
    const btnSalin  = document.getElementById('btn-salin');
    const ikonSalin = document.getElementById('icon-salin');
    const teksSalin = document.getElementById('teks-salin');
    const toast     = document.getElementById('toast-salin');

    teksSalin.textContent = 'Tersalin!';
    btnSalin.classList.add('border-green-400', 'text-green-600');
    ikonSalin.innerHTML   = `<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />`;

    // Tampilkan toast
    toast.classList.remove('hidden');
    toast.classList.add('flex');

    // Reset setelah 3 detik
    setTimeout(() => {
        teksSalin.textContent = 'Salin Link';
        btnSalin.classList.remove('border-green-400', 'text-green-600');
        ikonSalin.innerHTML   = `<path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />`;
        toast.classList.add('hidden');
        toast.classList.remove('flex');
    }, 3000);
}
</script>
@endpush

@endsection