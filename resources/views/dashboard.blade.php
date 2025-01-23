@extends('layout.app')
@section('content')
    <section class="pt-36 pb-32 bg-cover bg-no-repeat"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/bg.jpeg') }}')">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-6 lg:w-1/2">
                    <h1 class="text-sm text-white md:text-lg">Official Website<span
                            class="block font-bold text-white text-3xl mt-1 lg:text-5xl">Himpunan Mahasiswa Islam</span></h1>
                    <h2 class="font-semibold text-white  text-base mb-5 lg:text-xl">Komisariat Universitas Bahaudin Mudhary
                    </h2>
                    <p class="text-sm text-white mb-10 leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Consequuntur suscipit harum delectus excepturi fugit ipsum molestias nostrum ea?</p>
                    <a href="#info"
                        class="flex items-center gap-1 text-sm max-w-20 bg-primary text-white py-1 px-4 rounded-full hover:shadow-lg hover:text-black hover:bg-green-400 transition duration-300 ease-in-out animate-bounce">More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-3 w-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                        </svg>
                    </a>
                </div>
                <div class="w-full self-end px-6 lg:w-1/2 ">
                    <div class="relative mt-20 lg:-mt-20 lg:right-0">
                        <img src="../img/hmi.png" alt="Logo"
                            class="hidden lg:block max-w-full mx-auto transition duration-500 ease-in-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- info --}}
    <section id="info" class="pt-36 pb-32 bg-gradient-to-b from-primary via-green-500 to-white">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-10">
                    <h4 class="text-xs mx-auto text-white w-32 uppercase border rounded-full mb-4 lg:text-sm">who we are
                    </h4>
                    <h2 class="font-bold text-primary text-2xl lg:text-5xl whitespace-nowrap font-sans"
                        style="text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.8);">Himpunan Mahasiswa Islam</h2>
                    <h4 class="text-md font-semibold text-primary lg:text-xl mb-2 font-sans"
                        style="text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.8);">Komisariat Universitas Bahaudin Mudhary
                    </h4>
                    <p class="font-medium text-xs text-white lg:text-sm">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Nam esse sint magnam voluptatem ut maiores dolorem, quibusdam dolore sequi. Modi nisi veniam
                        vero numquam deleniti!</p>
                </div>
            </div>
            <div class="w-full mx-auto px-6 flex flex-wrap justify-center mb-5">
                <div class="relative max-w-sm rounded-lg shadow-xl border mx-auto mb-10 sm:w-72 lg:w-1/2">
                    <img src="../img/1.png" alt="" class="size-20 absolute -left-10 -top-5">
                    <img src="../img/hmi.png" alt=""
                        class="size-16 opacity-30 animate-pulse absolute right-2 -bottom-1">
                    <div class="max-w-xl mx-auto px-5 py-3">
                        <h2 class="text-xl font-bold text-primary font-sans mb-1">Profil</h2>
                        <p
                            class="text-xs mb-5 lg:text-md font-serif first-letter:text-5xl first-letter:float-left first-letter:mr-2">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum eaque necessitatibus delectus
                            sed ipsa optio dolor ea laborum, officia debitis.</p>
                        <a href="#"
                            class="font-semibold text-xs text-black hover:text-white border border-green-800 hover:border-none hover:scale-110 bg-transparent hover:bg-primary rounded-xl px-3 py-1 absolute bottom-3 right-3 transation duration-500 tracking-wider">
                            More
                        </a>
                    </div>
                </div>
                <div class="relative max-w-sm rounded-lg shadow-xl border mx-auto mb-10 sm:w-72 lg:w-1/2">
                    <img src="../img/1.png" alt="" class="size-20 absolute -left-10 -top-5">
                    <img src="../img/hmi.png" alt=""
                        class="size-16 opacity-30 animate-pulse absolute right-2 -bottom-1">
                    <div class="max-w-xl mx-auto px-5 py-3">
                        <h2 class="text-xl font-bold text-primary font-sans mb-1">Pengurus</h2>
                        <p
                            class="text-xs mb-5 lg:text-md font-serif first-letter:text-5xl first-letter:float-left first-letter:mr-2">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur error quasi tempora
                            dignissimos tempore, possimus quibusdam distinctio assumenda. Corrupti, accusamus consequuntur?
                        </p>
                        <a href="#"
                            class="font-semibold text-xs text-black hover:text-white border border-green-800 hover:border-none hover:scale-110 bg-transparent hover:bg-primary rounded-xl px-3 py-1 absolute bottom-3 right-3 transation duration-500 tracking-wider">
                            More
                        </a>
                    </div>
                </div>
                <div class="relative max-w-sm rounded-lg shadow-xl border mx-auto mb-10 sm:w-72 lg:w-1/2">
                    <img src="../img/1.png" alt="" class="size-20 absolute -left-10 -top-5">
                    <img src="../img/hmi.png" alt=""
                        class="size-16 opacity-30 animate-pulse absolute right-2 -bottom-1">
                    <div class="max-w-xl mx-auto px-5 py-3">
                        <h2 class="text-xl font-bold text-primary font-sans mb-1">Rutinitas</h2>
                        <p
                            class="text-xs mb-5 lg:text-md font-serif first-letter:text-5xl first-letter:float-left first-letter:mr-2">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur error quasi tempora
                            dignissimos tempore, possimus quibusdam distinctio assumenda. Corrupti, accusamus consequuntur?
                        </p>
                        <a href="#"
                            class="font-semibold text-xs text-black hover:text-white border border-green-800 hover:border-none hover:scale-110 bg-transparent hover:bg-primary rounded-xl px-3 py-1 absolute bottom-3 right-3 transation duration-500 tracking-wider">
                            More
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4">
                <div class="flex justify-center mx-auto">
                    <a href="#" target="_blank"
                        class="w-9 h-9 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-slate-100 hover:bg-primary hover:text-slate-200 transition duration-300 animate-goyang">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                        </svg>
                    </a>
                    <a href="#" target="_blank"
                        class="w-9 h-9 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-slate-100 hover:bg-primary hover:text-slate-200 transition duration-300 animate-goyang">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>TikTok</title>
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>
                    <a href="#" target="_blank"
                        class="w-9 h-9 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-slate-100 hover:bg-primary hover:text-slate-200 transition duration-300 animate-goyang">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Facebook</title>
                            <path
                                d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                        </svg>
                    </a>
                    <a href="#" target="_blank"
                        class="w-9 h-9 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-slate-100 hover:bg-primary hover:text-slate-200 transition duration-300 animate-goyang">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>WhatsApp</title>
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- info --}}

    {{-- berita --}}
    <section id="berita" class="pt-36 pb-32">
        <div class="container relative">
            <div class="max-w-xl text-center mx-auto -mt-5 mb-16">
                <h4 class="text-sm font-medium border border-black max-w-24 mx-auto rounded-full mb-4 lg:text-base">Berita
                </h4>
                <h2 class="text-xl text-primary font-bold font-sans lg:text-4xl mb-5">Temukan Berita Terbaru Dari HMI
                    Komisariat UNIBA</h2>
            </div>
            <div class="flex flex-wrap mx-auto px-6">
                <div
                    class="rounded-lg shadow-xl overflow-hidden relative sm:w-64 mx-auto lg:w-72 mb-16 hover:scale-110 transition duration-300">
                    <img src="../img/bg.jpeg" alt="image" class="w-full">
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
                    <img src="../img/bg.jpeg" alt="image" class="w-full">
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
                    <img src="../img/bg.jpeg" alt="image" class="w-full">
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
                    class="text-base font-semibold bg-primary px-3 py-2 rounded-full text-white hover:scale-105 hover:bg-slate-300 hover:text-primary transition duration-300 shadow-lg">Show
                    More</a>
            </div>
            <div>
                <img src="../img/roket.png" alt="image" class="size-16 sm:size-24 absolute -top-9 sm:-top-12">
            </div>
        </div>
    </section>
    {{-- berita --}}


    {{-- tokoh --}}
    <section class="pt-36 pb-32 bg-cover bg-no-repeat" style="background-image: url('{{ asset('img/bg2.jpeg') }}')">
        <div class="container">
            <div class="max-w-full text-center">
                <p class="text-xs sm:text-sm text-white max-w-36 border border-white uppercase font-sans px-2 py-1 mx-auto rounded-full mb-2 -mt-10">hmi dalam kata</p>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-sans text-white mb-12 sm:mb-16 tracking-wider">Tokoh-Tokoh HMI</h2>
            </div>
            <div class="swiper max-w-full mx-auto px-3 py-3">
                <div class="swiper-wrapper mb-7">
                    <div class="swiper-slide">
                        <div class="flex flex-col max-w-80 bg-white shadow-xl px-6 py-4 mx-auto rounded-lg">
                            <div class="max-w-14 max-h-14 rounded-full mx-auto bg-black overflow-hidden mt-4 mb-6">
                                <img src="../img/org.jpeg" alt="" class="w-full">
                            </div>
                            <div class="px-3 py-2 text-center">
                                <p class="text-base font-sans mb-8">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum earum magni, corporis harum expedita quod eligendi exercitationem iste.</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr HMI Uniba Madura</h2>
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
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique corrupti numquam facere sed recusandae modi eum itaque?</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr HMI Uniba Madura</h2>
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
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quaerat necessitatibus corrupti voluptatem ipsa consectetur dignis.</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr HMI Uniba Madura</h2>
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
                                <p class="text-base font-sans mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi reiciendis voluptatem dolores, quam nobis impedit commodi deserunt</p>
                                <h2 class="text-lg font-semibold font-sans text-primary">Prof. Dr HMI Uniba Madura</h2>
                                <h4 class="text-sm italic">Humas</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    {{-- tokoh --}}
@endsection
