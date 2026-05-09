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
        <h1 class="text-lg font-bold text-gray-800">Tahun Ajaran</h1>
        <p class="text-xs text-gray-400 mt-0.5">Kelola tahun ajaran aktif dan riwayatnya</p>
    </div>
    <a href="{{ route('admin.tahunajaran.create') }}"
        class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Tambah Tahun Ajaran
    </a>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ $tahunajarans->total() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Total Tahun Ajaran</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>
        <div>
            @php $aktif = \App\Models\TahunAjaran::where('is_active', true)->first(); @endphp
            <p class="text-lg font-bold text-gray-800 leading-none">{{ $aktif?->nama ?? '—' }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Tahun Ajaran Aktif</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3 col-span-2 lg:col-span-1">
        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ \App\Models\TahunAjaran::where('is_active', false)->count() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Riwayat / Nonaktif</p>
        </div>
    </div>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50/70">
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Tahun Ajaran</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">Tanggal Mulai</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">Tanggal Selesai</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">Durasi</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4">Status</th>
                    <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($tahunajarans as $item)
                <tr class="hover:bg-gray-50/50 transition group {{ $item->is_active ? 'bg-green-50/30' : '' }}">

                    {{-- Nama --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                                {{ $item->is_active ? 'bg-primary text-white' : 'bg-gray-100 text-gray-400' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 text-sm group-hover:text-primary transition">
                                    {{ $item->nama }}
                                </p>
                                @if($item->is_active)
                                <span class="inline-flex items-center gap-1 text-xs text-primary font-medium mt-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                    Sedang berjalan
                                </span>
                                @else
                                <p class="text-xs text-gray-400 mt-0.5">Tidak aktif</p>
                                @endif
                            </div>
                        </div>
                    </td>

                    {{-- Tanggal Mulai --}}
                    <td class="px-4 py-4 hidden md:table-cell">
                        @if($item->tanggal_mulai)
                            <p class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->isoFormat('D MMM Y') }}</p>
                        @else
                            <span class="text-xs text-gray-300 italic">—</span>
                        @endif
                    </td>

                    {{-- Tanggal Selesai --}}
                    <td class="px-4 py-4 hidden md:table-cell">
                        @if($item->tanggal_selesai)
                            <p class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->isoFormat('D MMM Y') }}</p>
                        @else
                            <span class="text-xs text-gray-300 italic">—</span>
                        @endif
                    </td>

                    {{-- Durasi --}}
                    <td class="px-4 py-4 hidden lg:table-cell">
                        @if($item->tanggal_mulai && $item->tanggal_selesai)
                            @php
                                $mulai   = \Carbon\Carbon::parse($item->tanggal_mulai);
                                $selesai = \Carbon\Carbon::parse($item->tanggal_selesai);
                                $bulan   = $mulai->diffInMonths($selesai);
                            @endphp
                            <span class="inline-block text-xs font-semibold bg-blue-50 text-blue-600 px-3 py-1 rounded-full">
                                {{ $bulan }} bulan
                            </span>
                        @else
                            <span class="text-xs text-gray-300 italic">—</span>
                        @endif
                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-4">
                        @if($item->is_active)
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
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
                            <a href="{{ route('admin.tahunajaran.edit', $item) }}"
                                class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.tahunajaran.destroy', $item) }}"
                                onsubmit="return confirm('Yakin hapus tahun ajaran {{ addslashes($item->nama) }}?{{ $item->is_active ? " Tahun ajaran ini sedang aktif!" : "" }}')">
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
                        <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-blue-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                        </div>
                        <p class="text-gray-400 font-medium">Belum ada tahun ajaran</p>
                        <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan tahun ajaran pertama</p>
                        <a href="{{ route('admin.tahunajaran.create') }}"
                            class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                            + Tambah Tahun Ajaran
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($tahunajarans->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $tahunajarans->links() }}
    </div>
    @endif
</div>

@endsection