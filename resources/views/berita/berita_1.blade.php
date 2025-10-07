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

<body>
    @component('components.navBar')
    @endcomponent
    <div class="md:flex-col md:w-5xl md:mx-auto">
        <div class="title mb-4 p-4 md:text-center">
            <h1 class="font-medium text-3xl font-serif md:text-4xl"> Rumah Nusantara Kini Ada Websitenya! Grand
                Launching
                Website
                Rumah
                Nusantara</h1>

            <h6 class="text-gray-400 md:text-xl">Dirilis pada 14 Maret 2025, 20.00 WIB</h6>
        </div>
        <div class="md:flex md:flex-col">
            <div class="md:mx-auto"><img class="w-full md:w-5xl" src="/assets/berita1.jpg" alt="berita"></div>
            <div class="px-4 md:mx-auto"><span class="text-gray-400 text-xs md:text-[14px]">Gambar Tangkapan Layar
                    Website Rumah Nusantara</span></div>
        </div>
    </div>
    <div class="md:w-5xl flex-col mx-auto mb-36 mt-3">
        <div class="p-4 ">Selamat datang di Rumah Nusantara, sebuah platform digital yang hadir sebagai jembatan
            impian bagi masyarakat Kalimantan Barat untuk memiliki rumah bersubsidi yang berkualitas dan terjangkau.
            Kami memahami betul bahwa memiliki hunian yang layak adalah dambaan setiap keluarga, sebuah fondasi kokoh
            untuk membangun masa depan yang lebih baik. Berangkat dari pemahaman mendalam akan kebutuhan ini, Rumah
            Nusantara hadir dengan visi untuk menjadi mitra terpercaya pemerintah dan masyarakat dalam menyukseskan
            program penyediaan rumah bersubsidi di seluruh penjuru Kalimantan Barat.</div>
        <div class="p-4">Kalimantan Barat, dengan kekayaan alam dan keragaman budayanya, menyimpan potensi
            pertumbuhan ekonomi yang signifikan. Seiring dengan pertumbuhan ini, kebutuhan akan hunian yang layak dan
            terjangkau bagi masyarakat berpenghasilan rendah (MBR) semakin mendesak. Rumah Nusantara hadir untuk
            menjawab tantangan ini, menyediakan akses informasi yang mudah, transparan, dan komprehensif mengenai
            berbagai pilihan rumah bersubsidi yang tersedia di berbagai lokasi strategis di Kalimantan Barat.</div>
        <div class="p-4">Kami mengundang Anda, masyarakat Kalimantan Barat, untuk menjelajahi Rumah Nusantara dan
            menemukan berbagai pilihan rumah bersubsidi yang sesuai dengan kebutuhan dan impian Anda. Jadikan Rumah
            Nusantara sebagai mitra terpercaya dalam perjalanan Anda meraih hunian yang layak dan terjangkau di Bumi
            Khatulistiwa. Bersama, kita wujudkan mimpi memiliki rumah, membangun masa depan yang lebih cerah untuk
            keluarga tercinta.

            Rumah Nusantara hadir untuk Anda, dengan sepenuh hati dan komitmen yang tak tergoyahkan. Selamat mencari
            rumah impian Anda!</div>
    </div>

    @component('components.footer')
    @endcomponent


</body>

</html>
