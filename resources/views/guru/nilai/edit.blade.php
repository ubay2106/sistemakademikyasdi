@extends('layout.app')

@section('page-title', 'Edit Nilai')
@section('page-subtitle', 'Edit nilai siswa')

@section('content')

<div class="bg-white rounded-2xl border border-gray-100 p-6">

    <div class="mb-6">
        <p class="text-sm text-gray-400">Siswa</p>
        <h2 class="text-lg font-bold text-gray-800">
            {{ $nilai->siswa->nama ?? '-' }}
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            {{ $nilai->pengajar->mataPelajaran->nama ?? '-' }}
            · Kelas {{ $nilai->pengajar->kelas->nama_kelas ?? '-' }}
            · {{ $nilai->semester->nama ?? '-' }}
        </p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4">
            @foreach($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('guru.nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-600">Nilai Harian</label>
                <input type="number" name="nilai_harian"
                    value="{{ old('nilai_harian', $nilai->nilai_harian) }}"
                    min="0" max="100" step="0.01"
                    class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">Nilai Tugas</label>
                <input type="number" name="nilai_tugas"
                    value="{{ old('nilai_tugas', $nilai->nilai_tugas) }}"
                    min="0" max="100" step="0.01"
                    class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">Nilai UTS</label>
                <input type="number" name="nilai_uts"
                    value="{{ old('nilai_uts', $nilai->nilai_uts) }}"
                    min="0" max="100" step="0.01"
                    class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">Nilai UAS</label>
                <input type="number" name="nilai_uas"
                    value="{{ old('nilai_uas', $nilai->nilai_uas) }}"
                    min="0" max="100" step="0.01"
                    class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2">
            </div>
        </div>

        <div class="mt-4">
            <label class="text-sm font-medium text-gray-600">Catatan</label>
            <textarea name="catatan" rows="3"
                class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2">{{ old('catatan', $nilai->catatan) }}</textarea>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('guru.nilai.lihat', $nilai->pengajar_id) }}"
                class="px-5 py-2.5 border border-gray-200 rounded-xl text-sm font-semibold text-gray-500">
                Batal
            </a>

            <button type="submit"
                class="px-5 py-2.5 bg-primary text-white rounded-xl text-sm font-semibold">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection