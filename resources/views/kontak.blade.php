<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/assets/Rumah Nusantara.svg" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Rumah Nusantara - Kontak dan Bantuan</title>
</head>

<body class="bg-[url('/public/assets/support.jpg')] bg-cover bg-top">
    @component('components.navBar')
    @endcomponent

    <div class="p-4">
        <main
            class="container mx-auto w-full md:w-5xl bg-white hover:bg-slate-900 hover:text-white transition-all duration-500 md:p-10 mb-4 md:mt-33 md:mb-34 shadow rounded-lg p-4">
            <section class="md:flex">
                <div class="mb-4 md:w-1/2">
                    <h1 class="font-bold text-2xl mb-4">Kontak dan Bantuan</h1>
                    <p class="mb-4">
                        Memiliki pertanyaan maupun keluhan terhadap pelayanan atau produk kami? Jangan sungkan untuk
                        menghubungi kami melalui kontak di bawah.
                    </p>
                    <address>
                        <ul class="list-none">
                            <li class="mb-2">
                                <span class="font-medium text-xs md:text-sm">• Layanan Pengguna (08.00-17.00 WIB):
                                    (+62)12345678910</span>
                            </li>
                            <li class="mb-2">
                                <span class="font-medium text-xs md:text-sm">• WhatsApp (24 Jam):
                                    (+62)12345678910</span>
                            </li>
                            <li>
                                <span class="font-medium text-xs md:text-sm">• Alamat Email:
                                    rumahnusantarakalbar@gmail.com</span>
                            </li>
                        </ul>
                    </address>
                </div>
                <div class="md:w-1/2 flex justify-center items-center">
                    <img src="/assets/Rumah Nusantara.svg" alt="Logo Rumah Nusantara" class="max-w-full h-auto" />
                </div>
            </section>
        </main>
    </div>

    @component('components.footer')
    @endcomponent
</body>

</html>
