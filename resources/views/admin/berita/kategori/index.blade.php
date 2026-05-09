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
    <svg class="w-5 h-5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
    </svg>
    <p class="text-sm font-medium">{{ session('error') }}</p>
    <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

{{-- Header --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.berita.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Kategori Berita</h1>
        <p class="text-xs text-gray-400 mt-0.5">Kelola kategori untuk pengelompokan berita</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Form Tambah --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl border border-gray-100 p-6 sticky top-6">
            <h2 class="text-sm font-semibold text-gray-700 mb-4">Tambah Kategori</h2>

            @if($errors->any())
            <div class="mb-4 flex items-start gap-2 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                <svg class="w-4 h-4 flex-shrink-0 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <ul class="text-xs space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.kategori.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="nama" class="block text-xs font-medium text-gray-500 mb-1.5">
                        Nama Kategori <span class="text-red-400">*</span>
                    </label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        placeholder="cth: Pemerintahan, Ekonomi..."
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                    @error('nama')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-xs font-medium text-gray-500 mb-1.5">
                        Deskripsi <span class="text-gray-400 font-normal">(opsional)</span>
                    </label>
                    <textarea id="deskripsi" name="deskripsi" rows="3"
                        placeholder="Deskripsi singkat kategori ini..."
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-5 rounded-xl hover:bg-green-700 transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Kategori
                </button>
            </form>
        </div>
    </div>

    {{-- List Kategori --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">

            {{-- Header tabel --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <p class="text-sm font-semibold text-gray-700">Daftar Kategori</p>
                <span class="text-xs text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full font-medium">
                    {{ $kategoris->total() }} kategori
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/70">
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3">Nama</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3 hidden md:table-cell">Berita</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-3">Status</th>
                            <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($kategoris as $kategori)
                        <tr class="hover:bg-gray-50/50 transition group">

                            {{-- Nama --}}
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-gray-800">{{ $kategori->nama }}</p>
                                @if($kategori->deskripsi)
                                    <p class="text-xs text-gray-400 mt-0.5 line-clamp-1 max-w-[180px]">{{ $kategori->deskripsi }}</p>
                                @endif
                                <p class="text-xs text-gray-300 mt-0.5 font-mono">{{ $kategori->slug }}</p>
                            </td>

                            {{-- Jumlah Berita --}}
                            <td class="px-4 py-4 hidden md:table-cell">
                                <span class="inline-block text-xs font-semibold bg-blue-50 text-blue-500 px-2.5 py-1 rounded-full">
                                    {{ $kategori->beritas_count }} berita
                                </span>
                            </td>

                            {{-- Status & Toggle --}}
                            <td class="px-4 py-4">
                                <form method="POST" action="{{ route('admin.kategori.toggle', $kategori) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" title="Klik untuk ubah status"
                                        class="flex items-center gap-1.5 group/toggle">
                                        @if($kategori->is_active)
                                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1 rounded-full group-hover/toggle:bg-green-100 transition">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-gray-100 text-gray-500 px-3 py-1 rounded-full group-hover/toggle:bg-gray-200 transition">
                                                <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </button>
                                </form>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.kategori.edit', $kategori) }}"
                                        class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-500 transition"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.kategori.destroy', $kategori) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori \'{{ $kategori->nama }}\'?')">
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
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg>
                                </div>
                                <p class="text-gray-400 font-medium text-sm">Belum ada kategori</p>
                                <p class="text-gray-300 text-xs mt-1">Tambahkan kategori pertama menggunakan form di samping</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($kategoris->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $kategoris->links() }}
            </div>
            @endif

        </div>
    </div>

</div>

@endsection