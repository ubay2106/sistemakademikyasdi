@extends('layout.app')

@section('title', 'Kelola Galeri')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Galeri</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola foto dan dokumentasi kegiatan sekolah.</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}"
            class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary/90 transition-colors shadow-sm shadow-primary/20">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Foto
        </a>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Grid Galeri --}}
    @if ($galeris->isNotEmpty())
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($galeris as $galeri)
                <div class="group relative bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                    {{-- Foto --}}
                    <div class="relative aspect-square overflow-hidden bg-gray-50">
                        @if ($galeri->foto)
                            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </div>
                        @endif

                        {{-- Overlay actions --}}
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                class="w-9 h-9 bg-white rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition-colors text-gray-600"
                                title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST"
                                onsubmit="return confirm('Hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-9 h-9 bg-white rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors text-gray-600"
                                    title="Hapus">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="px-3 py-2.5">
                        <p class="text-xs font-semibold text-gray-700 line-clamp-1">{{ $galeri->judul }}</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">{{ $galeri->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if ($galeris->hasPages())
            <div class="flex justify-between items-center pt-4">
                <p class="text-xs text-gray-400">
                    Menampilkan {{ $galeris->firstItem() }}-{{ $galeris->lastItem() }} dari {{ $galeris->total() }} foto
                </p>
                <div class="flex items-center gap-1">
                    @if ($galeris->onFirstPage())
                        <span class="px-3 py-1.5 rounded-lg text-xs text-gray-300 bg-white border border-gray-100 cursor-not-allowed">&lsaquo;</span>
                    @else
                        <a href="{{ $galeris->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-primary bg-white border border-primary/30 hover:bg-primary/5 transition-colors">&lsaquo;</a>
                    @endif
                    @foreach ($galeris->getUrlRange(1, $galeris->lastPage()) as $page => $url)
                        @if ($page == $galeris->currentPage())
                            <span class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-white bg-primary">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3.5 py-1.5 rounded-lg text-xs font-semibold text-gray-600 bg-white border border-gray-100 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($galeris->hasMorePages())
                        <a href="{{ $galeris->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-primary bg-white border border-primary/30 hover:bg-primary/5 transition-colors">&rsaquo;</a>
                    @else
                        <span class="px-3 py-1.5 rounded-lg text-xs text-gray-300 bg-white border border-gray-100 cursor-not-allowed">&rsaquo;</span>
                    @endif
                </div>
            </div>
        @endif

    @else
        <div class="bg-white rounded-2xl border border-gray-100 py-20 text-center">
            <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
            <p class="text-gray-400 font-medium text-sm mb-4">Belum ada foto di galeri.</p>
            <a href="{{ route('admin.galeri.create') }}"
                class="inline-flex items-center gap-1.5 text-xs font-semibold text-white bg-primary px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Foto Pertama
            </a>
        </div>
    @endif

</div>
@endsection