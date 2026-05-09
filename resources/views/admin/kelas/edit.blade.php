@extends('layout.app')

@section('content')

{{-- Top Bar --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.kelas.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800">Edit Kelas</h1>
        <p class="text-xs text-gray-400 mt-0.5">Perbarui data kelas <span class="font-medium text-gray-500">{{ $kelas->nama_kelas }}</span></p>
    </div>
</div>

<div class="max-w-full">
    <form method="POST" action="{{ route('admin.kelas.update', $kelas) }}">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">

            {{-- Header identitas kelas --}}
            <div class="px-6 py-5 border-b border-gray-50 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center flex-shrink-0">
                    <span class="text-indigo-500 font-extrabold text-base">{{ strtoupper(substr($kelas->nama_kelas, 0, 2)) }}</span>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-800">{{ $kelas->nama_kelas }}</h2>
                    <p class="text-xs text-gray-400 mt-0.5">
                        Wali kelas: {{ $kelas->waliKelas ? $kelas->waliKelas->nama : 'Belum ditentukan' }}
                    </p>
                </div>
            </div>

            <div class="px-6 py-6 space-y-5">

                {{-- Nama Kelas --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                        Nama Kelas <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
    placeholder="Contoh: VII A, VIII B, IX C..."
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
                        <option value="">-- Tidak Ada Wali Kelas --</option>
                        @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}"
                                {{ old('wali_kelas_id', $kelas->wali_kelas_id) == $guru->id ? 'selected' : '' }}>
                                {{ $guru->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('wali_kelas_id')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between gap-3">

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.kelas.index') }}"
                        class="px-5 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-700 bg-white border border-gray-200 rounded-xl hover:border-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-green-700 transition duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>

            </div>

        </div>
    </form>
</div>

@endsection