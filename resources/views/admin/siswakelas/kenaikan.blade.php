@extends('layout.app')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.siswakelas.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Proses Kenaikan Kelas</h1>
        <p class="text-xs text-gray-400 mt-0.5">Naikkan siswa dari tahun ajaran lama ke tahun ajaran baru</p>
    </div>
</div>

@if($errors->any())
<div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
    <div>
        <p class="text-sm font-semibold mb-1">Terdapat kesalahan:</p>
        <ul class="text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

@if(session('error'))
<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl text-sm font-medium">
    {{ session('error') }}
</div>
@endif

<form method="POST" action="{{ route('admin.siswakelas.prosesKenaikan') }}"
    onsubmit="return confirm('Yakin proses kenaikan kelas? Data lama akan menjadi arsip dan data baru akan dibuat.')">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-500 rounded-full"></span>
                    Data Kelas Lama
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Tahun Ajaran Lama</label>
                        <select name="tahun_ajaran_lama_id" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm">
                            <option value="" disabled selected>Pilih tahun ajaran lama...</option>
                            @foreach($tahunAjarans as $ta)
                                <option value="{{ $ta->id }}" {{ old('tahun_ajaran_lama_id') == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->nama }}{{ $ta->is_active ? ' (Aktif)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Kelas Lama</label>
                        <select name="kelas_lama_id" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm">
                            <option value="" disabled selected>Pilih kelas lama...</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_lama_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-green-500 rounded-full"></span>
                    Data Kelas Baru
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Tahun Ajaran Baru</label>
                        <select name="tahun_ajaran_baru_id" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm">
                            <option value="" disabled selected>Pilih tahun ajaran baru...</option>
                            @foreach($tahunAjarans as $ta)
                                <option value="{{ $ta->id }}" {{ old('tahun_ajaran_baru_id') == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->nama }}{{ $ta->is_active ? ' (Aktif)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1.5">Kelas Baru / Tujuan</label>
                        <select name="kelas_baru_id" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm">
                            <option value="" disabled selected>Pilih kelas tujuan...</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_baru_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-500 rounded-full"></span>
                    Status Data Lama
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="status_lama" value="naik" class="peer sr-only" {{ old('status_lama', 'naik') == 'naik' ? 'checked' : '' }}>
                        <div class="border-2 border-gray-200 peer-checked:border-blue-500 peer-checked:bg-blue-50 rounded-xl p-4 text-center transition">
                            <p class="text-sm font-semibold text-gray-700">Naik Kelas</p>
                            <p class="text-xs text-gray-400 mt-1">Data lama jadi naik</p>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="status_lama" value="tinggal" class="peer sr-only" {{ old('status_lama') == 'tinggal' ? 'checked' : '' }}>
                        <div class="border-2 border-gray-200 peer-checked:border-orange-400 peer-checked:bg-orange-50 rounded-xl p-4 text-center transition">
                            <p class="text-sm font-semibold text-gray-700">Tinggal Kelas</p>
                            <p class="text-xs text-gray-400 mt-1">Masuk kelas yang sama</p>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="status_lama" value="lulus" class="peer sr-only" {{ old('status_lama') == 'lulus' ? 'checked' : '' }}>
                        <div class="border-2 border-gray-200 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 rounded-xl p-4 text-center transition">
                            <p class="text-sm font-semibold text-gray-700">Lulus</p>
                            <p class="text-xs text-gray-400 mt-1">Tidak buat kelas baru</p>
                        </div>
                    </label>
                </div>
            </div>

        </div>

        <div class="space-y-5">
            <div class="bg-amber-50 rounded-2xl border border-amber-100 p-5">
                <p class="text-xs font-semibold text-amber-700 mb-2">Catatan Penting</p>
                <p class="text-xs text-amber-600 leading-relaxed">
                    Sistem tidak mengubah kelas lama. Data lama akan menjadi arsip, lalu sistem membuat data baru pada tahun ajaran baru.
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Contoh Hasil</p>
                <div class="space-y-2 text-xs text-gray-500">
                    <p>Budi — Kelas 1 — 2024/2025 — Naik</p>
                    <p>Budi — Kelas 2 — 2025/2026 — Aktif</p>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-blue-500 text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-blue-600 transition duration-200">
                    Proses Kenaikan
                </button>

                <a href="{{ route('admin.siswakelas.index') }}"
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
            </div>
        </div>

    </div>
</form>

@endsection