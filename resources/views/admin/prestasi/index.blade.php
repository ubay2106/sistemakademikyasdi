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
        <h1 class="text-lg font-bold text-gray-800">Data Prestasi</h1>
        <p class="text-xs text-gray-400 mt-0.5">Kelola prestasi siswa dan tenaga pendidik</p>
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
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Judul..."
                        class="pl-10 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition w-56 {{ request('search') ? 'pr-9' : 'pr-4' }}">
                </form>
                @if (request('search'))
                    <a href="{{ route('admin.prestasi.index') }}"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors"
                        title="Hapus pencarian">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
    <a href="{{ route('admin.prestasi.create') }}"
        class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200 flex-shrink-0">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Tambah Prestasi
    </a>
    </div>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
        $tingkats = [
            ['label' => 'Total',          'value' => $prestasis->total(), 'color' => 'blue',   'icon' => 'M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z'],
            ['label' => 'Nasional',       'value' => \App\Models\Prestasi::where('tingkat','nasional')->count(),       'color' => 'amber',  'icon' => 'M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m12-3.75H6m12 0V6.75A2.25 2.25 0 0 0 15.75 4.5h-7.5A2.25 2.25 0 0 0 6 6.75V9m12 0a2.25 2.25 0 0 1 2.25 2.25v.75H3.75v-.75A2.25 2.25 0 0 1 6 9'],
            ['label' => 'Internasional',  'value' => \App\Models\Prestasi::where('tingkat','internasional')->count(),  'color' => 'purple', 'icon' => 'M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253'],
            ['label' => 'Unggulan',       'value' => \App\Models\Prestasi::where('is_featured', true)->count(),        'color' => 'green',  'icon' => 'M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z'],
        ];
    @endphp
    @foreach($tingkats as $stat)
    <div class="bg-white rounded-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-{{ $stat['color'] }}-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-{{ $stat['color'] }}-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-bold text-gray-800 leading-none">{{ $stat['value'] }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $stat['label'] }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50/70">
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Prestasi</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden md:table-cell">Peserta</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">Tingkat</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden lg:table-cell">Juara</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-4 hidden xl:table-cell">Tanggal</th>
                    <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($prestasis as $item)
                <tr class="hover:bg-gray-50/50 transition group">

                    {{-- Prestasi --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                    class="w-14 h-14 rounded-xl object-cover flex-shrink-0 border border-gray-100">
                            @else
                                <div class="w-14 h-14 rounded-xl bg-amber-50 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-amber-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                                    </svg>
                                </div>
                            @endif
                            <div class="min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <p class="font-semibold text-gray-800 text-sm truncate max-w-[200px] group-hover:text-primary transition">
                                        {{ $item->judul }}
                                    </p>
                                    @if($item->is_featured)
                                    <svg class="w-3.5 h-3.5 text-amber-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>
                                    </svg>
                                    @endif
                                </div>
                                <p class="text-gray-400 text-xs mt-0.5 truncate max-w-[200px]">{{ $item->nama_lomba }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- Peserta --}}
                    <td class="px-4 py-4 hidden md:table-cell">
                        <p class="text-sm font-medium text-gray-700">{{ $item->nama_peserta }}</p>
                        @if($item->kelas)
                        <p class="text-xs text-gray-400 mt-0.5">Kelas {{ $item->kelas }}</p>
                        @endif
                        @if($item->nis_nip)
                        <p class="text-xs text-gray-300 font-mono">{{ $item->nis_nip }}</p>
                        @endif
                    </td>

                    {{-- Tingkat --}}
                    <td class="px-4 py-4 hidden lg:table-cell">
                        @php
                            $tingkatColor = match($item->tingkat) {
                                'internasional' => 'bg-purple-50 text-purple-700',
                                'nasional'      => 'bg-amber-50 text-amber-700',
                                'provinsi'      => 'bg-blue-50 text-blue-700',
                                'kabupaten'     => 'bg-cyan-50 text-cyan-700',
                                'kecamatan'     => 'bg-teal-50 text-teal-700',
                                default         => 'bg-gray-100 text-gray-600',
                            };
                        @endphp
                        <span class="inline-block text-xs font-semibold {{ $tingkatColor }} px-3 py-1 rounded-full">
                            {{ $item->tingkat }}
                        </span>
                    </td>

                    {{-- Juara --}}
                    <td class="px-4 py-4 hidden lg:table-cell">
                        @php
                            $juaraColor = match($item->juara) {
                                '1'       => 'bg-yellow-50 text-yellow-700',
                                '2'       => 'bg-gray-100 text-gray-600',
                                '3'       => 'bg-orange-50 text-orange-700',
                                default   => 'bg-green-50 text-green-700',
                            };
                        @endphp
                        <span class="inline-block text-xs font-bold {{ $juaraColor }} px-3 py-1 rounded-full">
                            {{ $item->juara }}
                        </span>
                    </td>

                    {{-- Tanggal --}}
                    <td class="px-4 py-4 hidden xl:table-cell">
                        <p class="text-sm text-gray-600">{{ $item->tanggal->format('d M Y') }}</p>
                        @if($item->penyelenggara)
                        <p class="text-xs text-gray-400 mt-0.5 truncate max-w-[140px]">{{ $item->penyelenggara }}</p>
                        @endif
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.prestasi.edit', $item) }}"
                                class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.prestasi.destroy', $item) }}"
                                onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
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
                        <div class="w-20 h-20 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-amber-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                            </svg>
                        </div>
                        <p class="text-gray-400 font-medium">Belum ada data prestasi</p>
                        <p class="text-gray-300 text-sm mt-1">Mulai dengan menambahkan prestasi pertama</p>
                        <a href="{{ route('admin.prestasi.create') }}"
                            class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-primary hover:underline">
                            + Tambah Prestasi
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($prestasis->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $prestasis->links() }}
    </div>
    @endif
</div>

@endsection