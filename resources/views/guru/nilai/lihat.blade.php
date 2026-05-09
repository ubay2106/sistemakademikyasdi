@extends('layout.app')

@section('page-title', 'Detail Nilai')
@section('page-subtitle', 'Daftar nilai siswa berdasarkan mata pelajaran dan semester aktif')

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

{{-- Info Bar --}}
<div class="flex flex-col sm:flex-row gap-3 mb-6">
    <div class="flex items-center gap-3 bg-primary/5 border border-primary/20 px-5 py-3 rounded-2xl flex-1">
        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25A8.967 8.967 0 0118 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Mata Pelajaran · Kelas</p>
            <p class="text-sm font-semibold text-gray-700">
                {{ $pengajar->mataPelajaran->nama ?? '—' }} · Kelas {{ $pengajar->kelas->nama_kelas ?? '—' }}
            </p>
        </div>
    </div>

    <div class="flex items-center gap-3 bg-blue-50 border border-blue-100 px-5 py-3 rounded-2xl sm:w-56">
        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Semester Aktif</p>
            <p class="text-sm font-semibold text-gray-700">{{ $semester->nama ?? '—' }}</p>
        </div>
    </div>

    {{-- Rata-rata --}}
    @if($rataRata !== null)
    <div class="flex items-center gap-3 px-5 py-3 rounded-2xl sm:w-48
        {{ $rataRata >= 75 ? 'bg-green-50 border border-green-100' : ($rataRata >= 60 ? 'bg-amber-50 border border-amber-100' : 'bg-red-50 border border-red-100') }}">
        <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0
            {{ $rataRata >= 75 ? 'bg-green-100' : ($rataRata >= 60 ? 'bg-amber-100' : 'bg-red-100') }}">
            <svg class="w-4 h-4 {{ $rataRata >= 75 ? 'text-green-600' : ($rataRata >= 60 ? 'text-amber-600' : 'text-red-600') }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400">Rata-rata Kelas</p>
            <p class="text-sm font-bold {{ $rataRata >= 75 ? 'text-green-700' : ($rataRata >= 60 ? 'text-amber-700' : 'text-red-700') }}">
                {{ number_format($rataRata, 2) }}
            </p>
        </div>
    </div>
    @endif
</div>

{{-- Header & Back --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <h2 class="text-sm font-semibold text-gray-700">Daftar Nilai Siswa</h2>
        <p class="text-xs text-gray-400 mt-0.5">Diurutkan berdasarkan nilai akhir tertinggi</p>
    </div>
    <a href="{{ route('guru.nilai.rekap') }}"
        class="flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-700 border border-gray-200 px-4 py-2 rounded-xl hover:bg-gray-50 transition duration-200">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Rekap
    </a>
</div>

@forelse($nilais as $index => $nilai)
@php
    $rank = ($nilais->currentPage() - 1) * $nilais->perPage() + $loop->iteration;
    $na = $nilai->nilai_akhir;
    $badgeColor = $na >= 75 ? 'text-green-700 bg-green-50 border-green-100'
                : ($na >= 60 ? 'text-amber-700 bg-amber-50 border-amber-100'
                : 'text-red-700 bg-red-50 border-red-100');
@endphp
<div class="bg-white rounded-2xl border border-gray-100 p-5 mb-3 hover:shadow-sm transition-all duration-200 group">
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">

        {{-- Rank + Nama --}}
        <div class="flex items-center gap-4 flex-1 min-w-0">
            {{-- Rank badge --}}
            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 text-xs font-bold
                {{ $rank === 1 ? 'bg-yellow-100 text-yellow-700' : ($rank === 2 ? 'bg-gray-100 text-gray-500' : ($rank === 3 ? 'bg-orange-100 text-orange-600' : 'bg-gray-50 text-gray-400')) }}">
                {{ $rank }}
            </div>
            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0 font-bold text-primary text-sm group-hover:bg-primary group-hover:text-white transition-all duration-300">
                {{ strtoupper(substr($nilai->siswa->nama ?? 'S', 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="font-bold text-gray-800 text-sm truncate">{{ $nilai->siswa->nama ?? '—' }}</p>
                <p class="text-xs text-gray-400">{{ $nilai->siswa->nis ?? '' }}</p>
            </div>
        </div>

        {{-- Nilai Detail --}}
        <div class="flex flex-wrap items-center gap-2 sm:gap-3">
            @foreach([['Harian', $nilai->nilai_harian], ['Tugas', $nilai->nilai_tugas], ['UTS', $nilai->nilai_uts], ['UAS', $nilai->nilai_uas]] as [$label, $val])
            <div class="flex flex-col items-center bg-gray-50 rounded-xl px-3 py-2 min-w-[52px]">
                <span class="text-xs text-gray-400 font-medium">{{ $label }}</span>
                <span class="text-sm font-bold text-gray-700 mt-0.5">{{ $val ?? '—' }}</span>
            </div>
            @endforeach

            {{-- Nilai Akhir --}}
            <div class="flex flex-col items-center rounded-xl px-3 py-2 border min-w-[60px] {{ $na !== null ? $badgeColor : 'bg-gray-50 border-gray-100 text-gray-400' }}">
                <span class="text-xs font-medium">Rata-rata</span>
                <span class="text-sm font-bold mt-0.5">{{ $na !== null ? number_format($na, 2) : '—' }}</span>
            </div>
        </div>

        {{-- Aksi --}}
        <div class="flex items-center gap-2 flex-shrink-0">
            <a href="{{ route('guru.nilai.edit', $nilai) }}"
                class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary border border-primary/30 px-4 py-2 rounded-xl hover:bg-primary hover:text-white transition duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                </svg>
                Edit
            </a>

            {{-- Tombol Hapus --}}
            <form action="{{ route('guru.nilai.destroy', $nilai) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus nilai siswa ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-red-500 border border-red-200 px-4 py-2 rounded-xl hover:bg-red-500 hover:text-white transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    Hapus
                </button>
            </form>
        </div>
    </div>

    {{-- Catatan jika ada --}}
    @if($nilai->catatan)
    <div class="mt-3 flex items-start gap-2 bg-amber-50 border border-amber-100 rounded-xl px-4 py-2.5">
        <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
        </svg>
        <p class="text-xs text-amber-700">{{ $nilai->catatan }}</p>
    </div>
    @endif
</div>
@empty
<div class="bg-white rounded-2xl border border-gray-100 py-20 text-center">
    <div class="w-20 h-20 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
        <svg class="w-10 h-10 text-gray-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 19.5m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5" />
        </svg>
    </div>
    <p class="text-gray-400 font-medium">Belum ada nilai yang diinput</p>
    <p class="text-gray-300 text-sm mt-1">Silakan input nilai melalui halaman Input Nilai</p>
    <a href="{{ route('guru.nilai.index') }}"
        class="inline-flex items-center gap-2 mt-4 bg-primary text-white font-semibold text-sm px-5 py-2.5 rounded-xl hover:bg-green-700 transition duration-200">
        Input Nilai Sekarang
    </a>
</div>
@endforelse

@if($nilais->hasPages())
<div class="mt-4">{{ $nilais->links() }}</div>
@endif

@endsection