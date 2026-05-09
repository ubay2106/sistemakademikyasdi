@extends('layout.app')

@section('title', 'Manajemen Akun')

@section('content')

    @if (session('success'))
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

    @if (session('error'))
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

    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-lg font-bold text-gray-800">Manajemen Akun</h1>
        <p class="text-xs text-gray-400 mt-0.5">Kelola password akun admin dan reset password akun guru</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-5 gap-6">

        {{-- ===== KOLOM KIRI: Akun Admin ===== --}}
        <div class="xl:col-span-2 space-y-5">

            {{-- Profil Admin --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-50 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-700">Profil Admin</h2>
                </div>

                <div class="p-6">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary/20 to-primary/5 border border-primary/20 flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-bold text-primary">
                                {{ strtoupper(substr($admin->name ?? $admin->username, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800 text-base">{{ $admin->name ?? $admin->username }}</p>
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-primary/10 text-primary px-2.5 py-0.5 rounded-full mt-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ ucfirst($admin->role) }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-sm py-2 border-b border-gray-50">
                            <span class="text-gray-400 text-xs">Username</span>
                            <span class="font-mono text-gray-700 font-medium text-xs">{{ $admin->username }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm py-2 border-b border-gray-50">
                            <span class="text-gray-400 text-xs">Role</span>
                            <span class="text-gray-700 text-xs font-medium">{{ ucfirst($admin->role) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm py-2">
                            <span class="text-gray-400 text-xs">Status</span>
                            @if ($admin->is_active)
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-green-50 text-green-700 px-2.5 py-0.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-gray-100 text-gray-500 px-2.5 py-0.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Ganti Password Admin --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-50 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center">
                        <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-700">Ganti Password Admin</h2>
                </div>

                <form action="{{ route('admin.account.update-password') }}" method="POST" class="p-6 space-y-4">
                    @csrf

                    {{-- Password Lama --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                            Password Lama <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password_lama" id="password_lama"
                                class="w-full border rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors {{ $errors->has('password_lama') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}"
                                placeholder="Masukkan password lama">
                            <button type="button" onclick="togglePassword('password_lama', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4 eye-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_lama')
                            <p class="text-xs text-red-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password Baru --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                            Password Baru <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password_baru" id="password_baru"
                                class="w-full border rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors {{ $errors->has('password_baru') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}"
                                placeholder="Min. 6 karakter">
                            <button type="button" onclick="togglePassword('password_baru', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4 eye-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_baru')
                            <p class="text-xs text-red-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                            Konfirmasi Password Baru <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password_baru_confirmation" id="password_baru_confirmation"
                                class="w-full border rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors border-gray-200 bg-white"
                                placeholder="Ulangi password baru">
                            <button type="button" onclick="togglePassword('password_baru_confirmation', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4 eye-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="pt-1">
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-colors shadow-sm shadow-primary/20">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                            </svg>
                            Perbarui Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ===== KOLOM KANAN: Reset Password Guru ===== --}}
        <div class="xl:col-span-3">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700">Reset Password Guru</h2>
                            <p class="text-xs text-gray-400">{{ $gurus->count() }} guru terdaftar</p>
                        </div>
                    </div>

                    {{-- Search guru --}}
                     <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <form method="GET"">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..."
                        class="pl-10 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition w-56 {{ request('search') ? 'pr-9' : 'pr-4' }}">
                </form>
                @if (request('search'))
                    <a href="{{ route('admin.account.index') }}"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 transition-colors"
                        title="Hapus pencarian">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
                </div>

                {{-- List Guru --}}
                <div class="divide-y divide-gray-50" id="guru-list">
                    @forelse ($gurus as $guru)
                        <div class="guru-row px-6 py-4 hover:bg-gray-50/60 transition-colors" data-nama="{{ strtolower($guru->nama) }}">
                            <div class="flex items-center gap-4">

                                {{-- Avatar --}}
                                <div class="flex-shrink-0">
                                    @if ($guru->foto)
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                            class="w-10 h-10 rounded-xl object-cover border border-gray-100">
                                    @else
                                        <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm flex-shrink-0
                                            {{ $guru->jenis_kelamin === 'P' ? 'bg-pink-50 text-pink-400' : 'bg-blue-50 text-blue-400' }}">
                                            {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>

                                {{-- Info --}}
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $guru->nama }}</p>
                                    <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                                        @if ($guru->user)
                                            @if ($guru->user->is_active)
                                                <span class="inline-flex items-center gap-1 text-[10px] font-semibold bg-green-50 text-green-600 px-2 py-0.5 rounded-full">
                                                    <span class="w-1 h-1 rounded-full bg-green-500"></span>Aktif
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 text-[10px] font-semibold bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full">
                                                    <span class="w-1 h-1 rounded-full bg-gray-400"></span>Nonaktif
                                                </span>
                                            @endif
                                        @else
                                            <span class="text-[10px] font-semibold bg-red-50 text-red-400 px-2 py-0.5 rounded-full">Belum punya akun</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Tombol Reset --}}
                                @if ($guru->user)
                                    <button
                                        onclick="openModal({{ $guru->id }}, '{{ addslashes($guru->nama) }}', '{{ route('admin.account.reset-password-guru', $guru) }}')"
                                        class="flex-shrink-0 flex items-center gap-1.5 text-xs font-semibold text-blue-500 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                                        </svg>
                                        Reset
                                    </button>
                                @else
                                    <span class="flex-shrink-0 text-xs text-gray-300 px-3 py-1.5">—</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-16 text-center">
                            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                            </div>
                            <p class="text-gray-400 text-sm font-medium">Belum ada data guru</p>
                        </div>
                    @endforelse
                </div>

                {{-- Empty state search --}}
                <div id="no-result" class="hidden px-6 py-12 text-center">
                    <p class="text-gray-400 text-sm">Guru tidak ditemukan.</p>
                </div>

            </div>
        </div>

    </div>

    {{-- ===== MODAL Reset Password Guru ===== --}}
    <div id="modal-reset" class="fixed inset-0 z-50 hidden items-center justify-center px-4"
        style="background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">

            {{-- Modal Header --}}
            <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4.5 h-4.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-gray-800">Reset Password Guru</h3>
                    <p id="modal-guru-name" class="text-xs text-gray-400 mt-0.5"></p>
                </div>
                <button onclick="closeModal()" class="w-7 h-7 rounded-lg flex items-center justify-center text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <form id="modal-form" method="POST" class="p-6 space-y-4">
                @csrf

                <div class="p-3 bg-amber-50 border border-amber-100 rounded-xl flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <p class="text-xs text-amber-700 leading-relaxed">Password lama guru akan diganti. Pastikan guru diberitahu password barunya.</p>
                </div>

                {{-- Password Baru --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" name="password_baru" id="modal-pw"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors bg-white"
                            placeholder="Min. 6 karakter" required minlength="6">
                        <button type="button" onclick="togglePassword('modal-pw', this)"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-4 h-4 eye-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Konfirmasi --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" name="password_baru_confirmation" id="modal-pw-confirm"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors bg-white"
                            placeholder="Ulangi password baru" required>
                        <button type="button" onclick="togglePassword('modal-pw-confirm', this)"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-4 h-4 eye-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-1">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 transition-colors shadow-sm shadow-blue-500/20">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 0 1 21.75 8.25Z" />
                        </svg>
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const icon = btn.querySelector('.eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
            } else {
                input.type = 'password';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
            }
        }

        function openModal(id, nama, action) {
            document.getElementById('modal-guru-name').textContent = nama;
            document.getElementById('modal-form').action = action;
            document.getElementById('modal-pw').value = '';
            document.getElementById('modal-pw-confirm').value = '';
            const modal = document.getElementById('modal-reset');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modal-reset');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.getElementById('modal-reset').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });

        document.getElementById('search-guru').addEventListener('input', function() {
            const q = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('.guru-row');
            let found = 0;
            rows.forEach(row => {
                const match = row.dataset.nama.includes(q);
                row.style.display = match ? '' : 'none';
                if (match) found++;
            });
            document.getElementById('no-result').classList.toggle('hidden', found > 0);
        });
    </script>

@endsection