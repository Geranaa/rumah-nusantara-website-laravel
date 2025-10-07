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
    <div class="md:flex-col md:w-5xl md:mx-auto">
        <div class="mb-2 p-4 md:text-center">
            <h1 class="font-medium text-3xl font-serif md:text-4xl">Berita Rumah Nusantara</h1>
            <h1 class="font-medium text-xs font-serif md:text-xl">Portal Berita dan Info Terupdate Seputar Rumah
                Nusantara</h1>
        </div>
        <div class="md:flex md:flex-col md:w-5xl p-4">
            <a href="{{ route('berita_1') }}">
                <div class="w-full bg-white shadow rounded-lg pb-8 px-3 pt-2 mb-4">
                    <div class="mb-2 font-medium md:text-2xl">Rumah Nusantara Kini Ada Websitenya! Grand
                        Launching
                        Website
                        Rumah
                        Nusantara</div>
                    <div class="text-xs text-justify md:text-[16px]">Distributor rumah bersubsidi di Kota Pontianak,
                        Rumah Nusantara kini memiliki website resmi sebagai sarana informasi dan promosi properti yang
                        tersedia sehingga bisa dengan mudah diakses oleh calon pembeli</div>
                </div>
            </a>
            <a href="{{ route('berita_1') }}">
                <div class="w-full bg-white shadow rounded-lg  pb-8 px-3 pt-2 mb-4">
                    <div class="mb-2 font-medium md:text-2xl">Rumah Nusantara Sebagai Distributor Rumah Bersubsidi di
                        Kota Pontianak</div>
                    <div class="text-xs text-justify md:text-[16px]">Rumah Nusantara, Distributor rumah bersubsidi di
                        Kota Pontianak, terus memastikan ketersediaan stok rumah terdistribusi untuk masyarakat yang
                        ingin memiliki rumah murah dengan kualitas yang baik</div>
                </div>
            </a>
            <a href="{{ route('berita_1') }}">
                <div class="w-full bg-white shadow rounded-lg  pb-8 px-3 pt-2 mb-4 md:mb-40">
                    <div class="mb-2 font-medium md:text-2xl">Promo Tahun Baru, Temukan Rumah Impianmu Sekarang!</div>
                    <div class="text-xs text-justify md:text-[16px]">Semarak tahun baru, Rumah Nusantara mengucapkan
                        selamat tahun baru 2025, menyambut tahun yang baik ini Rumah Nusantara mengadakan promo kepada
                        para calon pembeli yang berminat untuk memiliki rumah dengan berbagai tipe khususnya tipe 120
                    </div>
                </div>
            </a>
        </div>
    </div>


    @component('components.footer')
    @endcomponent


</body>

</html>
