<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/assets/Rumah Nusantara.svg" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Rumah Nusantara</title>
</head>

<body class="bg-gray-200">
    @component('components.navBar')
    @endcomponent
    @php
        $images = $rumah->foto ? explode(',', $rumah->foto) : [];
        $utamaPertama = isset($images[0]) ? trim($images[0]) : null;
    @endphp

    <div class="bg-[url('/public/assets/rumah-detail.jpg')] bg-cover bg-center h-52">
        <div class="justify-center items-center my-auto p-8">
            <div class="bg-gray-300 p-4">Property Details</div>
        </div>
    </div>
    <div class="p-8 flex flex-wrap bg-gray-200 mx-auto justify-center gap-2">
        <div
            class="bg-white w-full p-6 flex-col justify-center items-start mb-4 md:border-1 md:border-gray-300 md:p-10 md:w-6xl">
            <div class="mb-2">
                <span class="text-1xl mb-4 font-bold md:text-3xl">
                    {{ $rumah->nama }}</span>
            </div>
            <div class="md:hidden relative overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" id="carousel">
                    @php
                        $embedUrl = '';
                        if (strpos($rumah->video, 'youtube.com') !== false) {
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $rumah->video, $matches);
                            if (isset($matches[1])) {
                                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                            }
                        }
                    @endphp
                    @if ($embedUrl)
                        <iframe class="w-full flex-shrink-0 h-60" frameborder="0" src="{{ $embedUrl }}"
                            allowfullscreen controls></iframe>
                    @endif
                    @foreach ($images as $index => $foto)
                        @if ($index >= 0)
                            @php
                                $trimmed = trim($foto);
                            @endphp
                            @if ($trimmed)
                                <img src="{{ asset('storage/rumah_foto/' . $trimmed) }}" alt="Gambar 1"
                                    class="w-full flex-shrink-0 h-60">
                            @endif
                        @endif
                    @endforeach

                </div>
                <button class="absolute top-1/2 transform -translate-y-1/2 left-2 text-white p-2 rounded-full"
                    id="prev">
                    &lt;
                </button>
                <button class="absolute top-1/2 transform -translate-y-1/2 right-2 text-white p-2 rounded-full"
                    id="next">
                    &gt;
                </button>
            </div>

            <div class="hidden md:flex md:bg-black md:p-4 md:h-105 w-full gap-4">

                <div class=" md:w-[80%] p-0 m-0" id="preview">
                    <img class="h-full w-full rounded-lg mr-4 mb-4 cursor-pointer"
                        src="{{ asset('storage/rumah_foto/' . $utamaPertama) }}" alt="" id="previewImage"
                        onclick="tampilkanLayarPenuh(this)" />
                    <iframe id="previewVideo" class="h-full w-full rounded-lg mr-4 mb-4 hidden" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <div class=" w-1/4 rounded-lg overflow-auto hidden md:block " id="gallery">
                    <div class="p-2">
                        <img class="h-full w-full md:h-30 rounded-lg mr-4 mb-4 cursor-pointer gallery-items"
                            src="/assets/preview.png" data-src="{{ $rumah->video }}"
                            onclick="showVideo('{{ $rumah->video }}')" />
                        @foreach ($images as $index => $foto)
                            @if ($index >= 0)
                                @php
                                    $trimmed = trim($foto);
                                @endphp
                                @if ($trimmed)
                                    <img class="h-full w-full md:h-30 rounded-lg mr-4 mb-4 cursor-pointer gallery-items"
                                        src="{{ asset('storage/rumah_foto/' . $trimmed) }}"
                                        data-src='{{ asset('storage/rumah_foto/' . $trimmed) }}' alt="rumah" />
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="md:flex w-full hidden mb-2">
                @if ($rumah->label === 'Tersedia')
                    <div class="w-1/3 bg-green-500 p-2 text-white">{{ $rumah->label }}</div>
                @else
                    <div class="w-1/3 bg-red-500 p-2 text-white">{{ $rumah->label }}</div>
                @endif
                <div class="w-full bg-blue-400 p-2 text-white">
                    IDR. {{ number_format($rumah->harga, 0, '.', ',') }} - {{ $rumah->subNama }}
                </div>
            </div>
            @if ($rumah->label === 'Tersedia')
                <div class="w-full bg-green-500 p-2 text-white md:hidden">{{ $rumah->label }}</div>
            @else
                <div class="w-full bg-red-500 p-2 text-white md:hidden">{{ $rumah->label }}</div>
            @endif
            <div class="w-full bg-blue-400 p-2 text-white text-xs md:hidden">
                IDR. {{ number_format($rumah->harga, 0, '.', ',') }} - {{ $rumah->subNama }}
            </div>
            <div class="">
                <div class="bg-gray-300 w-full text-xs p-2 flex flex-col md:flex-row md:flex-nowrap md:gap-2 mb-4">
                    <div class="md:p-2 md:mr-auto">
                        <span class="md:text-[15px]">{{ $rumah->luas }} m2</span>
                        <hr class="text-gray-400 mt-2 mb-1 text-xs md:hidden" />
                    </div>
                    <div class="md:p-2 md:mr-auto">
                        <span class="md:text-[15px]">{{ $rumah->kamarTidur }} Kamar Tidur</span>
                        <hr class="text-gray-400 mt-2 mb-1 text-xs md:hidden" />
                    </div>
                    <div class="md:p-2 md:mr-auto">
                        <span class="md:text-[15px]">{{ $rumah->kamarMandi }} Kamar Mandi</span>
                        <hr class="text-gray-400 mt-2 mb-1 text-xs md:hidden" />
                    </div>
                    <div class="md:p-2 md:mr-auto">
                        <span class="md:text-[15px]">{{ $rumah->garasi }} Carport / Garasi</span>
                    </div>
                </div>
                <div class="text-justify mb-12">
                    <span class="text-gray-500 text-xs md:text-xl">
                        {!! $rumah->deskripsi !!}
                        @if (!empty($rumah->fotoDenah))
                            <br /><br>
                            <img class="md:h-200 md:mx-auto"
                                src="{{ asset('storage/rumah_foto/' . $rumah->fotoDenah) }}" alt="denah" /> <br />
                        @endif
                        {{ $rumah->deskripsiLanjutan }}
                    </span>
                </div>
                <div class="mb-8 md:mt-10">
                    <a href="https://www.whatsapp.com/" target="_blank"><img src="/assets/wa.png" alt="HUB" /></a>
                </div>
            </div>
        </div>

        <div
            class="bg-white w-full p-6 justify-center items-start mb-4 md:border-1 md:border-gray-300 md:p-4 md:w-6xl md:flex-wrap">
            <h1 class="text-2xl mb-4">Properti Sejenis</h1>
            <div class="md:flex md:flex-wrap">
                @foreach ($propertiSejenis as $properti)
                    @php
                        $propertiImages = $properti->foto ? explode(',', $properti->foto) : [];
                        $propertiImage = isset($propertiImages[0]) ? trim($propertiImages[0]) : null;
                    @endphp
                    <div class="mb-4 md:mb-0 md:w-1/3 md:p-2"><a href="{{ route('rumah_detail', $properti->id) }}">
                            <div class="shadow">
                                <div>
                                    <img class="h-44 w-full"
                                        src="{{ asset('storage/rumah_foto/' . $propertiImage) }}" />
                                </div>
                                <div class="p-2 md:p-2">
                                    <div class="text-justify">
                                        <span class="text-black">{{ Str::limit($properti->deskripsi, 100) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-blue-600">
                                            IDR. {{ number_format($rumah->harga, 0, '.', ',') }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    @component('components.footer')
    @endcomponent


</body>

</html>
