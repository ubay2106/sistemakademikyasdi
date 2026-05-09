<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan Darul Istiqlal</title>
    <link rel="icon" type="image" href="{{ asset('img/logo.png') }}" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <div id="overlay" class="overlay fixed inset-0 bg-black/50 z-20 hidden lg:hidden"></div>

    <div class="flex min-h-screen">

        <aside id="sidebar"
            class="fixed top-0 left-0 h-full w-64 bg-gray-900 z-30 flex flex-col -translate-x-full lg:translate-x-0">
            @if(auth()->user()->role === 'guru')
                @php $guru = auth()->user()->guru; @endphp
                <div class="flex flex-col items-center py-6 px-6 border-b border-white/10">
                    <div class="relative mb-3">
                        <div class="absolute inset-0 bg-green-400/20 rounded-full blur-md"></div>
                        <img src="{{ asset('img/logo.png') }}" alt="Logo"
                            class="relative size-14 rounded-full ring-2 ring-green-400/40 object-contain bg-white p-1">
                    </div>
                    <p class="text-white/50 text-xs font-medium tracking-widest uppercase">Yayasan</p>
                    <h2 class="text-white font-bold text-sm text-center leading-tight">Darul Istiqlal</h2>
                    <span class="mt-2 text-xs bg-blue-400/20 text-blue-400 px-3 py-0.5 rounded-full font-medium">
                        Portal Guru
                    </span>
                </div>

            @else
                {{-- ── HEADER ADMIN ── --}}
                <div class="flex flex-col items-center py-8 px-6 border-b border-white/10">
                    <div class="relative mb-3">
                        <div class="absolute inset-0 bg-green-400/20 rounded-full blur-md"></div>
                        <img src="{{ asset('img/logo.png') }}" alt="Logo"
                            class="relative size-14 rounded-full ring-2 ring-green-400/40 object-contain bg-white p-1">
                    </div>
                    <p class="text-white/50 text-xs font-medium tracking-widest uppercase">Yayasan</p>
                    <h2 class="text-white font-bold text-base text-center leading-tight">Darul Istiqlal</h2>
                    <span class="mt-2 text-xs bg-green-400/20 text-green-400 px-3 py-0.5 rounded-full font-medium">
                        Admin Panel
                    </span>
                </div>
            @endif
            <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">

                @if(auth()->user()->role === 'guru')

                    <p class="text-white/30 text-[10px] uppercase tracking-widest font-semibold px-4 mb-3">Menu</p>

                    {{-- Dashboard Guru --}}
                    <a href="{{ route('guru.dashboard') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('guru.dashboard') ? 'active text-white' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                        </div>
                        <span class="font-medium text-sm">Dashboard</span>
                    </a>

                    <p class="text-white/30 text-[10px] uppercase tracking-widest font-semibold px-4 pt-3 pb-2">Akademik</p>

                    {{-- Input Nilai --}}
                    <div x-data="{ open: {{ request()->routeIs('guru.nilai*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('guru.nilai*') ? 'active text-white' : '' }}">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>
                            <span class="font-medium text-sm">Nilai</span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200" :class="open ? 'rotate-90' : ''"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="mt-1 ml-4 space-y-0.5">
                            <a href="{{ route('guru.nilai.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('guru.nilai.index') ? 'text-blue-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Input Nilai
                            </a>
                            <a href="{{ route('guru.nilai.rekap') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('guru.nilai.create') ? 'text-blue-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Rekap Nilai
                            </a>
                        </div>
                    </div>

                    <p class="text-white/30 text-[10px] uppercase tracking-widest font-semibold px-4 pt-3 pb-2">Akun</p>

                    {{-- Profil --}}
                    <a href="{{ route('guru.profile.edit') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('guru.profil') ? 'active text-white' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <span class="font-medium text-sm">Profil Saya</span>
                    </a>

                @else

                    <p class="text-white/30 text-[10px] uppercase tracking-widest font-semibold px-4 mb-3">Menu Utama</p>

                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'active text-white' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                        </div>
                        <span class="font-medium text-sm">Dashboard</span>
                    </a>

                    {{-- Data Master --}}
                    <div x-data="{ open: {{ request()->routeIs('guru.index') || request()->routeIs('siswa.*') || request()->routeIs('kelas.*') || request()->routeIs('matapelajaran.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('guru.index') || request()->routeIs('siswa.*') || request()->routeIs('kelas.*') || request()->routeIs('matapelajaran.*') ? 'active text-white' : '' }}">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5M3.75 9h16.5M3.75 12.75h16.5M3.75 16.5h16.5M3.75 20.25h16.5" />
                                </svg>
                            </div>
                            <span class="font-medium text-sm">Data Master</span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200" :class="open ? 'rotate-90' : ''"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5">
                            <a href="{{ route('admin.guru.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('guru.index') || request()->routeIs('guru.create') || request()->routeIs('guru.edit') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Data Guru
                            </a>
                            <a href="{{ route('admin.siswa.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('siswa.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Data Siswa
                            </a>
                            <a href="{{ route('admin.kelas.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('kelas.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Data Kelas
                            </a>
                            <a href="{{ route('admin.matapelajaran.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('matapelajaran.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Mata Pelajaran
                            </a>
                        </div>
                    </div>

                    {{-- Akademik --}}
                    <div x-data="{ open: {{ request()->routeIs('tahunajaran.*') || request()->routeIs('semester.*') || request()->routeIs('siswakelas.*') || request()->routeIs('pengajar.*') || request()->routeIs('nilai.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('tahunajaran.*') || request()->routeIs('semester.*') || request()->routeIs('siswakelas.*') || request()->routeIs('pengajar.*') || request()->routeIs('nilai.*') ? 'active text-white' : '' }}">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25A8.967 8.967 0 0118 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <span class="font-medium text-sm">Akademik</span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200" :class="open ? 'rotate-90' : ''"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5">
                            <a href="{{ route('admin.tahunajaran.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('tahunajaran.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Tahun Ajaran
                            </a>
                            <a href="{{ route('admin.semester.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('semester.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Semester
                            </a>
                            <a href="{{ route('admin.siswakelas.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('siswakelas.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Siswa Kelas
                            </a>
                            <a href="{{ route('admin.pengajar.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('pengajar.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Pengajar
                            </a>
                            <a href="{{ route('admin.nilai.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('nilai.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Nilai Siswa
                            </a>
                        </div>
                    </div>

                    {{-- Berita --}}
                    <div x-data="{ open: {{ request()->routeIs('berita.*') || request()->routeIs('kategori.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('berita.*') || request()->routeIs('kategori.*') ? 'active text-white' : '' }}">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>
                            </div>
                            <span class="font-medium text-sm">Berita</span>
                            <svg class="w-4 h-4 ml-auto transition-transform duration-200" :class="open ? 'rotate-90' : ''"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5">
                            <a href="{{ route('admin.berita.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('berita.*') && !request()->routeIs('kategori.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Data Berita
                            </a>
                            <a href="{{ route('admin.kategori.index') }}"
                                class="flex items-center gap-2.5 pl-9 pr-4 py-2 rounded-lg text-sm text-white/60 hover:text-white transition duration-200 {{ request()->routeIs('kategori.*') ? 'text-green-400' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0"></span>
                                Kategori
                            </a>
                        </div>
                    </div>

                    {{-- Prestasi --}}
                    <a href="{{ route('admin.prestasi.index') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('prestasi.*') ? 'active text-white' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                            </svg>
                        </div>
                        <span class="font-medium text-sm">Prestasi</span>
                    </a>

                    {{-- Galeri --}}
                    <a href="{{ route('admin.galeri.index') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-white/70 hover:text-white transition duration-200 {{ request()->routeIs('galeri.*') ? 'active text-white' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium text-sm">Galeri</span>
                    </a>

                @endif
                {{-- END role check --}}

            </nav>

            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 px-2 mb-3">
                    @if(auth()->user()->role === 'guru' && isset($guru) && $guru?->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                            class="w-8 h-8 rounded-full object-cover flex-shrink-0 ring-1 ring-white/20">
                    @else
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0
                            {{ auth()->user()->role === 'guru' ? 'bg-blue-400/20' : 'bg-green-400/20' }}">
                            <span class="font-bold text-sm {{ auth()->user()->role === 'guru' ? 'text-blue-400' : 'text-green-400' }}">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </span>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-semibold truncate">
                            {{ auth()->user()->role === 'guru' ? ($guru?->nama ?? auth()->user()->name) : (auth()->user()->name ?? 'Admin') }}
                        </p>
                        <p class="text-white/40 text-xs truncate">
                            {{ auth()->user()->role === 'guru' ? 'Guru' : 'Administrator' }}
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-2 px-4 py-2.5 rounded-lg text-red-400/80 hover:text-red-400 hover:bg-red-400/10 transition duration-200 text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">

            {{-- Topbar --}}
            <header class="sticky top-0 z-10 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button id="sidebar-toggle" class="lg:hidden text-gray-500 hover:text-gray-800 transition">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-gray-800 font-bold text-lg leading-tight">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-gray-400 text-xs">@yield('page-subtitle',
                            auth()->user()->role === 'guru'
                                ? 'Selamat datang di portal guru'
                                : 'Selamat datang di panel admin'
                        )</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    {{-- Badge tahun ajaran aktif --}}
                    @php $tahunAktif = \App\Models\TahunAjaran::where('is_active', true)->first(); @endphp
                    @if($tahunAktif)
                    <span class="hidden sm:flex items-center gap-1.5 text-xs text-primary bg-primary/10 font-semibold px-3 py-1.5 rounded-lg">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        TA {{ $tahunAktif->nama }}
                    </span>
                    @endif
                    <span class="hidden sm:block text-xs text-gray-400">{{ now()->isoFormat('dddd, D MMMM Y') }}</span>
                    <a href="{{ url('/') }}" target="_blank"
                        class="flex items-center gap-1.5 text-xs font-semibold text-primary border border-primary/30 px-3 py-1.5 rounded-lg hover:bg-primary hover:text-white transition duration-200">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                        Lihat Website
                    </a>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="px-6 py-4 border-t border-gray-200 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} Yayasan Darul Istiqlal. All rights reserved.
            </footer>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggle  = document.getElementById('sidebar-toggle');

        toggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });
        overlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>

    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>