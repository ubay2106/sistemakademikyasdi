@extends('layout.app')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.semester.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Tambah Semester</h1>
        <p class="text-xs text-gray-400 mt-0.5">Buat semester baru</p>
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

<form method="POST" action="{{ route('admin.semester.store') }}">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri --}}
        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-primary rounded-full"></span>
                    Informasi Semester
                </h3>

                <div class="space-y-4">

                    {{-- Nama Semester --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-2">
                            Nama Semester <span class="text-red-400">*</span>
                        </label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="nama" value="Ganjil" class="peer sr-only"
                                    {{ old('nama') === 'Ganjil' ? 'checked' : '' }}>
                                <div class="flex items-center gap-3 border-2 border-gray-200 rounded-xl px-4 py-3.5 transition
                                    peer-checked:border-blue-500 peer-checked:bg-blue-50">
                                    <div class="w-8 h-8 rounded-lg bg-blue-100 peer-checked:bg-blue-500 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-blue-500 peer-checked:text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">Ganjil</p>
                                        <p class="text-xs text-gray-400">Semester 1</p>
                                    </div>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="nama" value="Genap" class="peer sr-only"
                                    {{ old('nama') === 'Genap' ? 'checked' : '' }}>
                                <div class="flex items-center gap-3 border-2 border-gray-200 rounded-xl px-4 py-3.5 transition
                                    peer-checked:border-purple-500 peer-checked:bg-purple-50">
                                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">Genap</p>
                                        <p class="text-xs text-gray-400">Semester 2</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @error('nama') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tahun Ajaran --}}
                    <div>
                        <label for="tahun_ajaran_id" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Tahun Ajaran <span class="text-red-400">*</span>
                        </label>
                        <select id="tahun_ajaran_id" name="tahun_ajaran_id"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition appearance-none
                                {{ $errors->has('tahun_ajaran_id') ? 'border-red-300 bg-red-50' : '' }}">
                            <option value="" disabled selected>Pilih tahun ajaran...</option>
                            @foreach($tahunAjarans as $ta)
                                <option value="{{ $ta->id }}" {{ old('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->nama }}{{ $ta->is_active ? ' (Aktif)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        @if($tahunAjarans->isEmpty())
                            <p class="text-xs text-amber-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                                Belum ada tahun ajaran. <a href="{{ route('admin.tahunajaran.create') }}" class="underline font-semibold">Tambah dahulu</a>.
                            </p>
                        @endif
                    </div>

                </div>
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-5">

            {{-- Status Aktif --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Status</h3>

                <label class="cursor-pointer block">
                    <div class="flex items-start gap-3 border-2 border-gray-200 rounded-xl p-4 transition
                        has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                        <div class="relative mt-0.5">
                            <input type="checkbox" name="is_active" value="1"
                                class="peer sr-only" {{ old('is_active') ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 peer-checked:bg-primary rounded-full transition"></div>
                            <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-4 shadow-sm"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Jadikan Semester Aktif</p>
                            <p class="text-xs text-gray-400 leading-relaxed mt-0.5">
                                Semester lain akan otomatis dinonaktifkan jika opsi ini dipilih.
                            </p>
                        </div>
                    </div>
                </label>
            </div>

            {{-- Info --}}
            <div class="bg-amber-50 rounded-2xl border border-amber-100 p-5">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-amber-700 mb-1">Perhatian</p>
                        <p class="text-xs text-amber-600 leading-relaxed">Hanya boleh ada <strong>satu</strong> semester aktif dalam satu waktu. Mengaktifkan semester baru akan menonaktifkan yang lain secara otomatis.</p>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col gap-2">
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-primary text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-green-700 transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Simpan Semester
                </button>
                <a href="{{ route('admin.semester.index') }}"
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
            </div>

        </div>
    </div>
</form>

@endsection