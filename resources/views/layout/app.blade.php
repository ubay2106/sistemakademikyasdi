<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yayasan Darul Istiqlal</title>
    <link rel="icon" type="image" href="{{ asset('img/logo.png') }}" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

</head>

<body>

    {{-- header --}}
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 transition duration-300">
        <div class="container">
            <div class="flex items-center justify-between relative">

                <div class="px-4">
                    <a href="#" class="flex items-center gap-2 py-4">
                        <img src="{{ asset('/img/logo.png') }}" class="size-10 lg:size-12" alt="logo">
                        <div class="flex flex-col">
                            <span class=" text-base text-white font-medium tracking-wide lg:text-md">YAYASAN</span>
                            <span class="text-md font-bold text-white lg:text-xl">DARUL ISTIQLAL</span>
                        </div>
                    </a>
                </div>

                <div class="flex items-center gap-3 px-4">

                    <a href=""
                        class="lg:hidden flex items-center gap-1.5 font-semibold text-sm text-primary bg-white border-2 border-white py-1.5 px-4 rounded-xl hover:text-black hover:bg-transparent hover:border-white transition duration-300">
                        Login
                    </a>

                    <button id="bars" name="bars" type="button" class="block lg:hidden">
                        <span class="bars-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="bars-line transition duration-300 ease-in-out"></span>
                        <span class="bars-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-primary shadow-lg rounded-lg max-w-[200px] w-full right-4 top-full lg:flex lg:items-center lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none lg:py-0">
                        <ul class="block lg:flex lg:items-center">
                            <li class="group">
                                <a href="#"
                                    class="font-semibold text-white py-2 mx-8 flex group-hover:text-black lg:mx-4">Beranda</a>
                            </li>

                            <li class="group relative">
                                <a href="#"
                                    class="font-semibold text-white py-2 mx-8 flex items-center gap-1 group-hover:text-black lg:mx-4">
                                    Pendidikan
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor"
                                        class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>

                                <ul id="dropdown-pendidikan"
                                    class="hidden lg:group-hover:block lg:absolute lg:top-full lg:left-0 lg:bg-primary lg:shadow-xl lg:rounded-xl lg:min-w-[200px] lg:py-2 ml-4 lg:ml-0">
                                    <li>
                                        <a href="#"
                                            class="flex items-center gap-2 text-white font-medium text-sm py-2 px-5 hover:text-black transition duration-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-white flex-shrink-0"></span>
                                            RA Darussalam
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center gap-2 text-white font-medium text-sm py-2 px-5 hover:text-black transition duration-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-white flex-shrink-0"></span>
                                            MI Darussalam
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center gap-2 text-white font-medium text-sm py-2 px-5 hover:text-black transition duration-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-white flex-shrink-0"></span>
                                            MTs Darussalam
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="group">
                                <a href="#portfolio"
                                    class="font-semibold text-white py-2 mx-8 flex group-hover:text-black lg:mx-4">Berita</a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="font-semibold text-white py-2 mx-8 flex group-hover:text-black lg:mx-4">Prestasi</a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="font-semibold text-white py-2 mx-8 flex group-hover:text-black lg:mx-4">Galeri</a>
                            </li>

                            <li class="hidden lg:block lg:ml-4">
                                <a href=""
                                    class="flex items-center gap-1.5 font-semibold text-sm text-primary bg-white border-2 border-white py-1.5 px-4 rounded-xl hover:text-black hover:bg-transparent hover:border-white transition duration-300">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </header>
    {{-- header --}}

    {{-- conten --}}
    @yield('content')
    {{-- conten --}}

    {{-- footer --}}
    <footer class="pt-24 pb-10"
        style="background: linear-gradient(135deg, #0a2e1a 0%, #0f4a28 40%, #1a6b3a 70%, #0d3d20 100%);">
        <div class="container">
            <div class="sm:flex sm:flex-wrap -mt-5 justify-between">
                <div class="px-6 max-w-46 mb-10">
                    <div class="w-full px-4 mb-4">
                        <div class="w-full px-4 flex flex-col items-center justify-center mt-20 mb-2 relative">
                            <img src="{{ asset('img/logo.png') }}" alt="logo"
                                class="size-24 -top-24 absolute hover:scale-105 transition">
                            <h1 class="font-bold text-xl font-sans text-white">Yayasan</h1>
                            <h2 class="font-bold text-3xl font-sans text-white">Darul Istiqlal</h2>
                        </div>
                        <div class="w-full text-center">
                            <h4 class="font-semibold text-md text-white font-sans">Bilapora Rebba</h4>
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap justify-center mx-auto">
                        <a href="#" target="_blank"
                            class="w-7 h-7 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-white hover:bg-primary hover:text-white transition duration-300 animate-goyang">
                            <svg role="img" width="16" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                            </svg>
                        </a>
                        <a href="#" target="_blank"
                            class="w-7 h-7 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-white hover:bg-primary hover:text-white transition duration-300 animate-goyang">
                            <svg role="img" width="16" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>TikTok</title>
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                        </a>
                        <a href="#" target="_blank"
                            class="w-7 h-7 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-white hover:bg-primary hover:text-white transition duration-300 animate-goyang">
                            <svg role="img" width="16" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title>
                                <path
                                    d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                            </svg>
                        </a>
                        <a href="#" target="_blank"
                            class="w-7 h-7 mr-4 rounded-full flex justify-center items-center border border-slate-900 hover:border-white hover:bg-primary hover:text-white transition duration-300 animate-goyang">
                            <svg role="img" width="16" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>WhatsApp</title>
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="px-4 max-w-46 mb-10">
                    <div class="max-w-full mx-auto">
                        <h2 class="font-bold text-lg text-white mb-2">Contact</h2>
                        <div class="flex flex-wrap px-4 mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <a href="#" class="text-white text-sm mt-1">yayasandarulistiqlal@gmail.com</a>
                        </div>
                        <div class="flex flex-wrap px-4 mb-5 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="size-7 mt-2 mr-3 text-white absolute">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            <a href="#" class="text-white text-sm mt-1 ml-9 sm:max-w-60">Jl. Raya Lenteng,
                                Aredake, Batuan, Kec. Batuan, Kabupaten Sumenep, Jawa Timur 69451</a>
                        </div>
                        <div class="flex flex-wrap px-4 mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 text-white absolute">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <a href="#" class="text-white text-sm mt-1 ml-9">+6287883353112</a>
                        </div>
                    </div>
                </div>
                <div class="px-4 max-w-46">
                    <div class="max-w-full mx-auto pr-36">
                        <h2 class="font-bold text-lg text-white mb-5">Useful Link</h2>
                        <div class="flex flex-wrap mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-3 text-white ml-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href=""
                                class="text-base text-white font-sans ml-3 -mt-2 tracking-wider">Beranda</a>
                        </div>
                        <div class="flex flex-wrap mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-3 text-white ml-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href=""
                                class="text-base text-white font-sans ml-3 -mt-2 tracking-wider">Berita</a>
                        </div>
                        <div class="flex flex-wrap mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-3 text-white ml-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href=""
                                class="text-base text-white font-sans ml-3 -mt-2 tracking-wider">Prestasi</a>
                        </div>
                        <div class="flex flex-wrap mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-3 text-white ml-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href=""
                                class="text-base text-white font-sans ml-3 -mt-2 tracking-wider">Galeri</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-full mx-auto border-t border-slate-500">
                <p class="sm:text-base text-sm text-white text-center py-2 font-sans">©2026 Yayasan Darul Istiqlal. All rights reserved.</p>
            </div>
        </div>
    </footer>
    {{-- footer --}}

    <script src="{{ asset('js/style.js') }}"></script>

</body>

</html>
