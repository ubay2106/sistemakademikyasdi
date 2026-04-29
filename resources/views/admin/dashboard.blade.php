{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.layout.app')

@section('content')
    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        {{-- Berita --}}
        <div
            class="fade-up delay-1 bg-white rounded-2xl p-5 border border-gray-100 hover:shadow-lg transition duration-300 group">
            <div class="flex items-start justify-between mb-4">
                <div
                    class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition">
                    <svg class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                </div>
                <span class="text-xs text-green-600 bg-green-50 font-semibold px-2 py-1 rounded-full"> bulan ini</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mb-1">50</p>
            <p class="text-sm text-gray-400 font-medium">Total Berita</p>
            <div class="mt-4 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-blue-400 rounded-full" style="width: {{ min(($totalBerita ?? 0) * 5, 100) }}%"></div>
            </div>
        </div>

        {{-- Prestasi --}}
        <div
            class="fade-up delay-2 bg-white rounded-2xl p-5 border border-gray-100 hover:shadow-lg transition duration-300 group">
            <div class="flex items-start justify-between mb-4">
                <div
                    class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition">
                    <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                </div>
                <span class="text-xs text-amber-600 bg-amber-50 font-semibold px-2 py-1 rounded-full">Aktif</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mb-1">80</p>
            <p class="text-sm text-gray-400 font-medium">Total Prestasi</p>
            <div class="mt-4 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-amber-400 rounded-full" style="width: {{ min(($totalPrestasi ?? 0) * 8, 100) }}%">
                </div>
            </div>
        </div>

        {{-- Galeri --}}
        <div
            class="fade-up delay-3 bg-white rounded-2xl p-5 border border-gray-100 hover:shadow-lg transition duration-300 group">
            <div class="flex items-start justify-between mb-4">
                <div
                    class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center group-hover:bg-purple-100 transition">
                    <svg class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
                <span class="text-xs text-purple-600 bg-purple-50 font-semibold px-2 py-1 rounded-full">Foto</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mb-1">{{ $totalGaleri ?? 0 }}</p>
            <p class="text-sm text-gray-400 font-medium">Total Galeri</p>
            <div class="mt-4 h-1 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-purple-400 rounded-full" style="width: {{ min(($totalGaleri ?? 0) * 3, 100) }}%">
                </div>
            </div>
        </div>

        {{-- Pengunjung / Info --}}
        <div
            class="fade-up delay-4 bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-5 border border-gray-700 hover:shadow-lg transition duration-300 group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-green-400/10 rounded-full -mr-8 -mt-8"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-green-400/5 rounded-full -ml-6 -mb-6"></div>
            <div class="relative">
                <div class="w-12 h-12 rounded-xl bg-green-400/20 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253M3 12c0 .778.099 1.533.284 2.253" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white mb-1">3</p>
                <p class="text-sm text-white/50 font-medium">Unit Pendidikan</p>
                <div class="mt-4 flex gap-1">
                    <span class="text-[10px] bg-green-400/20 text-green-400 px-2 py-0.5 rounded-full font-medium">RA</span>
                    <span class="text-[10px] bg-green-400/20 text-green-400 px-2 py-0.5 rounded-full font-medium">MI</span>
                    <span class="text-[10px] bg-green-400/20 text-green-400 px-2 py-0.5 rounded-full font-medium">MTs</span>
                </div>
            </div>
        </div>

    </div>

    {{-- Bottom Section --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

        {{-- Berita Terbaru --}}
        <div class="xl:col-span-2 fade-up delay-1 bg-white rounded-2xl border border-gray-100">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h3 class="font-bold text-gray-800">Berita Terbaru</h3>
                <a href="" class="text-xs text-primary font-semibold hover:underline">Lihat Semua →</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($beritaTerbaru ?? [] as $berita)
                    <div class="flex items-start gap-4 px-6 py-4 hover:bg-gray-50 transition">
                        <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">Judul</p>
                            <p class="text-gray-400 text-xs mt-0.5 line-clamp-2">pppppppp</p>
                            <p class="text-gray-300 text-[10px] mt-1.5">tgl</p>
                        </div>
                        <a href="{{ route('admin.berita.edit', $berita) }}"
                            class="flex-shrink-0 text-gray-300 hover:text-primary transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                        </div>
                        <p class="text-gray-400 text-sm">Belum ada berita</p>
                        <a href="" class="inline-block mt-3 text-xs text-primary font-semibold hover:underline">+
                            Tambah Berita</a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="fade-up delay-2 space-y-5">

            {{-- Quick Actions --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <h3 class="font-bold text-gray-800 mb-4">Aksi Cepat</h3>
                <div class="space-y-2">
                    <a href="" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 transition group">
                        <div
                            class="w-9 h-9 rounded-lg bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center transition">
                            <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-blue-600 transition">Tambah
                            Berita</span>
                    </a>
                    <a href="" class="flex items-center gap-3 p-3 rounded-xl hover:bg-amber-50 transition group">
                        <div
                            class="w-9 h-9 rounded-lg bg-amber-50 group-hover:bg-amber-100 flex items-center justify-center transition">
                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-amber-600 transition">Tambah
                            Prestasi</span>
                    </a>
                    <a href="" class="flex items-center gap-3 p-3 rounded-xl hover:bg-purple-50 transition group">
                        <div
                            class="w-9 h-9 rounded-lg bg-purple-50 group-hover:bg-purple-100 flex items-center justify-center transition">
                            <svg class="w-4 h-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-purple-600 transition">Tambah
                            Galeri</span>
                    </a>
                </div>
            </div>

            {{-- Info Yayasan --}}
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-5 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-green-400/10 rounded-full -mr-6 -mt-6"></div>
                <img src="{{ asset('img/logo.png') }}" alt="Logo"
                    class="relative w-12 h-12 object-contain mb-3 bg-white rounded-full p-1">
                <h4 class="text-white font-bold text-sm mb-1">Yayasan Darul Istiqlal</h4>
                <p class="text-white/40 text-xs leading-relaxed">Bilapora Rebba, Kec. Lenteng, Kab. Sumenep</p>
                <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between">
                    <span class="text-white/30 text-[10px]">3 Unit Pendidikan</span>
                    <a href="{{ url('/') }}" target="_blank"
                        class="text-green-400 text-[10px] font-semibold hover:text-green-300 transition">Kunjungi →</a>
                </div>
            </div>

        </div>
    </div>
@endsection
