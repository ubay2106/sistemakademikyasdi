@extends('layout.app')

@section('content')

{{-- Top Bar --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.matapelajaran.index') }}"
        class="w-8 h-8 rounded-lg bg-white border border-gray-200 hover:bg-gray-50 flex items-center justify-center text-gray-400 hover:text-gray-600 transition flex-shrink-0">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800">Edit Mata Pelajaran</h1>
        <p class="text-xs text-gray-400 mt-0.5">Perbarui detail mata pelajaran</p>
    </div>
</div>

<div class="max-w-full">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-4 border-b border-gray-50 flex items-center gap-3">
            @php
                $colors = [
                    'A'=>'bg-rose-50 text-rose-500','B'=>'bg-orange-50 text-orange-500',
                    'C'=>'bg-amber-50 text-amber-500','D'=>'bg-yellow-50 text-yellow-500',
                    'E'=>'bg-lime-50 text-lime-600','F'=>'bg-green-50 text-green-600',
                    'G'=>'bg-teal-50 text-teal-500','H'=>'bg-cyan-50 text-cyan-500',
                    'I'=>'bg-sky-50 text-sky-500','J'=>'bg-blue-50 text-blue-500',
                    'K'=>'bg-indigo-50 text-indigo-500','L'=>'bg-violet-50 text-violet-500',
                    'M'=>'bg-purple-50 text-purple-500','N'=>'bg-fuchsia-50 text-fuchsia-500',
                    'O'=>'bg-pink-50 text-pink-500','P'=>'bg-rose-50 text-rose-500',
                ];
                $firstLetter = strtoupper(substr($matapelajaran->nama, 0, 1));
                $colorClass = $colors[$firstLetter] ?? 'bg-violet-50 text-violet-500';
            @endphp
            <div class="w-9 h-9 rounded-xl {{ $colorClass }} flex items-center justify-center font-bold text-sm flex-shrink-0">
                {{ $firstLetter }}
            </div>
            <div>
                <p class="text-sm font-bold text-gray-800">{{ $matapelajaran->nama }}</p>
                <p class="text-xs text-gray-400">
                    @if($matapelajaran->is_active)
                        <span class="inline-flex items-center gap-1 text-green-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span> Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 text-gray-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-300 inline-block"></span> Nonaktif
                        </span>
                    @endif
                </p>
            </div>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('admin.matapelajaran.update', $matapelajaran) }}" class="px-6 py-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                    Nama Mata Pelajaran <span class="text-red-400">*</span>
                </label>
                <input type="text" name="nama" value="{{ old('nama', $matapelajaran->nama) }}"
                    placeholder="Contoh: Matematika, IPA, Bahasa Indonesia..."
                    autofocus
                    class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
                        {{ $errors->has('nama') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                @error('nama')
                    <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                    Deskripsi
                    <span class="text-gray-300 font-normal ml-1">(opsional)</span>
                </label>
                <textarea name="deskripsi" rows="4"
                    placeholder="Deskripsi singkat tentang mata pelajaran ini..."
                    class="w-full px-4 py-2.5 border rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition resize-none
                        {{ $errors->has('deskripsi') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">{{ old('deskripsi', $matapelajaran->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Status Aktif --}}
            <div class="flex items-center justify-between py-3.5 px-4 bg-gray-50 rounded-xl border border-gray-100">
                <div>
                    <p class="text-xs font-semibold text-gray-700">Status Aktif</p>
                    <p class="text-xs text-gray-400 mt-0.5">Mapel bisa digunakan di jadwal</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active', $matapelajaran->is_active) ? 'checked' : '' }}
                        class="sr-only peer">
                    <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                </label>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 pt-1">
                <a href="{{ route('admin.matapelajaran.index') }}"
                    class="flex-1 flex items-center justify-center py-2.5 text-sm font-semibold text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 flex items-center justify-center gap-1.5 py-2.5 bg-blue-500 text-white text-sm font-semibold rounded-xl hover:bg-blue-600 transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                    </svg>
                    Perbarui Mapel
                </button>
            </div>
        </form>

    </div>
</div>

@endsection