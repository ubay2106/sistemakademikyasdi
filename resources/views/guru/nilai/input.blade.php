@extends('layout.app')

@section('page-title', 'Input Nilai')
@section('page-subtitle', 'Input nilai siswa untuk mata pelajaran yang diampu')

@section('content')

{{-- Info Semester & Pengajar --}}
<div class="flex flex-col sm:flex-row gap-3 mb-6">
    {{-- Semester Aktif --}}
    <div class="flex items-center gap-3 bg-primary/5 border border-primary/20 px-5 py-3 rounded-2xl flex-1">
        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Semester Aktif</p>
            <p class="text-sm font-semibold text-gray-700">
                {{ $semester->nama }}
                @if($semester->tahunAjaran)
                    · {{ $semester->tahunAjaran->nama }}
                @endif
            </p>
        </div>
        <span class="ml-auto inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1 rounded-full">
            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
            Aktif
        </span>
    </div>

    {{-- Info Kelas & Mapel --}}
    <div class="flex items-center gap-3 bg-blue-50 border border-blue-100 px-5 py-3 rounded-2xl flex-1">
        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25A8.967 8.967 0 0118 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Mata Pelajaran · Kelas</p>
            <p class="text-sm font-semibold text-gray-700">
                {{ $pengajar->mataPelajaran->nama ?? '—' }} · Kelas {{ $pengajar->kelas->nama ?? '—' }}
            </p>
        </div>
    </div>
</div>

{{-- Back + Info --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <h2 class="text-sm font-semibold text-gray-700">Daftar Siswa</h2>
        <p class="text-xs text-gray-400 mt-0.5">Isi nilai setiap siswa kemudian simpan</p>
    </div>
    <a href="{{ route('guru.nilai.index') }}"
        class="flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-700 border border-gray-200 px-4 py-2 rounded-xl hover:bg-gray-50 transition duration-200">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Kembali
    </a>
</div>

@if($siswaKelas->isEmpty())
<div class="bg-white rounded-2xl border border-gray-100 py-20 text-center">
    <div class="w-20 h-20 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
        <svg class="w-10 h-10 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
    </div>
    <p class="text-gray-400 font-medium">Tidak ada siswa aktif di kelas ini</p>
</div>
@else

<form action="{{ route('guru.nilai.simpan', $pengajar) }}" method="POST">
    @csrf
    <input type="hidden" name="semester_id" value="{{ $semester->id }}">

    {{-- Legend Header --}}
    <div class="hidden sm:grid grid-cols-12 gap-3 px-5 mb-2">
        <div class="col-span-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Nama Siswa</div>
        <div class="col-span-2 text-xs font-semibold text-gray-400 uppercase tracking-wide text-center">Harian</div>
        <div class="col-span-2 text-xs font-semibold text-gray-400 uppercase tracking-wide text-center">Tugas</div>
        <div class="col-span-2 text-xs font-semibold text-gray-400 uppercase tracking-wide text-center">UTS</div>
        <div class="col-span-2 text-xs font-semibold text-gray-400 uppercase tracking-wide text-center">UAS</div>
        <div class="col-span-1 text-xs font-semibold text-gray-400 uppercase tracking-wide text-center">Catatan</div>
    </div>

    @foreach($siswaKelas as $sk)
    @php $nilai = $nilais[$sk->siswa_id] ?? null; @endphp
    <div class="bg-white rounded-2xl border border-gray-100 p-5 mb-3 hover:shadow-sm transition-all duration-200">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
    <div class="sm:col-span-3">
        <p class="font-semibold text-gray-800 text-sm">
            {{ $sk->siswa->nama ?? '—' }}
        </p>
        <p class="text-xs text-gray-400">{{ $sk->siswa->nis ?? '' }}</p>
    </div>

    <div class="sm:col-span-2">
        <input type="number" name="nilai[{{ $sk->siswa_id }}][nilai_harian]"
            value="{{ old('nilai.'.$sk->siswa_id.'.nilai_harian', $nilai->nilai_harian ?? '') }}"
            min="0" max="100" step="0.01"
            class="w-full text-center text-sm border border-gray-200 rounded-xl px-3 py-2">
    </div>

    <div class="sm:col-span-2">
        <input type="number" name="nilai[{{ $sk->siswa_id }}][nilai_tugas]"
            value="{{ old('nilai.'.$sk->siswa_id.'.nilai_tugas', $nilai->nilai_tugas ?? '') }}"
            min="0" max="100" step="0.01"
            class="w-full text-center text-sm border border-gray-200 rounded-xl px-3 py-2">
    </div>

    <div class="sm:col-span-2">
        <input type="number" name="nilai[{{ $sk->siswa_id }}][nilai_uts]"
            value="{{ old('nilai.'.$sk->siswa_id.'.nilai_uts', $nilai->nilai_uts ?? '') }}"
            min="0" max="100" step="0.01"
            class="w-full text-center text-sm border border-gray-200 rounded-xl px-3 py-2">
    </div>

    <div class="sm:col-span-2">
        <input type="number" name="nilai[{{ $sk->siswa_id }}][nilai_uas]"
            value="{{ old('nilai.'.$sk->siswa_id.'.nilai_uas', $nilai->nilai_uas ?? '') }}"
            min="0" max="100" step="0.01"
            class="w-full text-center text-sm border border-gray-200 rounded-xl px-3 py-2">
    </div>
</div>
    </div>
    @endforeach

    {{-- Tombol Simpan --}}
    <div class="flex items-center justify-end gap-3 mt-6">
        <a href="{{ route('guru.nilai.index') }}"
            class="px-5 py-2.5 text-sm font-semibold text-gray-500 border border-gray-200 rounded-xl hover:bg-gray-50 transition duration-200">
            Batal
        </a>
        <button type="submit"
            class="inline-flex items-center gap-2 bg-primary text-white font-semibold text-sm px-6 py-2.5 rounded-xl hover:bg-green-700 transition duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Simpan Semua Nilai
        </button>
    </div>
</form>
@endif

<script>
function toggleCatatan(siswaId) {
    const el = document.getElementById('catatan-' + siswaId);
    el.classList.toggle('hidden');
}
</script>

@endsection