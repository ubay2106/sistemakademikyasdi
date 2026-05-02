@extends('admin.layout.app')

@section('content')

{{-- Header --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('kategori.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Edit Kategori</h1>
        <p class="text-xs text-gray-400 mt-0.5">{{ $kategori->nama }}</p>
    </div>
</div>

@if($errors->any())
<div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
    </svg>
    <div>
        <p class="text-sm font-semibold mb-1">Terdapat kesalahan:</p>
        <ul class="text-sm list-disc list-inside space-y-0.5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition flex-shrink-0">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

<div class="max-w-xl">
    <form method="POST" action="{{ route('kategori.update', $kategori) }}">
        @csrf @method('PUT')

        <div class="bg-white rounded-2xl border border-gray-100 p-6 space-y-5">

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Kategori <span class="text-red-400">*</span>
                </label>
                <input type="text" id="nama" name="nama"
                    value="{{ old('nama', $kategori->nama) }}"
                    placeholder="Nama kategori..."
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition">
                @error('nama')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi <span class="text-gray-400 font-normal text-xs">(opsional)</span>
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    placeholder="Deskripsi singkat kategori ini..."
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Info --}}
            <div class="bg-gray-50 rounded-xl p-4 space-y-2">
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Slug saat ini</span>
                    <span class="text-xs font-mono font-medium text-gray-600">{{ $kategori->slug }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Jumlah berita</span>
                    <span class="text-xs font-semibold text-blue-500">{{ $kategori->beritas()->count() }} berita</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Dibuat</span>
                    <span class="text-xs font-medium text-gray-600">{{ $kategori->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-400">Status</span>
                    @if($kategori->is_active)
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-green-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Nonaktif
                        </span>
                    @endif
                </div>
            </div>

        </div>

        {{-- Tombol --}}
        <div class="flex flex-col gap-2 mt-4">
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 bg-primary text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-green-700 transition duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Simpan Perubahan
            </button>
            <a href="{{ route('kategori.index') }}"
                class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection