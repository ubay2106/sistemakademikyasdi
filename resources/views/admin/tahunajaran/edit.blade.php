@extends('layout.app')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.tahunajaran.index') }}"
        class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:border-gray-300 transition">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </a>
    <div>
        <h1 class="text-lg font-bold text-gray-800 leading-none">Edit Tahun Ajaran</h1>
        <p class="text-xs text-gray-400 mt-0.5">Perbarui detail tahun ajaran</p>
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

<form method="POST" action="{{ route('admin.tahunajaran.update', $tahunajaran) }}">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri --}}
        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-blue-500 rounded-full"></span>
                    Informasi Tahun Ajaran
                </h3>

                <div class="space-y-4">

                    {{-- Nama --}}
                    <div>
                        <label for="nama" class="block text-xs font-medium text-gray-500 mb-1.5">
                            Nama Tahun Ajaran <span class="text-red-400">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $tahunajaran->nama) }}"
                            placeholder="cth: 2024/2025"
                            maxlength="20"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 focus:bg-white transition font-mono
                                {{ $errors->has('nama') ? 'border-red-300 bg-red-50' : '' }}">
                        <p class="text-xs text-gray-400 mt-1">Format umum: 2024/2025 · Maks. 20 karakter</p>
                        @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tanggal Mulai & Selesai --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tanggal_mulai" class="block text-xs font-medium text-gray-500 mb-1.5">
                                Tanggal Mulai
                            </label>
                            <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                                value="{{ old('tanggal_mulai', $tahunajaran->tanggal_mulai ? \Carbon\Carbon::parse($tahunajaran->tanggal_mulai)->format('Y-m-d') : '') }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 focus:bg-white transition
                                    {{ $errors->has('tanggal_mulai') ? 'border-red-300 bg-red-50' : '' }}">
                            @error('tanggal_mulai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="tanggal_selesai" class="block text-xs font-medium text-gray-500 mb-1.5">
                                Tanggal Selesai
                            </label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                value="{{ old('tanggal_selesai', $tahunajaran->tanggal_selesai ? \Carbon\Carbon::parse($tahunajaran->tanggal_selesai)->format('Y-m-d') : '') }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 focus:bg-white transition
                                    {{ $errors->has('tanggal_selesai') ? 'border-red-300 bg-red-50' : '' }}">
                            @error('tanggal_selesai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Preview Durasi --}}
                    <div id="durasi-preview" class="hidden items-center gap-2 bg-blue-50 border border-blue-100 rounded-xl px-4 py-3">
                        <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-xs text-blue-600 font-medium" id="durasi-text"></p>
                    </div>

                </div>
            </div>

        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-5">

            {{-- Badge status saat ini --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Status Saat Ini</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                        {{ $tahunajaran->is_active ? 'bg-primary text-white' : 'bg-gray-100 text-gray-400' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-800">{{ $tahunajaran->nama }}</p>
                        @if($tahunajaran->is_active)
                            <span class="inline-flex items-center gap-1 text-xs text-primary font-medium mt-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                Sedang aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-xs text-gray-400 mt-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                                Tidak aktif
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Status Aktif --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Ubah Status</h3>

                <label class="cursor-pointer block">
                    <div class="flex items-start gap-3 border-2 border-gray-200 rounded-xl p-4 transition
                        has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                        <div class="relative mt-0.5">
                            <input type="checkbox" id="is_active" name="is_active" value="1"
                                class="peer sr-only" {{ old('is_active', $tahunajaran->is_active) ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 peer-checked:bg-primary rounded-full transition"></div>
                            <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-4 shadow-sm"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Jadikan Tahun Ajaran Aktif</p>
                            <p class="text-xs text-gray-400 leading-relaxed mt-0.5">
                                Tahun ajaran lain akan otomatis dinonaktifkan jika opsi ini dipilih.
                            </p>
                        </div>
                    </div>
                </label>

                @error('is_active') <p class="text-xs text-red-500 mt-2">{{ $message }}</p> @enderror
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
                        <p class="text-xs text-amber-600 leading-relaxed">Hanya boleh ada <strong>satu</strong> tahun ajaran yang aktif dalam satu waktu. Mengaktifkan tahun ajaran ini akan menonaktifkan yang lain secara otomatis.</p>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col gap-2">
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-blue-500 text-white font-semibold text-sm py-3 px-5 rounded-xl hover:bg-blue-600 transition duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                    </svg>
                    Perbarui Tahun Ajaran
                </button>
                <a href="{{ route('admin.tahunajaran.index') }}"
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-600 font-semibold text-sm py-3 px-5 rounded-xl hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
            </div>

        </div>
    </div>
</form>

@push('scripts')
<script>
    const mulaiInput   = document.getElementById('tanggal_mulai');
    const selesaiInput = document.getElementById('tanggal_selesai');
    const preview      = document.getElementById('durasi-preview');
    const previewText  = document.getElementById('durasi-text');

    function hitungDurasi() {
        const mulai   = mulaiInput.value;
        const selesai = selesaiInput.value;
        if (mulai && selesai && selesai >= mulai) {
            const a = new Date(mulai);
            const b = new Date(selesai);
            const bulan = (b.getFullYear() - a.getFullYear()) * 12 + (b.getMonth() - a.getMonth());
            const hari  = Math.round((b - a) / (1000 * 60 * 60 * 24));
            previewText.textContent = `Durasi: ±${bulan} bulan (${hari} hari)`;
            preview.classList.remove('hidden');
            preview.classList.add('flex');
        } else {
            preview.classList.add('hidden');
            preview.classList.remove('flex');
        }
    }

    // Jalankan saat halaman load jika data sudah ada
    hitungDurasi();

    mulaiInput.addEventListener('change', hitungDurasi);
    selesaiInput.addEventListener('change', hitungDurasi);
</script>
@endpush

@endsection