@extends('layout.app')

@section('content')
    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.nilai.index') }}"
            class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 transition flex-shrink-0">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </a>
        <div>
            <h1 class="text-lg font-bold text-gray-800">Edit Nilai Siswa</h1>
            <p class="text-xs text-gray-400 mt-0.5">Perbarui nilai harian, tugas, UTS, dan UAS</p>
        </div>
    </div>

    @if (session('error'))
        <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
            <svg class="w-5 h-5 flex-shrink-0 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <p class="text-sm font-medium">{{ session('error') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.nilai.update', $nilai) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

            {{-- Left Column: Identitas --}}
            <div class="lg:col-span-1 flex flex-col gap-5">

                {{-- Identitas Read Only --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h2 class="text-sm font-bold text-gray-700 mb-4">Identitas Nilai</h2>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5">Siswa</label>
                        <div
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl text-sm text-gray-700 px-3.5 py-2.5">
                            {{ $nilai->siswa->nama ?? '-' }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5">Mata Pelajaran / Kelas /
                            Guru</label>
                        <div
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl text-sm text-gray-700 px-3.5 py-2.5">
                            {{ $nilai->pengajar->mataPelajaran->nama ?? '-' }}
                            —
                            {{ $nilai->pengajar->kelas->nama_kelas ?? '-' }}
                            —
                            {{ $nilai->pengajar->guru->nama ?? '-' }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5">Semester</label>
                        <div
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl text-sm text-gray-700 px-3.5 py-2.5">
                            {{ $nilai->semester->nama ?? '-' }}
                            —
                            {{ $nilai->semester->tahunAjaran->nama ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Nilai --}}
            <div class="lg:col-span-2 flex flex-col gap-5">

                {{-- Input Nilai --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h2 class="text-sm font-bold text-gray-700 mb-5 flex items-center gap-2">
                        <div class="w-6 h-6 bg-blue-50 rounded-lg flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                        Komponen Nilai
                    </h2>

                    <div class="grid grid-cols-2 gap-4">

                        {{-- Nilai Harian --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">
                                Nilai Harian
                                <span class="text-gray-400 font-normal">(0–100)</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded bg-violet-50 flex items-center justify-center">
                                    <span class="text-xs font-bold text-violet-500">H</span>
                                </div>
                                <input type="number" name="nilai_harian" id="nilai_harian"
                                    value="{{ old('nilai_harian', $nilai->nilai_harian) }}" min="0" max="100"
                                    step="0.01" placeholder="0 – 100"
                                    class="w-full pl-10 pr-4 py-3 border rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition font-semibold {{ $errors->has('nilai_harian') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                            </div>
                            @error('nilai_harian')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <div class="h-1 bg-gray-100 rounded-full mt-2 overflow-hidden">
                                <div id="mini-bar-nilai_harian"
                                    class="bg-violet-300 h-full rounded-full transition-all duration-300"
                                    style="width: {{ $nilai->nilai_harian ?? 0 }}%"></div>
                            </div>
                        </div>

                        {{-- Nilai Tugas --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">
                                Nilai Tugas
                                <span class="text-gray-400 font-normal">(0–100)</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded bg-blue-50 flex items-center justify-center">
                                    <span class="text-xs font-bold text-blue-500">T</span>
                                </div>
                                <input type="number" name="nilai_tugas" id="nilai_tugas"
                                    value="{{ old('nilai_tugas', $nilai->nilai_tugas) }}" min="0" max="100"
                                    step="0.01" placeholder="0 – 100"
                                    class="w-full pl-10 pr-4 py-3 border rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition font-semibold {{ $errors->has('nilai_tugas') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                            </div>
                            @error('nilai_tugas')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <div class="h-1 bg-gray-100 rounded-full mt-2 overflow-hidden">
                                <div id="mini-bar-nilai_tugas"
                                    class="bg-blue-300 h-full rounded-full transition-all duration-300"
                                    style="width: {{ $nilai->nilai_tugas ?? 0 }}%"></div>
                            </div>
                        </div>

                        {{-- Nilai UTS --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">
                                Nilai UTS
                                <span class="text-gray-400 font-normal">(0–100)</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded bg-amber-50 flex items-center justify-center">
                                    <span class="text-xs font-bold text-amber-500">U</span>
                                </div>
                                <input type="number" name="nilai_uts" id="nilai_uts"
                                    value="{{ old('nilai_uts', $nilai->nilai_uts) }}" min="0" max="100"
                                    step="0.01" placeholder="0 – 100"
                                    class="w-full pl-10 pr-4 py-3 border rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition font-semibold {{ $errors->has('nilai_uts') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                            </div>
                            @error('nilai_uts')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <div class="h-1 bg-gray-100 rounded-full mt-2 overflow-hidden">
                                <div id="mini-bar-nilai_uts"
                                    class="bg-amber-300 h-full rounded-full transition-all duration-300"
                                    style="width: {{ $nilai->nilai_uts ?? 0 }}%"></div>
                            </div>
                        </div>

                        {{-- Nilai UAS --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">
                                Nilai UAS
                                <span class="text-gray-400 font-normal">(0–100)</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 rounded bg-emerald-50 flex items-center justify-center">
                                    <span class="text-xs font-bold text-emerald-500">A</span>
                                </div>
                                <input type="number" name="nilai_uas" id="nilai_uas"
                                    value="{{ old('nilai_uas', $nilai->nilai_uas) }}" min="0" max="100"
                                    step="0.01" placeholder="0 – 100"
                                    class="w-full pl-10 pr-4 py-3 border rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition font-semibold {{ $errors->has('nilai_uas') ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
                            </div>
                            @error('nilai_uas')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <div class="h-1 bg-gray-100 rounded-full mt-2 overflow-hidden">
                                <div id="mini-bar-nilai_uas"
                                    class="bg-emerald-300 h-full rounded-full transition-all duration-300"
                                    style="width: {{ $nilai->nilai_uas ?? 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h2 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                        <div class="w-6 h-6 bg-gray-50 rounded-lg flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </div>
                        Catatan <span class="text-gray-400 font-normal text-xs">(opsional)</span>
                    </h2>
                    <textarea name="catatan" rows="3" placeholder="Catatan tambahan untuk nilai siswa ini..."
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl text-sm text-gray-700 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none">{{ old('catatan', $nilai->catatan) }}</textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('admin.nilai.index') }}"
                        class="flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-gray-700 py-2.5 px-5 rounded-xl border border-gray-200 hover:border-gray-300 bg-white transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                        class="flex items-center gap-2 bg-primary text-white font-semibold text-sm py-2.5 px-6 rounded-xl hover:bg-green-700 transition duration-200 shadow-sm shadow-green-100">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>

        </div>
    </form>

    <script>
        const inputs = ['nilai_harian', 'nilai_tugas', 'nilai_uts', 'nilai_uas'];

        function getGrade(na) {
            if (na >= 90) return {
                grade: 'A',
                cls: 'bg-emerald-50 text-emerald-700'
            };
            if (na >= 80) return {
                grade: 'B',
                cls: 'bg-blue-50 text-blue-700'
            };
            if (na >= 70) return {
                grade: 'C',
                cls: 'bg-amber-50 text-amber-700'
            };
            if (na >= 60) return {
                grade: 'D',
                cls: 'bg-orange-50 text-orange-600'
            };
            return {
                grade: 'E',
                cls: 'bg-red-50 text-red-500'
            };
        }

        function updatePreview() {
            const vals = inputs.map(id => {
                const v = parseFloat(document.getElementById(id)?.value);
                return isNaN(v) ? null : Math.min(100, Math.max(0, v));
            }).filter(v => v !== null);

            const previewNilai = document.getElementById('preview-nilai');
            const previewGrade = document.getElementById('preview-grade');

            if (vals.length === 0) {
                previewNilai.textContent = '—';
                previewGrade.textContent = 'Grade: —';
                previewGrade.className = 'mt-3 text-sm font-bold px-4 py-1.5 rounded-xl bg-gray-100 text-gray-400';
                return;
            }

            const avg = vals.reduce((a, b) => a + b, 0) / vals.length;
            const rounded = Math.round(avg * 100) / 100;
            const {
                grade,
                cls
            } = getGrade(rounded);

            previewNilai.textContent = rounded;
            previewGrade.textContent = 'Grade: ' + grade;
            previewGrade.className = 'mt-3 text-sm font-bold px-4 py-1.5 rounded-xl ' + cls;
        }

        function updateBars() {
            inputs.forEach(id => {
                const v = parseFloat(document.getElementById(id)?.value) || 0;
                const bar = document.getElementById('bar-' + id);
                const barLabel = document.getElementById('bar-label-' + id);
                const miniBar = document.getElementById('mini-bar-' + id);
                if (bar) bar.style.width = Math.min(100, v) + '%';
                if (barLabel) barLabel.textContent = v > 0 ? v : '—';
                if (miniBar) miniBar.style.width = Math.min(100, v) + '%';
            });
        }

        inputs.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', () => {
                    updatePreview();
                    updateBars();
                });
            }
        });
    </script>
@endsection
