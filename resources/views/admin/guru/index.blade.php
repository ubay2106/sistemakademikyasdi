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
            <h1 class="text-lg font-bold text-gray-800">Data Guru</h1>
            <p class="text-xs text-gray-400 mt-0.5">Kelola data guru dan akun login mereka</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Search --}}
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <form method="GET"">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / NIP..."
                        class="pl-10 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition w-56 {{ request('search') ? 'pr-9' : 'pr-4' }}">
                </form>
                @if (request('search'))
                    <a href="{{ route('admin.guru.index') }}"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors"
                        title="Hapus pencarian">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
            <a href="{{ route('admin.guru.create') }}"
                class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Guru
            </a>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">{{ $gurus->total() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Total Guru</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\Guru::where('jenis_kelamin', 'L')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Laki-laki</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-pink-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-pink-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\Guru::where('jenis_kelamin', 'P')->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Perempuan</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                </svg>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800 leading-none">
                    {{ \App\Models\Guru::whereHas('user', fn($q) => $q->where('is_active', true))->count() }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Akun Aktif</p>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/70">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Guru
                        </th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">
                            NIP</th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">
                            Kontak</th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">
                            Akun Login</th>
                        <th
                            class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden xl:table-cell">
                            Status</th>
                        <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($gurus as $guru)
                        <tr class="hover:bg-gray-50/50 transition group">

                            {{-- Guru --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($guru->foto)
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                            class="w-11 h-11 rounded-xl object-cover flex-shrink-0 border border-gray-100">
                                    @else
                                        <div
                                            class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 font-bold text-base
                                    {{ $guru->jenis_kelamin === 'P' ? 'bg-pink-50 text-pink-400' : 'bg-blue-50 text-blue-400' }}">
                                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <p
                                            class="font-semibold text-gray-800 text-sm truncate max-w-[180px] group-hover:text-primary transition">
                                            {{ $guru->nama }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5">
                                            {{ $guru->jenis_kelamin === 'L' ? 'Laki-laki' : ($guru->jenis_kelamin === 'P' ? 'Perempuan' : '—') }}
                                            @if ($guru->tanggal_lahir)
                                                · {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- NIP --}}
                            <td class="px-4 py-4 hidden md:table-cell">
                                @if ($guru->nip)
                                    <p class="text-sm font-mono text-gray-600">{{ $guru->nip }}</p>
                                @else
                                    <span class="text-xs text-gray-300 italic">Belum diisi</span>
                                @endif
                            </td>

                            {{-- Kontak --}}
                            <td class="px-4 py-4 hidden lg:table-cell">
                                @if ($guru->no_hp)
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $guru->no_hp }}</span>
                                    </div>
                                @else
                                    <span class="text-xs text-gray-300 italic">—</span>
                                @endif
                                @if ($guru->tempat_lahir && $guru->tanggal_lahir)
                                    <p class="text-xs text-gray-400 mt-0.5">{{ $guru->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->isoFormat('D MMM Y') }}</p>
                                @endif
                            </td>

                            {{-- Akun Login --}}
                            <td class="px-4 py-4 hidden lg:table-cell">
                                @if ($guru->user)
                                    <p class="text-sm font-mono text-gray-700 font-medium">{{ $guru->user->username ?? 'Belum ada akun' }}</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Role: {{ ucfirst($guru->user->role) }}</p>
                                @else
                                    <span class="text-xs text-red-400 italic">Tidak ada akun</span>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-4 hidden xl:table-cell">
                                @if ($guru->user?->is_active)
                                    <span
                                        class="inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 text-xs font-semibold bg-gray-100 text-gray-500 px-3 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.guru.edit', $guru) }}"
                                        class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.guru.destroy', $guru) }}"
                                        onsubmit="return confirm('Yakin hapus guru {{ addslashes($guru->nama) }} beserta akun loginnya?')">
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
                            <td colspan="6" class="px-6 py-20 text-center">
                                <div
                                    class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-blue-200" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                </div>
                                <p class="text-gray-400 font-medium">Belum ada data guru</p>
                                <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan guru pertama</p>
                                <a href="{{ route('admin.guru.create') }}"
                                    class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                                    + Tambah Guru
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($gurus->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $gurus->links() }}
            </div>
        @endif
    </div>
@endsection
