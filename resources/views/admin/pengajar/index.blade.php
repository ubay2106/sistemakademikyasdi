@extends('layout.app')

@section('content')

@if(session('success'))
<div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
        <h1 class="text-lg font-bold text-gray-800">Data Pengajar</h1>
        <p class="text-xs text-gray-400 mt-0.5">Kelola penugasan guru mengajar per kelas & mata pelajaran</p>
    </div>
    <div class="flex items-center gap-3">
        <div class="relative">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <form method="GET">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari guru / kelas / mapel..."
                    class="pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition w-60">
            </form>
            @if (request('search'))
                    <a href="{{ route('admin.pengajar.index') }}"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors"
                        title="Hapus pencarian">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
        </div>
        <a href="{{ route('admin.pengajar.create') }}"
            class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Pengajar
        </a>
    </div>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-cyan-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.741-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ $pengajars->total() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Total Penugasan</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ \App\Models\Pengajar::where('is_active', true)->count() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Aktif</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ \App\Models\Pengajar::distinct('guru_id')->count('guru_id') }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Guru Bertugas</p>
        </div>
    </div>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50/70">
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Guru</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">Mata Pelajaran</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">Kelas</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden xl:table-cell">Tahun Ajaran</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden xl:table-cell">Status</th>
                    <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($pengajars as $p)
                <tr class="hover:bg-gray-50/50 transition group">

                    {{-- Guru --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-cyan-50 flex items-center justify-center flex-shrink-0 font-bold text-sm text-cyan-500">
                                {{ strtoupper(substr($p->guru->nama ?? '?', 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="font-semibold text-gray-800 text-sm truncate max-w-[160px] group-hover:text-primary transition">
                                    {{ $p->guru->nama ?? '—' }}
                                </p>
                                {{-- info ringkas di mobile --}}
                                <p class="text-xs text-gray-400 mt-0.5 md:hidden truncate max-w-[160px]">
                                    {{ $p->mataPelajaran->nama ?? '—' }} · {{ $p->kelas->nama_kelas ?? '—' }}
                                </p>
                            </div>
                        </div>
                    </td>

                    {{-- Mata Pelajaran --}}
                    <td class="px-4 py-4 hidden md:table-cell">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-lg bg-violet-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-violet-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-700 truncate max-w-[140px]">{{ $p->mataPelajaran->nama ?? '—' }}</span>
                        </div>
                    </td>

                    {{-- Kelas --}}
                    <td class="px-4 py-4 hidden lg:table-cell">
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6Z" />
                            </svg>
                            {{ $p->kelas->nama_kelas ?? '—' }}
                        </span>
                    </td>

                    {{-- Tahun Ajaran --}}
                    <td class="px-4 py-4 hidden xl:table-cell">
                        <span class="text-sm text-gray-600 font-mono">{{ $p->tahunAjaran->nama ?? '—' }}</span>
                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-4 hidden xl:table-cell">
                        @if($p->is_active)
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-gray-100 text-gray-500 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                Nonaktif
                            </span>
                        @endif
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.pengajar.edit', $p) }}"
                                class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.pengajar.destroy', $p) }}"
                                onsubmit="return confirm('Yakin hapus penugasan pengajar ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-400 hover:text-red-600 transition"
                                    title="Hapus">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-20 text-center">
                        <div class="w-20 h-20 bg-cyan-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-cyan-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.741-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <p class="text-gray-400 font-medium">Belum ada data pengajar</p>
                        <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan penugasan pertama</p>
                        <a href="{{ route('admin.pengajar.create') }}"
                            class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                            + Tambah Pengajar
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pengajars->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $pengajars->links() }}
    </div>
    @endif
</div>

@endsection