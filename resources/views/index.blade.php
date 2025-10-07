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

    <div
        class="flex mb-4 py-12 max-w-screen h-40 justify-center bg-gray-400 bg-[url('/public/assets/rumahbg.jpg')] bg-cover bg-center md:h-110">
    </div>
    <div class="flex justify-center items-center">
        <h1 class="text-2xl font-bold xl:text-4xl text-black">RUMAH NUSANTARA</h1>
    </div>
    <div class="flex justify-center items-center">
        <h1 class="font-bold md:text-xl text-black">"Sahabat Baik Rumah Anda"</h1>
    </div>
    <div class="md:flex justify-center md:items-center">
        <div class="p-10 md:p-0">
            <div
                class="container p-2 justify-center items-center bg-slate-800 shadow md:flex md:flex-nowrap md:p-4 md:justify-start md:items-start md:w-6xl md:mt-4 text-black">
                <input class="w-full rounded-xl mb-2 md:w-[1200px] mr-2 p-2 shadow bg-white rounded-l-xl" type="text"
                    placeholder="Rumah Tipe 65" />
                <a href=""
                    class="hidden md:block bg-blue-600 hover:bg-blue-700 text-white p-2 w-[100px] text-center rounded-xl">Cari</a>
                <div class="md:hidden flex justify-center">
                    <a href="" class="bg-blue-600 text-white p-1 w-[100px] text-center rounded-xl">Cari</a>
                </div>
            </div>
            <div
                class="container p-2 items-start bg-white shadow md:flex md:flex-wrap md:p-8 md:justify-center md:w-6xl text-black mb-4">
                @if ($rumahs->isEmpty())
                    <h1 style="color: gray">Tidak ada data Rumah, Silakan cek kembali beberapa waktu kedepan atau
                        hubungi Layanan Pengguna Kami</h1>
                @endif
                @foreach ($rumahs as $rumah)
                    <div class="md:w-1/2 md:p-2"><a href="{{ route('rumah_detail', $rumah->id) }}">
                            <div
                                class="bg-gray-100 p-2 flex-col justify-center items-center md:border-1 md:border-gray-300 md:p-4 mb-4">
                                <span class="text-1xl font-bold md:text-[18px]">{{ $rumah->nama }}</span>
                                <div class="bg-white w-full h-52 md:max-h-50 mt-2 md:mt-2 md:flex md:mb-0 md:p-1">
                                    @php
                                        $images = $rumah->foto ? explode(',', $rumah->foto) : [];
                                        $utamaPertama = isset($images[0]) ? trim($images[0]) : null;
                                    @endphp
                                    <div class="relative w-full h-full md:w-1/2"><img class="w-full h-full"
                                            src="{{ asset('storage/rumah_foto/' . $utamaPertama) }}" alt="">
                                        @if ($rumah->label === 'Tersedia')
                                            <label
                                                class="bg-green-500 text-white p-2 absolute top-0 left-0">{{ $rumah->label }}</label>
                                        @else
                                            <label
                                                class="bg-red-500 text-white p-2 absolute top-0 left-0">{{ $rumah->label }}</label>
                                        @endif
                                    </div>
                                    <div class="mb-1 md:flex-col md:w-1/2">
                                        <div class="hidden md:block w-full bg-gray-700 p-2 text-white">
                                            <span class="hidden md:block md:text-xl font-medium">
                                                IDR. {{ number_format($rumah->harga, 0, '.', ',') }}
                                            </span>
                                            <span class="hidden md:block">
                                                {{ $rumah->subNama }}
                                            </span>
                                        </div>
                                        <div class="ml-2 hidden md:block">
                                            <span class="text-xs">
                                                {{ Str::limit(strip_tags($rumah->deskripsi), 115) }}
                                            </span>
                                            <div>
                                                <span class="text-xs">Selengkapnya ⮞</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-700 p-2 mb-2 text-white md:hidden">
                                    IDR. {{ number_format($rumah->harga, 0, ',', '.') }} {{ $rumah->subNama }}
                                </div>
                                <div class="mb-1">
                                    <span class="text-xs md:hidden">
                                        {{ Str::limit(strip_tags($rumah->deskripsi), 115) }}
                                    </span>
                                </div>
                                <span class="text-xs md:hidden">Selengkapnya ⮞</span>
                                <hr class="mt-2 md:hidden" />
                                <div class="md:flex">
                                    <div
                                        class="bg-white md:bg-gray-300 w-full text-xs p-2 md:p-0 flex flex-col md:flex-row md:flex-nowrap md:mt-2">
                                        <div class="md:bg-gray-300 p-2 md:border md:border-gray-200">
                                            <span>{{ $rumah->luas }} </span><span class="font-medium">
                                                m<sup>2</sup></span>
                                            <hr class="text-gray-400 mt-2 mb-1 text-xs md:hidden" />
                                        </div>
                                        <div class="md:bg-gray-300 p-2 md:border md:border-gray-200">
                                            <span> {{ $rumah->kamarTidur }} </span><span class="font-medium">
                                                Kamar Tidur</span>
                                            <hr class="text-gray-400 mt-2 mb-1 text-xs md:hidden" />
                                        </div>
                                        <div class="md:bg-gray-300 p-2 md:border md:border-gray-200">
                                            <span> {{ $rumah->kamarMandi }} </span><span class="font-medium">
                                                Kamar Mandi</span>
                                            <hr class="text-gray-400 mt-2 mb-1 text-xs md:hidden" />
                                        </div>
                                        <div class="md:bg-gray-300 p-2 md:border-l-gray-200">
                                            <span> {{ $rumah->garasi }} </span><span class="font-medium">
                                                Garasi/Carport</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </a>
                @endforeach

                <div class="w-full flex justify-center">
                    {{ $rumahs->links() }}
                </div>
            </div>

        </div>
    </div>

    @component('components.footer')
    @endcomponent


</body>

</html>
