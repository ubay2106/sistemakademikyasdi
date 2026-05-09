@extends('layout.app')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas mengajar Anda')

@section('content')


{{-- Greeting --}}
<div class="bg-gradient-to-r from-primary to-green-700 rounded-2xl p-6 mb-6 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-48 h-48 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4"></div>
    <div class="absolute right-16 bottom-0 w-32 h-32 bg-white/5 rounded-full translate-y-1/2"></div>
    <div class="relative flex items-center gap-5">
        {{-- Foto --}}
        @if($guru?->foto)
            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                class="w-16 h-16 rounded-2xl object-cover ring-2 ring-white/30 flex-shrink-0">
        @else
            <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center flex-shrink-0">
                <span class="text-white font-bold text-3xl">{{ strtoupper(substr($guru?->nama ?? 'G', 0, 1)) }}</span>
            </div>
        @endif
        <div>
            <p class="text-white/70 text-sm">Selamat datang,</p>
            <h2 class="text-white font-bold text-xl leading-tight">{{ $guru?->nama ?? auth()->user()->name }}</h2>
            @if($guru?->nip)
            <p class="text-white/60 text-xs font-mono mt-0.5">NIP: {{ $guru->nip }}</p>
            @endif
            @if($tahunAktif)
            <span class="inline-flex items-center gap-1 mt-2 text-xs bg-white/20 text-white px-2.5 py-1 rounded-full font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-green-300 animate-pulse"></span>
                Tahun Ajaran {{ $tahunAktif->nama }} · Aktif
            </span>
            @endif
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

    {{-- Total Mata Pelajaran --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm text-gray-400">Mata Pelajaran Diampu</p>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">
            {{ $totalMapel }}
        </h2>
    </div>

    {{-- Total Kelas --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm text-gray-400">Kelas Diampu</p>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">
            {{ $totalKelas }}
        </h2>
    </div>

    {{-- Total Siswa --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm text-gray-400">Siswa Diampu</p>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">
            {{ $totalSiswa }}
        </h2>
    </div>

</div>

{{-- Akses Cepat --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

    {{-- Input Nilai --}}
    <a href="{{ route('guru.nilai.index') }}"
        class="group bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg hover:border-primary/20 transition-all duration-300 flex items-center gap-5">
        <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:scale-105 transition-all duration-300">
            <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
        </div>
        <div>
            <h3 class="font-bold text-gray-800 group-hover:text-primary transition-colors">Input Nilai Siswa</h3>
            <p class="text-sm text-gray-400 mt-0.5">Masukkan nilai untuk mata pelajaran yang Anda ampu</p>
        </div>
        <svg class="w-5 h-5 text-gray-300 group-hover:text-primary ml-auto transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>
    </a>

    {{-- Lihat Nilai --}}
    <a href="{{ route('guru.nilai.rekap') }}"
        class="group bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg hover:border-blue-200 transition-all duration-300 flex items-center gap-5">
        <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-500 group-hover:scale-105 transition-all duration-300">
            <svg class="w-7 h-7 text-blue-500 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 19.5m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c-.621 0-1.125.504-1.125 1.125v1.5m2.25-2.625h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5" />
            </svg>
        </div>
        <div>
            <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Rekap Nilai</h3>
            <p class="text-sm text-gray-400 mt-0.5">Lihat dan kelola nilai yang sudah diinput</p>
        </div>
        <svg class="w-5 h-5 text-gray-300 group-hover:text-blue-500 ml-auto transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>
    </a>
</div>


@endsection