@extends('layout.main')
@section('content')
    <section class="relative pt-36 pb-12 overflow-hidden"
        style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 40%, #1a6b3a 70%, #0d3d20 100%);">

        <div class="absolute inset-0 pointer-events-none"
            style="background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(34,197,94,0.1) 0%, transparent 60%),
                           radial-gradient(ellipse 40% 60% at 10% 80%, rgba(16,185,129,0.07) 0%, transparent 50%);">
        </div>

        <div class="absolute top-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #4ade80, #34d399, transparent);"></div>

        <div class="relative container mx-auto px-6">
            <div class="flex flex-wrap items-center justify-between gap-10">

                <div class="w-full flex justify-center lg:hidden mb-4">
                    <img src="{{ asset('img/mts.png') }}" alt="Logo" class="max-w-[150px]">
                </div>

                <div class="w-full lg:w-1/2 self-center px-6 lg:px-16">

                    <h1 class="text-white text-3xl font-bold leading-tight lg:text-5xl mb-2">
                        MTs<br>
                        <span class="text-green-400">DARUSSALAM</span>
                    </h1>
                    <h2 class="text-green-300 font-medium text-sm mb-5 lg:text-base">
                        Bilapora Rebba Kec. Lenteng Kab. Sumenep
                    </h2>
                    <p class="text-white/70 text-sm leading-relaxed mb-8 max-w-md">
                        Berkomitmen menghadirkan pendidikan yang holistik menggabungkan nilai-nilai
                        keimanan, akhlak mulia, kecerdasan intelektual, serta keterampilan hidup.
                        Kami percaya setiap anak memiliki potensi luar biasa yang perlu dibimbing
                        dengan penuh cinta dan keteladanan.
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="#visi-misi"
                            class="px-5 py-2.5 rounded-lg text-green-400 text-sm font-semibold border transition duration-300 hover:bg-green-400/10"
                            style="border-color: rgba(74,222,128,0.35);">
                            Visi &amp; Misi
                        </a>
                    </div>
                </div>

                <div class="hidden lg:flex w-1/3 justify-center items-center">
                    <div class="relative flex items-center justify-center">
                        <div class="absolute w-72 h-72 rounded-full" style="border: 1px solid rgba(74,222,128,0.08);"></div>
                        <div class="absolute w-60 h-60 rounded-full" style="border: 1px solid rgba(74,222,128,0.15);"></div>
                        <div class="w-52 h-52 rounded-full flex items-center justify-center"
                            style="background: rgba(74,222,128,0.07); border: 2px solid rgba(74,222,128,0.28);">
                            <img src="{{ asset('img/mts.png') }}" alt="Logo" class="max-w-[170px]">
                        </div>
                    </div>
                </div>

            </div>

            {{-- Stats bar --}}
            <div class="mt-14 pt-8 grid grid-cols-2 lg:grid-cols-4 gap-0"
                style="border-top: 1px solid rgba(255,255,255,0.1);">
                <div class="text-center px-4 py-2" style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">20+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Tahun Berdiri</p>
                </div>
                <div class="text-center px-4 py-2" style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">40+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Siswa Aktif</p>
                </div>
                <div class="text-center px-4 py-2 border-t lg:border-t-0"
                    style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">20+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Tenaga Pendidik</p>
                </div>
                <div class="text-center px-4 py-2 border-t lg:border-t-0">
                    <p class="text-green-400 text-2xl font-bold">100%</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Lulusan Berprestasi</p>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-0.5"
            style="background: linear-gradient(90deg, transparent, #16a34a, transparent);"></div>
    </section>

    <section id="visi-misi" class="relative py-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('img/MI2.jpeg') }}" alt="Background" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/65 to-black/80"></div>
        </div>
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-green-400 to-transparent">
        </div>

        <div class="relative container mx-auto px-6">
            <div class="text-center mb-14">
                <span class="inline-block text-green-400 text-xs font-bold tracking-widest uppercase mb-3">MI
                    Darussalam</span>
                <h2 class="text-4xl lg:text-5xl font-black text-white">Visi & Misi</h2>
                <div class="mt-4 mx-auto w-16 h-1 bg-green-400 rounded-full"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 max-w-5xl mx-auto">

                <div
                    class="flex-1 group relative bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 hover:bg-white/15 transition duration-300">
                    <div
                        class="w-14 h-14 mb-6 rounded-xl bg-green-400/20 border border-green-400/40 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 text-green-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>

                    <h3 class="text-green-300 text-xl font-bold uppercase tracking-wider mb-4">Visi</h3>
                    <div class="w-10 h-0.5 bg-green-400/50 mb-5"></div>

                    <p class="text-white/90 text-base leading-relaxed">
                        Terciptanya anak didik yang
                        <span class="font-bold text-green-300">bertaqwa</span>,
                        <span class="font-bold text-green-300">berakhlakul karimah</span>,
                        <span class="font-bold text-green-300">cerdas</span>, dan
                        <span class="font-bold text-green-300">terampil</span>.
                    </p>
                </div>

                <div class="hidden lg:flex flex-col items-center gap-2 py-8">
                    <div class="w-0.5 flex-1 bg-white/20"></div>
                    <div class="w-2 h-2 rounded-full bg-green-400"></div>
                    <div class="w-0.5 flex-1 bg-white/20"></div>
                </div>
                <div class="lg:hidden h-0.5 bg-white/20 mx-8"></div>

                <div
                    class="flex-1 group relative bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 hover:bg-white/15 transition duration-300">
                    <div
                        class="w-14 h-14 mb-6 rounded-xl bg-green-400/20 border border-green-400/40 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 text-green-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                    </div>

                    <h3 class="text-green-300 text-xl font-bold uppercase tracking-wider mb-4">Misi</h3>
                    <div class="w-10 h-0.5 bg-primary/50 mb-5"></div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-white/90 text-base leading-relaxed">
                            <span class="mt-1.5 flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                            Melaksanakan pembelajaran aktif, kreatif, efektif, dan menyenangkan (PAKEM).
                        </li>
                        <li class="flex items-start gap-3 text-white/90 text-base leading-relaxed">
                            <span class="mt-1.5 flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                            Memberikan bimbingan dan pembinaan untuk mengembangkan potensi serta kreativitas anak didik.
                        </li>
                        <li class="flex items-start gap-3 text-white/90 text-base leading-relaxed">
                            <span class="mt-1.5 flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                            Meningkatkan penghayatan dan pengamalan nilai-nilai agama, moral, dan budaya.
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-primary to-transparent">
        </div>
    </section>

    <section id="ekstra" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-14">
                <span class="inline-block text-primary text-xs font-bold tracking-widest uppercase mb-3">Pengembangan
                    Diri</span>
                <h2 class="text-4xl lg:text-5xl font-black text-primary">Ekstra Kegiatan</h2>
                <p class="mt-4 text-gray-500 text-base max-w-xl mx-auto leading-relaxed">
                    Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat, minat, dan karakter islami siswa.
                </p>
                <div class="mt-4 mx-auto w-16 h-1 bg-primary rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Tahfidz Al-Qur'an --}}
                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-green-100 text-green-700 px-3 py-1 rounded-full">Senin &
                            Rabu</span>
                    </div>
                    <h4 class="font-black text-gray-800 text-lg mb-2 group-hover:text-primary transition duration-200">
                        Tahfidz Al-Qur'an</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Program hafalan Al-Qur'an dengan target minimal Juz
                        Amma untuk seluruh siswa.</p>
                </div>

                {{-- Pramuka --}}
                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-amber-100 text-amber-700 px-3 py-1 rounded-full">Jumat</span>
                    </div>
                    <h4 class="font-black text-gray-800 text-lg mb-2 group-hover:text-primary transition duration-200">
                        Pramuka</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Kegiatan kepramukaan untuk melatih kemandirian,
                        kedisiplinan, dan jiwa sosial siswa.</p>
                </div>

                {{-- Olahraga & Futsal --}}
                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">Kamis</span>
                    </div>
                    <h4 class="font-black text-gray-800 text-lg mb-2 group-hover:text-primary transition duration-200">
                        Olahraga & Futsal</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Pembinaan fisik dan sportivitas melalui olahraga
                        futsal dan senam pagi bersama.</p>
                </div>

                {{-- Banjari / Rebana --}}
                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-start justify-between mb-5">
                        <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-pink-100 text-pink-700 px-3 py-1 rounded-full">Sabtu</span>
                    </div>
                    <h4 class="font-black text-gray-800 text-lg mb-2 group-hover:text-primary transition duration-200">
                        Banjari / Rebana</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Kegiatan seni musik Islami dengan rebana untuk
                        menumbuhkan kecintaan terhadap shalawat dan budaya Islam.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== CTA ===== --}}
    <section class="py-16">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-2xl lg:text-3xl font-black text-primary mb-3">Ingin Tahu Lebih Lanjut?</h3>
            <p class="text-green-600 text-base mb-8 max-w-lg mx-auto">Hubungi kami untuk informasi pendaftaran, jadwal, dan
                kegiatan RA Darussalam.</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#"
                    class="flex items-center gap-2 bg-primary text-white font-bold text-sm py-3 px-8 rounded-full hover:shadow-xl hover:scale-105 transition duration-300">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 6.75Z" />
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection
