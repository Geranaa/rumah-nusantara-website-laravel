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

<body class="bg-gray-300">
    @component('components.navBar')
    @endcomponent

    <div class="container mx-auto w-5xl bg-white p-4 text-black shadow mb-4">
        <span class="mr-6 font-bold text-blue-500">
            Daftar Rumah </span>

        <a href="{{ route('rumah_tambah') }}"><span class="font-bold hover:text-blue-500"> Tambah Rumah </span>
        </a>
    </div>

    <div class="container mx-auto bg-white p-4 text-black">
        <h1 class="text-4xl font-black">DATABASE DAFTAR RUMAH</h1>
        <h1 class="text-xl font-black">MANAJEMEN RUMAH BERSUBSIDI, TERINTEGRASI DENGAN DATABASE</h1>
        <input class="shadow w-full border-2 h-12 mb-8 mt-2 p-2" type="text" placeholder="Pencarian">
        <div class="flex">
            <h1 class="font-medium">Jumlah Rumah Keseluruhan: {{ $rumahTotal }} Unit</h1>
            <h1 class="font-medium ml-4">Jumlah Rumah Tersedia: {{ $rumahTersedia }} Unit</h1>
            <h1 class="font-medium ml-4">Jumlah Rumah Terjual: {{ $rumahTerjual }} Unit</h1>
        </div>
        <table class="table-fixed border-collapse w-full">
            @if ($rumahs->isEmpty())
                <h1 style="color: gray">Tidak ada data Rumah, Silakan menambahkan data Rumah</h1>
            @endif
            @foreach ($rumahs as $rumah)
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="w-[4px] border border-black">No</th>
                        <th class="w-10 border border-black">Nama Properti</th>
                        <th class="w-4 border border-black">Harga</th>
                        <th class="w-10 border border-black">Deskripsi</th>
                        <th class="w-4 border border-black">Label</th>
                        <th class="w-6 border border-black">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-2">{{ $rumah->id }}</td>
                        <td class="border border-black p-2">
                            {{ $rumah->nama }}
                        </td>
                        <td class="border border-black p-2 text-center">
                            IDR. {{ number_format($rumah->harga, 0, ',', '.') }}
                        </td>
                        <td class="border border-black p-2">
                            {{ strip_tags($rumah->deskripsi) }}
                        </td>
                        <td class="border border-black p-2 text-center text-white">
                            @if ($rumah->label === 'Tersedia')
                                <label class="bg-green-500 text-white p-2">{{ $rumah->label }}</label>
                            @else
                                <label class="bg-red-500 text-white p-2">{{ $rumah->label }}</label>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            <div class="flex justify-evenly">
                                <a class="p-2 shadow bg-green-500 text-white hover:bg-green-800"
                                    href="{{ route('rumah_detail', $rumah->id) }}">Lihat</a>
                                <a class="p-2 shadow bg-yellow-300 text-white hover:bg-yellow-800"
                                    href="{{ route('edit', $rumah->id) }}">Edit</a>
                                <form action="{{ route('hapus', $rumah->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data rumah ini? Tindakan tidak dapat dikembalikan jika sudah dilakukan, dan harus memasukkan ulang data Rumah')">
                                    @csrf
                                    <button class="p-2 shadow bg-red-500 text-white hover:bg-red-800 cursor-pointer"
                                        type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>

        <div class="w-full flex justify-center mt-8">
            {{ $rumahs->links() }}
        </div>
    </div>
    </div>

</body>

</html>
