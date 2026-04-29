@extends('layout.app')
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
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="max-w-[150px]">
                </div>

                <div class="w-full lg:w-1/2 self-center px-6 lg:px-16">

                    <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full border text-xs font-medium tracking-widest uppercase"
                        style="background: rgba(74,222,128,0.12); border-color: rgba(74,222,128,0.3); color: #86efac;">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
                        Website Resmi
                    </div>

                    <h1 class="text-white text-3xl font-bold leading-tight lg:text-5xl mb-2">
                        Yayasan<br>
                        <span class="text-green-400">Darul Istiqlal</span>
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
                        <a href="#berita"
                            class="px-5 py-2.5 rounded-lg bg-green-600 hover:bg-green-500 text-white text-sm font-semibold transition duration-300">
                            Lihat Berita
                        </a>
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
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="max-w-[170px]">
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
                    <p class="text-green-400 text-2xl font-bold">500+</p>
                    <p class="text-white/50 text-xs uppercase tracking-widest mt-1">Santri Aktif</p>
                </div>
                <div class="text-center px-4 py-2 border-t lg:border-t-0"
                    style="border-right: 1px solid rgba(255,255,255,0.1);">
                    <p class="text-green-400 text-2xl font-bold">30+</p>
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

    <section id="visi-misi" class="relative py-28 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('img/guruku.jpg') }}" alt="Background" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/80"></div>
        </div>

        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-green-400 to-transparent"></div>

        <div class="relative container mx-auto px-6">

            <div class="text-center mb-16">
                <span class="inline-block text-green-400 text-sm font-semibold tracking-widest uppercase mb-3">Yayasan Darul
                    Istiqlal</span>
                <h2 class="text-4xl lg:text-5xl font-bold text-white">Visi & Misi</h2>
                <div class="mt-4 mx-auto w-20 h-1 bg-green-400 rounded-full"></div>
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
                        class="w-14 h-14 mb-6 rounded-xl bg-primary/20 border border-primary/40 flex items-center justify-center">
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

    <section id="berita" class="pt-36 pb-32">
        <div class="container relative">
            <div class="max-w-xl text-center mx-auto -mt-5 mb-16">
                <h4 class="text-sm font-medium border border-black max-w-24 mx-auto rounded-full mb-4 lg:text-base">Berita
                </h4>
                <h2 class="text-xl text-primary font-bold font-sans lg:text-2xl mb-5">Berbagai Informasi Menarik seputar
                    Pendidikan, Inovasi, dan
                    Perkembangan Terbaru di Sekolah Kami.</h2>
            </div>
            <div class="flex flex-wrap mx-auto px-6">
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/guruku.jpg" alt="image" class="w-full">
                    <div class="px-4 py-3">
                        <a href="#" class="font-bold text-xl text-primary font-sans">Berita terpopuler</a>
                        <p class="text-xs text-slate-600 mt-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Temporibus perferendis libero, sed mollitia quisquam exercitationem inventore eaque.
                            Dolorem, laborum nemo?</p>
                        <a href="#"
                            class="text-sm px-3 py-2 bottom-2 absolute right-2 hover:skew-x-6 transition">Baca
                            Selengkapnya</a>
                    </div>
                </div>
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/guruku.jpg" alt="image" class="w-full">
                    <div class="px-4 py-3">
                        <a href="#" class="font-bold text-xl text-primary font-sans">Berita terpopuler</a>
                        <p class="text-xs text-slate-600 mt-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Temporibus perferendis libero, sed mollitia quisquam exercitationem inventore eaque.
                            Dolorem, laborum nemo?</p>
                        <a href="#"
                            class="text-sm px-3 py-2 bottom-2 absolute right-2 hover:skew-x-6 transition">Baca
                            Selengkapnya</a>
                    </div>
                </div>
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/guruku.jpg" alt="image" class="w-full">
                    <div class="px-4 py-3">
                        <a href="#" class="font-bold text-xl text-primary font-sans">Berita terpopuler</a>
                        <p class="text-xs text-slate-600 mt-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Temporibus perferendis libero, sed mollitia quisquam exercitationem inventore eaque.
                            Dolorem, laborum nemo?</p>
                        <a href="#"
                            class="text-sm px-3 py-2 bottom-2 absolute right-2 hover:skew-x-6 transition">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="max-w-full max-auto text-center">
                <a href=""
                    class="text-base font-semibold bg-primary px-3 py-2 rounded-full text-white hover:scale-105 hover:bg-slate-300 hover:text-primary transition duration-300 shadow-lg">Lihat
                    Semuanya</a>
            </div>
        </div>
    </section>

    <section class="pt-36 pb-32 bg-cover bg-no-repeat" style="background-image: url('{{ asset('img/bg2.jpeg') }}')">
        <div class="container">
            <div class="max-w-full text-center">
                <p
                    class="text-xs sm:text-sm text-white max-w-36 border border-white uppercase font-sans px-2 py-1 mx-auto rounded-full mb-2 -mt-10">
                    GURU KAMI</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-sans text-white mb-12 sm:mb-16 tracking-wider">
                    Tenaga pendidik profesional di sekolah kami</h2>
            </div>
            <div class="swiper max-w-full mx-auto px-3 py-3">
                <div class="swiper-wrapper mb-7">
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum, dolor sit amet consectetur adipisicing
                                    elit. Cum earum magni, corporis harum expedita quod eligendi exercitationem iste.</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Sekretaris</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit. Similique corrupti numquam facere sed recusandae modi eum itaque?</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Ketua</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Illo quaerat necessitatibus corrupti voluptatem ipsa consectetur dignis.</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Bendahara</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Animi reiciendis voluptatem dolores, quam nobis impedit commodi deserunt</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr GMPK</h2>
                                <h4 class="text-sm italic">Humas</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section id="" class="pt-36 pb-32">
        <div class="container relative">
            <div class="max-w-xl text-center mx-auto -mt-5 mb-16">
                <h4 class="text-sm font-medium border border-black max-w-24 mx-auto rounded-full mb-4 lg:text-base">
                    Prestasi
                </h4>
                <h2 class="text-xl text-primary font-bold font-sans lg:text-2xl mb-5">Menyinari Bakat dan Prestasi Siswa
                    Kami, Melihat Karya
                    Hebat yang Mencerminkan Potensi Terbesar Generasi Masa Depan.</h2>
            </div>
            <div class="flex flex-wrap mx-auto px-6">
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/guruku.jpg" alt="image" class="w-full">
                    <div class="px-4 py-3">
                        <a href="#" class="font-bold text-xl text-primary font-sans">Berita terpopuler</a>
                        <p class="text-xs text-slate-600 mt-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Temporibus perferendis libero, sed mollitia quisquam exercitationem inventore eaque.
                            Dolorem, laborum nemo?</p>
                        <a href="#"
                            class="text-sm px-3 py-2 bottom-2 absolute right-2 hover:skew-x-6 transition">Baca
                            Selengkapnya</a>
                    </div>
                </div>
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/guruku.jpg" alt="image" class="w-full">
                    <div class="px-4 py-3">
                        <a href="#" class="font-bold text-xl text-primary font-sans">Berita terpopuler</a>
                        <p class="text-xs text-slate-600 mt-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Temporibus perferendis libero, sed mollitia quisquam exercitationem inventore eaque.
                            Dolorem, laborum nemo?</p>
                        <a href="#"
                            class="text-sm px-3 py-2 bottom-2 absolute right-2 hover:skew-x-6 transition">Baca
                            Selengkapnya</a>
                    </div>
                </div>
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/guruku.jpg" alt="image" class="w-full">
                    <div class="px-4 py-3">
                        <a href="#" class="font-bold text-xl text-primary font-sans">Berita terpopuler</a>
                        <p class="text-xs text-slate-600 mt-2 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Temporibus perferendis libero, sed mollitia quisquam exercitationem inventore eaque.
                            Dolorem, laborum nemo?</p>
                        <a href="#"
                            class="text-sm px-3 py-2 bottom-2 absolute right-2 hover:skew-x-6 transition">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="max-w-full max-auto text-center">
                <a href=""
                    class="text-base font-semibold bg-primary px-3 py-2 rounded-full text-white hover:scale-105 hover:bg-slate-300 hover:text-primary transition duration-300 shadow-lg">Lihat
                    Semuanya</a>
            </div>
        </div>
    </section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection
