<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan Darul Istiqlal</title>
    <link rel="icon" type="image" href="{{ asset('img/logo.png') }}" />
    @vite('resources/css/app.css')

</head>

<body class="min-h-screen flex bg-gray-100">

    <div class="hidden lg:flex lg:w-[52%] xl:w-[55%] bg-gray-900 relative overflow-hidden flex-col">

        <div class="dot-grid absolute inset-0"></div>

        <div class="absolute top-[-80px] right-[-80px] w-80 h-80 rounded-full bg-green-500/10 blur-3xl"></div>
        <div class="absolute bottom-[-60px] left-[-60px] w-64 h-64 rounded-full bg-green-400/8 blur-2xl"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full border border-white/5">
        </div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full border border-white/[0.03]">
        </div>

        {{-- Content --}}
        <div class="relative flex-1 flex flex-col justify-center items-center px-12 xl:px-20 text-center">

            {{-- Logo --}}
            <div class="animate-float mb-10 relative">
                <div class="pulse-ring absolute inset-0 rounded-full bg-green-400/20 scale-110"></div>
                <div
                    class="relative w-28 h-28 rounded-full bg-white/10 border border-white/20 flex items-center justify-center backdrop-blur-sm">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Yayasan Darul Istiqlal"
                        class="w-20 h-20 object-contain p-2">
                </div>
            </div>

            {{-- Headline --}}
            <h1 class="text-white font-bold text-3xl xl:text-4xl leading-tight mb-3">
                Yayasan <span class="text-green-400">Darul Istiqlal</span>
            </h1>
            <p class="text-white/40 text-sm xl:text-base leading-relaxed max-w-xs">
                Bilapora Rebba, Kec. Lenteng<br>Kab. Sumenep, Jawa Timur
            </p>

            <div class="flex items-center gap-3 mt-8">
                <span
                    class="flex items-center gap-1.5 bg-green-400/15 border border-green-400/25 text-green-400 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span> RA
                </span>
                <span
                    class="flex items-center gap-1.5 bg-green-400/15 border border-green-400/25 text-green-400 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span> MI
                </span>
                <span
                    class="flex items-center gap-1.5 bg-green-400/15 border border-green-400/25 text-green-400 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span> MTs
                </span>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-12 w-full max-w-sm">
                <div class="bg-white/5 border border-white/10 rounded-2xl py-4 px-3">
                    <p class="text-white font-bold text-2xl">3</p>
                    <p class="text-white/40 text-xs mt-0.5">Unit</p>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-2xl py-4 px-3">
                    <p class="text-green-400 font-bold text-2xl">∞</p>
                    <p class="text-white/40 text-xs mt-0.5">Prestasi</p>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-2xl py-4 px-3">
                    <p class="text-white font-bold text-2xl">1</p>
                    <p class="text-white/40 text-xs mt-0.5">Visi</p>
                </div>
            </div>
        </div>

        {{-- Footer left --}}
        <div class="relative px-12 xl:px-20 pb-8">
            <p class="text-white/20 text-xs text-center">
                &copy; {{ date('Y') }} Yayasan Darul Istiqlal. All rights reserved.
            </p>
        </div>
    </div>

    <div class="flex-1 flex flex-col justify-center items-center px-6 py-12 bg-gray-50">

        <div class="flex flex-col items-center mb-8 lg:hidden animate-fade-up">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-16 h-16 object-contain mb-3">
            <h2 class="text-gray-800 font-bold text-xl">Yayasan Darul Istiqlal</h2>
        </div>

        <div class="w-full max-w-sm">

            <div class="mb-8 animate-fade-up">
                <h2 class="text-gray-900 font-bold text-2xl xl:text-3xl leading-tight">Selamat datang</h2>
                <p class="text-gray-400 text-sm mt-1.5">Silakan login untuk mengakses layanan kami</p>
            </div>

            {{-- Form --}}
            <form method="POST" action="" class="space-y-4 animate-fade-up-delay">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Username
                    </label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            placeholder="Masukkan username" autocomplete="username"
                            class="input-field w-full pl-10 pr-4 py-3 border rounded-xl text-sm text-gray-800 placeholder-gray-400
        {{ $errors->has('username') ? 'bg-red-50 border-red-400' : 'bg-white border-gray-200' }}">
                    </div>
                    @error('username')
                        <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Masukkan password"
                            autocomplete="current-password"
                            class="input-field w-full pl-10 pr-12 py-3 border rounded-xl text-sm text-gray-800 placeholder-gray-400
        {{ $errors->has('password') ? 'bg-red-50 border-red-400' : 'bg-white border-gray-200' }}">
                        {{-- Toggle password visibility --}}
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                            <svg id="eye-icon" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg id="eye-off-icon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit"
                        class="btn-login w-full flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold text-sm py-3.5 px-6 rounded-xl">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                        Masuk
                    </button>
                </div>
            </form>

            {{-- Footer --}}
            <p class="animate-fade-up-delay2 text-center text-xs text-gray-400 mt-8">
                &copy; {{ date('Y') }} Yayasan Darul Istiqlal &mdash; Admin Panel
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }

        // Fix toggle password visual state on page load
        const passwordInput = document.getElementById('password');
        const rememberCheckbox = document.getElementById('remember');
        // Make the toggle work with the peer class for the checkbox
        rememberCheckbox.addEventListener('change', function() {
            const dot = this.closest('label').querySelector('.absolute');
            // Tailwind peer handles this automatically
        });
    </script>
</body>

</html>
