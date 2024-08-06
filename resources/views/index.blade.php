<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SERASI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-002CQCMVP4"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="/css/carousel.css">

        {{-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'"/> --}}
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
          
            gtag('config', 'G-002CQCMVP4');
        </script>
        
    </head>
    <body>

        <div class="lg:grid lg:grid-cols-12 lg:h-screen h-auto overflow-auto">
            <div class="lg:col-span-3">
                <div class="fixed w-full top-0 z-50 bg-[#faf9f9]">
                    <div class="lg:hidden block mt-5 rounded-lg py-1 bg-[#1EA05E] text-white mx-4">
                        <h3 class="md:text-5xl text-3xl font-bold lg:text-start text-center">SERASI</h3><br>
                        <p class="-mt-5 md:text-lg text-sm lg:text-start text-center">Serambi Aplikasi BPS se-Provinsi Aceh</p>
                    </div>
                    <div class="lg:hidden relative px-4 my-3 w-full">
                        <input id="search_1" type="text" placeholder="Cari aplikasi.." class="search_app w-full px-4 py-2 border border-neutral-200 rounded-lg focus:outline-none focus:border-[#1ea05f98] focus:ring-1 focus:ring-[#1ea05f98]">
                        <img src="/img/search.svg" alt="Search" class="absolute top-1/2 right-6 transform -translate-y-1/2 w-5 h-5">
                    </div>  
                </div>
                {{-- <div class="carousel pt-12 lg:mt-0 md:mt-40 sm:mt-48 mt-36">
                    <div class="list">

                        <?php 
                            $order = [10,1,2,3,4,5,6,7,8,9];
                            $i = 0;
                        ?>
                        @foreach ($tophits as $item)
                            <div class="item flex">
                                <img src="img/{{ $item['logo'] }}" class="rounded-lg">
                                <div class="introduce">
                                    <div class="title">#TOPHITS NO {{ $order[$i] }}</div>
                                    <div class="topic">{{ $item['nama'] }}</div>
                                    <span id="pembuat" class="bg-[#1EA05E] rounded-md px-2 text-white text-xs">{{ $item['pembuat'] }}</span>
                                    <div class="des">
                                        <!-- 20 lorem -->
                                        Hits : {{ $item["hits"] }}
                                        <div class="text-sm text-black mb-14">{{ $item['deskripsi'] }}</div>
                                    </div>
                                    <a href="https://aceh.bps.go.id" class="seeMore" target="_blank">Kunjungi &#8599</a>
                                </div>
                            </div>
                            <?php $i++ ?>
                        @endforeach

                    </div>
                    <div class="arrows">
                        <button id="prev"><</button>
                        <button id="next">></button>
                    </div>
                </div> --}}
                <div class="carousel lg:pt-12 lg:mt-0 md:mt-40 mt-36">
                    <div class="list">
                        <?php 
                            $order = [10, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                            $i = 0;
                        ?>
                        @foreach ($tophits as $item)
                            <div class="item">
                                <img src="img/{{ $item['logo'] }}" class="lg:hidden block rounded-lg">
                                <div class="introduce">
                                    <div class="title">#TOPHITS NO {{ $order[$i] }}</div>
                                    <div class="topic">{{ $item['nama'] }}</div>
                                    <img src="img/{{ $item['logo'] }}" class="lg:block hidden rounded-lg">
                                    <span id="pembuat" class="bg-[#1EA05E] rounded-md px-2 text-white text-xs">{{ $item['pembuat'] }}</span>
                                    <div class="des">
                                        Hits: {{ $item['hits'] }}
                                        <div class="text-sm text-black mb-14">{{ $item['deskripsi'] }}</div>
                                    </div>
                                    <a href="{{ $item['link'] }}" class="seeMore" target="_blank">Kunjungi &#8599</a>
                                </div>
                            </div>
                            <?php $i++ ?>
                        @endforeach
                    </div>
                    <div class="arrows">
                        <button id="prev"><</button>
                        <button id="next">></button>
                    </div>
                </div>
                
            </div>
            <div class="lg:col-span-9 lg:pr-3 lg:pl-5 lg:py-1 md:p-12 px-4 mt-1 pb-4 overflow-auto custom-scrollbar">
                <div class="lg:block hidden bg-[#1EA05E] text-white rounded-lg py-1">
                    <h3 class="text-4xl font-bold text-center">SERASI</h3><br>
                    <p class="-mt-5 text-lg text-center">Serambi Aplikasi BPS se-Provinsi Aceh</p>
                </div>
                <div class="lg:relative lg:block hidden mt-4 mb-3 w-full">
                    <input id="search_0" type="text" placeholder="Cari aplikasi.." class="w-full px-4 py-2 border border-neutral-200 rounded-lg focus:outline-none focus:border-[#1ea05f98] focus:ring-1 focus:ring-[#1ea05f98]">
                    <img src="/img/search.svg" alt="Search" class="absolute top-1/2 right-3 transform -translate-y-1/2 w-5 h-5">
                </div>        

                <div class="">
                    <div class="flex items-center justify-between rounded-lg pt-1 ">
                        <h3 class="font-semibold md:text-xl text-base mb-2">BPS RI</h3>
                        <button id="toggle-chevron" class="focus:outline-none">
                            <svg class="w-6 h-6 chevron chevron-down" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    <p id="res_bps_ri"></p>
                    <div id="bps_ri" class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2 custom-scrollbar transition-max-height duration-500 ease-in-out">
                        @foreach ($lists_bps_ri as $item)
                            <div class="rounded-lg border border-neutral-200 p-2 hit-button" data-id={{ $item->id }}>
                                <a href="{{ $item->link }}" target="_blank">
                                    <div class="flex flex-row justify-between items-center">
                                        <img src="img/{{ $item->logo }}" alt="" class="rounded-lg h-12">
                                        <span class="{{ $item->akses == "publik" ? "border-[#43a4d4]" : "border-[#e7a861]" }} border text-black rounded-xl text-[10px] flex items-center justify-center px-2">{{ $item->akses }}</span>
                                    </div>
                                    <div class="flex flex-row justify-between items-center">
                                        <p class="mt-4 text-base font-semibold">{{ $item->nama }}</p>
                                        <p class="mt-4 text-xs text-gray-500 w-1/4">
                                            Hits: <span id="hits-count-{{ $item->id }}">{{ $item->hits }}</span>
                                        </p>                                    </div>
                                    <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="my-3">
                    <div class="flex items-center justify-between rounded-lg pt-1 mb-1">
                        <h3 class="font-semibold md:text-xl text-base mb-2">BPS PROVINSI ACEH</h3>
                        <button id="toggle-chevron-aceh" class="focus:outline-none">
                            <svg class="w-6 h-6 chevron chevron-down" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    <p id="res_bps_aceh"></p>
                    <div id="bps_aceh" class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2 custom-scrollbar transition-max-height duration-500 ease-in-out">
                        @foreach ($lists_bps_aceh as $item)
                            <div class="rounded-lg border border-neutral-200 p-2 hit-button" data-id={{ $item->id }}>
                                <a href="{{ $item->link }}" target="_blank">
                                    <div class="flex flex-row justify-between items-center">
                                        <img src="img/{{ $item->logo }}" alt="" class="rounded-lg h-10">
                                        <span class="{{ $item->akses == "publik" ? "border-[#43a4d4]" : "border-[#e7a861]" }} border text-black rounded-xl text-[10px] flex items-center justify-center px-2">{{ $item->akses }}</span>
                                    </div>
                                    <div class="flex flex-row justify-between items-center">
                                        <p class="mt-4 text-base font-semibold">{{ $item->nama }}</p>
                                        <p class="mt-4 text-xs text-gray-500 w-1/4">
                                            Hits: <span id="hits-count-{{ $item->id }}">{{ $item->hits }}</span>
                                        </p>                                     </div>
                                    <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="">
                    <div class="flex items-center justify-between pt-1 mb-1">
                        <h3 class="font-semibold md:text-xl text-base mb-2">BPS KABUPATEN/KOTA SE-PROVINSI ACEH</h3>
                        <button id="toggle-chevron-kab" class="focus:outline-none">
                            <svg class="w-6 h-6 chevron chevron-up" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    <p id="res_bps_kabkot"></p>
                    <div id="bps_kabkot" class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2 custom-scrollbar max-height-full transition-max-height duration-500 ease-in-out">
                        @foreach ($lists_bps_kabkot as $item)
                            <div class="rounded-lg border border-neutral-200 p-2 hit-button" data-id={{ $item->id }}>
                                <a href="{{ $item->link }}" target="_blank">
                                    <div class="flex flex-row justify-between items-center mb-2">
                                        <img src="img/{{ $item->logo }}" alt="" class="rounded-lg h-10">
                                        <span class="{{ $item->akses == "publik" ? "border-[#43a4d4]" : "border-[#e7a861]" }} border text-black rounded-xl text-[10px] flex items-center justify-center px-2">{{ $item->akses }}</span>
                                    </div>
                                    <span class="bg-[#1EA05E] text-white rounded-xl text-[10px] px-2">{{ $item->pembuat }}</span>
                                    <div class="flex flex-row justify-between items-center">
                                        <p class="text-base font-semibold">{{ $item->nama }}</p>
                                        <p class="mt-4 text-xs text-gray-500 w-1/4">
                                            Hits: <span id="hits-count-{{ $item->id }}">{{ $item->hits }}</span>
                                        </p>                                     </div>
                                    <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
                                </a>
                            </div>      
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/script.js"></script>
        <script src="/js/carousel.js"></script>
    </body>
</html>
