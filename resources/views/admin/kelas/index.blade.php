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

    @if(session('error'))
<div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
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
            <h1 class="text-lg font-bold text-gray-800">Data Kelas</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola kelas dan wali kelas</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <form method="GET">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kelas..."
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
                Tambah Kelas
            </button>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-indigo-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $kelas->total() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Total Kelas</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\Kelas::whereNotNull('wali_kelas_id')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Ada Wali Kelas</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-orange-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\Kelas::whereNull('wali_kelas_id')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Tanpa Wali Kelas</p>
            </div>
        </div>
    </div>

    {{-- Layout: Tabel + Panel --}}
    <div class="flex gap-5 items-start">

        {{-- Tabel --}}
        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100 overflow-hidden transition-all duration-300">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/70">
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">
                                Kelas</th>
                            <th
                                class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">
                                Wali Kelas</th>
                            <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($kelas as $k)
                            <tr class="hover:bg-gray-50/50 transition group" id="row-{{ $k->id }}">

                                {{-- Nama Kelas --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center flex-shrink-0">
                                            <span
                                                class="text-indigo-500 font-bold text-sm">{{ strtoupper(substr($k->nama_kelas, 0, 2)) }}</span>
                                        </div>
                                        <div>
                                            <p
                                                class="font-semibold text-gray-800 text-sm group-hover:text-primary transition">
                                                {{ $k->nama_kelas }}</p>
                                            <p class="text-xs text-gray-400 mt-0.5 md:hidden">
                                                {{ $k->waliKelas ? $k->waliKelas->nama : 'Belum ada wali kelas' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Wali Kelas --}}
                                <td class="px-4 py-4 hidden md:table-cell">
                                    @if ($k->waliKelas)
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="w-7 h-7 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0 text-xs font-bold text-blue-400">
                                                {{ strtoupper(substr($k->waliKelas->nama, 0, 1)) }}
                                            </div>
                                            <span class="text-sm text-gray-700">{{ $k->waliKelas->nama }}</span>
                                        </div>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 text-xs font-medium bg-orange-50 text-orange-500 px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-orange-400"></span>
                                            Belum ditentukan
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.kelas.edit', $k) }}"
                                            class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.kelas.destroy', $k) }}"
                                            onsubmit="return confirm('Yakin hapus kelas {{ addslashes($k->nama_kelas) }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-400 hover:text-red-600 transition"
                                                title="Hapus">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-20 text-center">
                                    <div
                                        class="w-20 h-20 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-10 h-10 text-indigo-200" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 font-medium">Belum ada data kelas</p>
                                    <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan kelas pertama</p>
                                    <button onclick="togglePanel()"
                                        class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                                        + Tambah Kelas
                                    </button>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($kelas->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $kelas->links() }}
                </div>
            @endif
        </div>

        {{-- Panel Tambah Kelas (slide-in) --}}
        <div id="create-panel"
            class="hidden w-80 flex-shrink-0 bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">

            <div class="px-5 py-4 border-b border-gray-50 flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-gray-800">Tambah Kelas</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Isi detail kelas baru</p>
                </div>
                <button onclick="togglePanel()"
                    class="w-7 h-7 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.kelas.store') }}" class="px-5 py-5 space-y-4">
                @csrf

                {{-- Nama Kelas --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                        Nama Kelas <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}"
                        placeholder="Contoh: VII A, VIII B..." autofocus
                        class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('nama_kelas') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                    @error('nama_kelas')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Wali Kelas --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Wali Kelas</label>
                    <select name="wali_kelas_id"
                        class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('wali_kelas_id') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                        <option value="">-- Pilih Wali Kelas --</option>
                        @foreach ($gurus as $guru)
                            <option value="{{ $guru->id }}"
                                {{ old('wali_kelas_id') == $guru->id ? 'selected' : '' }}>
                                {{ $guru->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('wali_kelas_id')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1.5 text-xs text-gray-400">Opsional — bisa diatur nanti</p>
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

    </div>{{-- end layout --}}

    <script>
        const panel = document.getElementById('create-panel');
        const btnTambah = document.getElementById('btn-tambah');

        @if ($errors->any())
            panel.classList.remove('hidden');
        @endif

        function togglePanel() {
            const isHidden = panel.classList.contains('hidden');
            panel.classList.toggle('hidden');

            if (isHidden) {
                panel.style.opacity = '0';
                panel.style.transform = 'translateX(20px)';
                requestAnimationFrame(() => {
                    panel.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                    panel.style.opacity = '1';
                    panel.style.transform = 'translateX(0)';
                });
            }
        }
    </script>
@endsection
