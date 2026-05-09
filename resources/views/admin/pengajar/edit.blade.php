@extends('layout.app')

@section('content')

@if(session('error'))
<div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
    <svg class="w-5 h-5 flex-shrink-0 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
    </svg>
    <p class="text-sm font-medium">{{ session('error') }}</p>
    <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

{{-- Top Bar --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.pengajar.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800">Edit Pengajar</h1>
        <p class="text-xs text-gray-400 mt-0.5">Perbarui penugasan mengajar</p>
    </div>
</div>

<div class="max-w-full">
    <form method="POST" action="{{ route('admin.pengajar.update', $pengajar) }}">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">

            {{-- Ringkasan penugasan saat ini --}}
            <div class="px-6 py-5 border-b border-gray-50 bg-cyan-50/40">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Penugasan saat ini</p>
                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-white border border-gray-200 text-gray-700 px-3 py-1.5 rounded-xl shadow-sm">
                        <div class="w-4 h-4 rounded-md bg-blue-50 flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                        </div>
                        {{ $pengajar->guru->nama ?? '—' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-white border border-gray-200 text-gray-700 px-3 py-1.5 rounded-xl shadow-sm">
                        <div class="w-4 h-4 rounded-md bg-indigo-50 flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25" />
                            </svg>
                        </div>
                        {{ $pengajar->kelas->nama_kelas ?? '—' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-white border border-gray-200 text-gray-700 px-3 py-1.5 rounded-xl shadow-sm">
                        <div class="w-4 h-4 rounded-md bg-violet-50 flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-violet-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75" />
                            </svg>
                        </div>
                        {{ $pengajar->mataPelajaran->nama ?? '—' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-white border border-gray-200 text-gray-700 px-3 py-1.5 rounded-xl shadow-sm">
                        <div class="w-4 h-4 rounded-md bg-amber-50 flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25" />
                            </svg>
                        </div>
                        {{ $pengajar->tahunAjaran->nama ?? '—' }}
                    </span>
                    @if($pengajar->is_active)
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-3 py-1.5 rounded-xl">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-gray-100 text-gray-500 px-3 py-1.5 rounded-xl">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            <div class="px-6 py-6 space-y-5">

                {{-- Guru --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                        Guru <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded-md bg-blue-50 flex items-center justify-center pointer-events-none">
                            <svg class="w-3 h-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0" />
                            </svg>
                        </div>
                        <select name="guru_id"
                            class="w-full pl-10 pr-4 py-2.5 border rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('guru_id') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                            <option value="">-- Pilih Guru --</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id', $pengajar->guru_id) == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('guru_id')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kelas & Mapel --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                            Kelas <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded-md bg-indigo-50 flex items-center justify-center pointer-events-none">
                                <svg class="w-3 h-3 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6Z" />
                                </svg>
                            </div>
                            <select name="kelas_id"
                                class="w-full pl-10 pr-4 py-2.5 border rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('kelas_id') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id', $pengajar->kelas_id) == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kelas_id')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                            Mata Pelajaran <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded-md bg-violet-50 flex items-center justify-center pointer-events-none">
                                <svg class="w-3 h-3 text-violet-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <select name="mata_pelajaran_id"
                                class="w-full pl-10 pr-4 py-2.5 border rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('mata_pelajaran_id') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                                <option value="">-- Pilih Mapel --</option>
                                @foreach($mataPelajarans as $mp)
                                    <option value="{{ $mp->id }}" {{ old('mata_pelajaran_id', $pengajar->mata_pelajaran_id) == $mp->id ? 'selected' : '' }}>
                                        {{ $mp->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('mata_pelajaran_id')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tahun Ajaran --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                        Tahun Ajaran <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded-md bg-amber-50 flex items-center justify-center pointer-events-none">
                            <svg class="w-3 h-3 text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                        </div>
                        <select name="tahun_ajaran_id"
                            class="w-full pl-10 pr-4 py-2.5 border rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white transition
    {{ $errors->has('tahun_ajaran_id') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            @foreach($tahunAjarans as $ta)
                                <option value="{{ $ta->id }}" {{ old('tahun_ajaran_id', $pengajar->tahun_ajaran_id) == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('tahun_ajaran_id')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status Aktif --}}
                <div class="flex items-center justify-between py-3.5 px-4 bg-gray-50 rounded-xl border border-gray-100">
                    <div>
                        <p class="text-xs font-semibold text-gray-700">Status Aktif</p>
                        <p class="text-xs text-gray-400 mt-0.5">Penugasan ini berlaku dan ditampilkan</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $pengajar->is_active) ? 'checked' : '' }}
                            class="sr-only peer">
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </div>

                {{-- Info duplikat --}}
                <div class="flex items-start gap-2.5 bg-amber-50 border border-amber-100 rounded-xl px-4 py-3">
                    <svg class="w-4 h-4 text-amber-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <p class="text-xs text-amber-700 leading-relaxed">
                        Kombinasi <strong>guru, kelas, mata pelajaran, dan tahun ajaran</strong> yang sama tidak dapat diduplikat.
                    </p>
                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.pengajar.index') }}"
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