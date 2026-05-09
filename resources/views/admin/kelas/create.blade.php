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
            <h1 class="text-lg font-bold text-gray-800">Tambah Kelas</h1>
            <p class="text-xs text-gray-400 mt-0.5">Tambahkan kelas baru ke dalam sistem</p>
        </div>
    </div>

    <div class="max-w-lg">
        <form method="POST" action="{{ route('admin.kelas.store') }}">
            @csrf

            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50">
                    <h2 class="text-sm font-semibold text-gray-700">Informasi Kelas</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Isi data kelas yang akan ditambahkan</p>
                </div>

                <div class="px-6 py-6 space-y-5">

                    {{-- Nama Kelas --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                            Nama Kelas <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}"
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
                            <option value="">-- Pilih Wali Kelas (Opsional) --</option>
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
                        <p class="mt-1.5 text-xs text-gray-400">Wali kelas dapat diatur atau diubah nanti</p>
                    </div>

                </div>

                <div class="px-6 py-4 bg-gray-50/70 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.kelas.index') }}"
                        class="px-5 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-700 bg-white border border-gray-200 rounded-xl hover:border-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-green-700 transition duration-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Simpan Kelas
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
