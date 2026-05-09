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
            <svg class="w-5 h-5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
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
            <h1 class="text-lg font-bold text-gray-800">Siswa Kelas</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola penempatan siswa ke kelas per tahun ajaran</p>
        </div>

        <div class="flex items-center gap-3">
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <form method="GET">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / NIP..."
                        class="pl-10 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition w-56 {{ request('search') ? 'pr-9' : 'pr-4' }}">
                </form>
                @if (request('search'))
                    <a href="{{ route('admin.siswakelas.index') }}"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors"
                        title="Hapus pencarian">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
            <a href="{{ route('admin.siswakelas.kenaikan') }}"
                class="flex items-center gap-2 bg-blue-500 text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-blue-600 transition duration-200 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                </svg>
                Proses Kenaikan
            </a>

            <a href="{{ route('admin.siswakelas.create') }}"
                class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Siswa Kelas
            </a>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-cyan-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $siswaKelas->total() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Total Data</p>
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
                    {{ \App\Models\SiswaKelas::where('status', 'aktif')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Aktif</p>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\SiswaKelas::where('status', 'naik')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Naik Kelas</p>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3 col-span-2 lg:col-span-1">
            <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.741-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\SiswaKelas::where('status', 'lulus')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Lulus</p>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/70">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Siswa
                        </th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">
                            Kelas</th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">
                            Tahun Ajaran</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4">Status
                        </th>
                        <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($siswaKelas as $item)
                        @php
                            $statusConfig = [
                                'aktif' => [
                                    'bg' => 'bg-green-50',
                                    'text' => 'text-green-700',
                                    'dot' => 'bg-green-500',
                                    'label' => 'Aktif',
                                    'pulse' => true,
                                ],
                                'naik' => [
                                    'bg' => 'bg-blue-50',
                                    'text' => 'text-blue-600',
                                    'dot' => 'bg-blue-500',
                                    'label' => 'Naik Kelas',
                                    'pulse' => false,
                                ],
                                'tinggal' => [
                                    'bg' => 'bg-orange-50',
                                    'text' => 'text-orange-600',
                                    'dot' => 'bg-orange-400',
                                    'label' => 'Tinggal Kelas',
                                    'pulse' => false,
                                ],
                                'lulus' => [
                                    'bg' => 'bg-emerald-50',
                                    'text' => 'text-emerald-700',
                                    'dot' => 'bg-emerald-500',
                                    'label' => 'Lulus',
                                    'pulse' => false,
                                ],
                            ];
                            $sc = $statusConfig[$item->status] ?? $statusConfig['aktif'];
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition group">

                            {{-- Siswa --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-xl bg-cyan-50 flex items-center justify-center flex-shrink-0 font-bold text-xs text-cyan-600">
                                        {{ strtoupper(substr($item->siswa?->nama ?? '?', 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm group-hover:text-primary transition">
                                            {{ $item->siswa?->nama ?? '—' }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5">{{ $item->siswa?->nis ?? '' }}</p>
                                    </div>
                                </div>
                            </td>

                            {{-- Kelas --}}
                            <td class="px-4 py-4 hidden md:table-cell">
                                @if ($item->kelas)
                                    <span
                                        class="inline-flex items-center gap-1.5 text-xs font-semibold bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                        </svg>
                                        {{ $item->kelas->nama_kelas }}
                                    </span>
                                @else
                                    <span class="text-xs text-gray-300 italic">—</span>
                                @endif
                            </td>

                            {{-- Tahun Ajaran --}}
                            <td class="px-4 py-4 hidden lg:table-cell">
                                @if ($item->tahunAjaran)
                                    <span
                                        class="inline-flex items-center gap-1.5 text-xs font-semibold bg-blue-50 text-blue-600 px-3 py-1 rounded-full">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        {{ $item->tahunAjaran->nama }}
                                    </span>
                                @else
                                    <span class="text-xs text-gray-300 italic">—</span>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold {{ $sc['bg'] }} {{ $sc['text'] }} px-3 py-1 rounded-full">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full {{ $sc['dot'] }} {{ $sc['pulse'] ? 'animate-pulse' : '' }}"></span>
                                    {{ $sc['label'] }}
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.siswakelas.edit', $item) }}"
                                        class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.siswakelas.destroy', $item) }}"
                                        onsubmit="return confirm('Yakin hapus data kelas siswa {{ addslashes($item->siswa?->nama ?? '') }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-400 hover:text-red-600 transition"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
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
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div
                                    class="w-20 h-20 bg-cyan-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-cyan-200" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                </div>
                                <p class="text-gray-400 font-medium">Belum ada data siswa kelas</p>
                                <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan siswa ke kelas</p>
                                <a href="{{ route('admin.siswakelas.create') }}"
                                    class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                                    + Tambah Siswa Kelas
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($siswaKelas->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $siswaKelas->links() }}
            </div>
        @endif
    </div>
@endsection
