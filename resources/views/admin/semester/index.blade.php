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

{{-- Top Bar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h1 class="text-lg font-bold text-gray-800">Semester</h1>
        <p class="text-xs text-gray-400 mt-0.5">Kelola semester aktif dan riwayatnya</p>
    </div>
    <a href="{{ route('admin.semester.create') }}"
        class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Tambah Semester
    </a>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-indigo-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ $semesters->total() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Total Semester</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>
        <div>
            @php $aktif = \App\Models\Semester::with('tahunAjaran')->where('is_active', true)->first(); @endphp
            <p class="text-lg font-bold text-gray-800 leading-none">{{ $aktif ? $aktif->nama : '—' }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Semester Aktif</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ \App\Models\Semester::where('nama', 'Ganjil')->count() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Ganjil</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3 col-span-2 lg:col-span-1">
        <div class="w-9 h-9 rounded-lg bg-purple-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-purple-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ \App\Models\Semester::where('nama', 'Genap')->count() }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Genap</p>
        </div>
    </div>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50/70">
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Semester</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">Tahun Ajaran</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4">Status</th>
                    <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($semesters as $item)
                <tr class="hover:bg-gray-50/50 transition group {{ $item->is_active ? 'bg-green-50/30' : '' }}">

                    {{-- Nama Semester --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                                {{ $item->is_active
                                    ? 'bg-primary text-white'
                                    : ($item->nama === 'Ganjil' ? 'bg-blue-50 text-blue-400' : 'bg-purple-50 text-purple-400') }}">
                                @if($item->nama === 'Ganjil')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                                </svg>
                                @else
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                                </svg>
                                @endif
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 text-sm group-hover:text-primary transition">
                                    Semester {{ $item->nama }}
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

                    {{-- Tahun Ajaran --}}
                    <td class="px-4 py-4 hidden md:table-cell">
                        @if($item->tahunAjaran)
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-blue-50 text-blue-600 px-3 py-1 rounded-full">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                                {{ $item->tahunAjaran->nama }}
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
                            <a href="{{ route('admin.semester.edit', $item) }}"
                                class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.semester.destroy', $item) }}"
                                onsubmit="return confirm('Yakin hapus Semester {{ addslashes($item->nama) }}?{{ $item->is_active ? " Semester ini sedang aktif!" : "" }}')">
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
                    <td colspan="4" class="px-6 py-20 text-center">
                        <div class="w-20 h-20 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                            </svg>
                        </div>
                        <p class="text-gray-400 font-medium">Belum ada semester</p>
                        <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan semester pertama</p>
                        <a href="{{ route('admin.semester.create') }}"
                            class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                            + Tambah Semester
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($semesters->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $semesters->links() }}
    </div>
    @endif
</div>

@endsection