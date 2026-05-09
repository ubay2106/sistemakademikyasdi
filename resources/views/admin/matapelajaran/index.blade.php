@extends('layout.app')

@section('content')

    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
            <svg class="w-5 h-5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
            <button onclick="this.parentElement.remove()" class="ml-auto text-green-400 hover:text-green-600 transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
            <svg class="w-5 h-5 flex-shrink-0 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <p class="text-sm font-medium">{{ session('error') }}</p>
            <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    {{-- Top Bar --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-lg font-bold text-gray-800">Mata Pelajaran</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola daftar mata pelajaran dan statusnya</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <form method="GET">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari mata pelajaran..."
                        class="pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition w-52">
                </form>
                @if (request('search'))
                    <a href="{{ route('admin.kelas.index') }}"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors"
                        title="Hapus pencarian">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
            <button onclick="togglePanel()" id="btn-tambah"
                class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Mapel
            </button>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-violet-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-violet-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $matapelajarans->total() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Total Mapel</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\MataPelajaran::where('is_active', 1)->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Aktif</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\MataPelajaran::where('is_active', 0)->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Nonaktif</p>
            </div>
        </div>
    </div>

    {{-- Layout: Grid Kartu + Panel --}}
    <div class="flex gap-5 items-start">

        {{-- Grid Kartu Mapel --}}
        <div class="flex-1 min-w-0">
            @if ($matapelajarans->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach ($matapelajarans as $mp)
                        <div
                            class="group bg-white rounded-2xl border border-gray-100 hover:border-violet-200 hover:shadow-sm transition-all duration-200 overflow-hidden flex flex-col">

                            {{-- Card Header --}}
                            <div class="px-5 pt-5 pb-4 flex items-start justify-between gap-3">
                                <div class="flex items-center gap-3 min-w-0">
                                    {{-- Ikon warna otomatis berdasarkan huruf --}}
                                    @php
                                        $colors = [
                                            'A' => 'bg-rose-50 text-rose-500',
                                            'B' => 'bg-orange-50 text-orange-500',
                                            'C' => 'bg-amber-50 text-amber-500',
                                            'D' => 'bg-yellow-50 text-yellow-500',
                                            'E' => 'bg-lime-50 text-lime-600',
                                            'F' => 'bg-green-50 text-green-600',
                                            'G' => 'bg-teal-50 text-teal-500',
                                            'H' => 'bg-cyan-50 text-cyan-500',
                                            'I' => 'bg-sky-50 text-sky-500',
                                            'J' => 'bg-blue-50 text-blue-500',
                                            'K' => 'bg-indigo-50 text-indigo-500',
                                            'L' => 'bg-violet-50 text-violet-500',
                                            'M' => 'bg-purple-50 text-purple-500',
                                            'N' => 'bg-fuchsia-50 text-fuchsia-500',
                                            'O' => 'bg-pink-50 text-pink-500',
                                            'P' => 'bg-rose-50 text-rose-500',
                                        ];
                                        $firstLetter = strtoupper(substr($mp->nama, 0, 1));
                                        $colorClass = $colors[$firstLetter] ?? 'bg-violet-50 text-violet-500';
                                    @endphp
                                    <div
                                        class="w-10 h-10 rounded-xl {{ $colorClass }} flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                        {{ $firstLetter }}
                                    </div>
                                    <div class="min-w-0">
                                        <p
                                            class="font-semibold text-gray-800 text-sm leading-tight truncate group-hover:text-violet-600 transition">
                                            {{ $mp->nama }}
                                        </p>
                                        @if ($mp->is_active)
                                            <span
                                                class="inline-flex items-center gap-1 text-xs font-medium text-green-600 mt-0.5">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1 text-xs font-medium text-gray-400 mt-0.5">
                                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300 inline-block"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="px-5 pb-4 flex-1">
                                @if ($mp->deskripsi)
                                    <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $mp->deskripsi }}</p>
                                @else
                                    <p class="text-xs text-gray-300 italic">Tidak ada deskripsi</p>
                                @endif
                            </div>

                            {{-- Card Footer --}}
                            <div
                                class="px-5 py-3 border-t border-gray-50 bg-gray-50/50 flex items-center justify-end gap-2">
                                <a href="{{ route('admin.matapelajaran.edit', $mp) }}"
                                    class="flex items-center gap-1.5 text-xs font-semibold text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                    </svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.matapelajaran.destroy', $mp) }}"
                                    onsubmit="return confirm('Yakin hapus mata pelajaran {{ addslashes($mp->nama) }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center gap-1.5 text-xs font-semibold text-red-400 hover:text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>

                @if ($matapelajarans->hasPages())
                    <div class="mt-6 bg-white rounded-2xl border border-gray-100 px-6 py-4">
                        {{ $matapelajarans->links() }}
                    </div>
                @endif
            @else
                {{-- Empty state --}}
                <div class="bg-white rounded-2xl border border-gray-100 px-6 py-20 text-center">
                    <div class="w-20 h-20 bg-violet-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-violet-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <p class="text-gray-400 font-medium">Belum ada mata pelajaran</p>
                    <p class="text-gray-300 text-sm mt-1">Mulai tambahkan mata pelajaran pertama</p>
                    <button onclick="togglePanel()"
                        class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                        + Tambah Mata Pelajaran
                    </button>
                </div>
            @endif
        </div>

        {{-- Panel Tambah Mapel (slide-in) --}}
        <div id="create-panel"
            class="hidden w-80 flex-shrink-0 bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">

            <div class="px-5 py-4 border-b border-gray-50 flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-gray-800">Tambah Mata Pelajaran</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Isi detail mapel baru</p>
                </div>
                <button onclick="togglePanel()"
                    class="w-7 h-7 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.matapelajaran.store') }}" class="px-5 py-5 space-y-4">
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                        Nama Mata Pelajaran <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                        placeholder="Contoh: Matematika, IPA..." autofocus
                        class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('nama') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                    @error('nama')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" placeholder="Deskripsi singkat tentang mata pelajaran ini..."
                        class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none
    {{ $errors->has('deskripsi') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status Aktif --}}
                <div class="flex items-center justify-between py-3 px-4 bg-gray-50 rounded-xl border border-gray-100">
                    <div>
                        <p class="text-xs font-semibold text-gray-700">Status Aktif</p>
                        <p class="text-xs text-gray-400 mt-0.5">Mapel bisa digunakan di jadwal</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                        <div
                            class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary">
                        </div>
                    </label>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="togglePanel()"
                        class="flex-1 py-2.5 text-sm font-semibold text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 flex items-center justify-center gap-1.5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-green-700 transition duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        const panel = document.getElementById('create-panel');

        @if ($errors->any())
            panel.classList.remove('hidden');
        @endif

        function togglePanel() {
            const isHidden = panel.classList.contains('hidden');
            panel.classList.toggle('hidden');
            if (isHidden) {
                panel.style.opacity = '0';
                panel.style.transform = 'translateX(16px)';
                requestAnimationFrame(() => {
                    panel.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                    panel.style.opacity = '1';
                    panel.style.transform = 'translateX(0)';
                });
            }
        }
    </script>

@endsection
