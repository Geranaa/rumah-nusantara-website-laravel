<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/assets/Rumah Nusantara.svg" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#deskripsi',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'print', 'preview', 'searchreplace',
                'spellchecker',
                'table', 'directionality', 'code', 'fullscreen', 'insertdatetime', 'media', 'paste',
                'textcolor', 'contextmenu',
                'template', 'visualblocks', 'wordcount', 'help', 'emoticons',
            ],
            license_key: 'gpl',
            content_css: 'default',
            toolbar_mode: 'floating',
            content_style: 'ul { list-style-type: disc; } ol { list-style-type: decimal; }',
            toolbar: 'undo | styleselect | bold italic underline | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | preview | emoticons | devs',
            setup: function(editor) {
                editor.ui.registry.addButton('devs', {
                    text: 'Developer: SILVESTER SEBASTIAN GERANA',
                    onAction: function(_) {
                        // editor.insertContent('Teks yang disisipkan');
                    }
                });
            }
        });
    </script>
    <title>Rumah Nusantara</title>
</head>

<body class="bg-gray-300">
    @component('components.navBar')
    @endcomponent

    <div class="container mx-auto w-5xl bg-white p-4 text-black shadow">
        <a class="mr-6" href="{{ route('rumah_daftar') }}"><span class="font-bold hover:text-blue-500">
                Daftar Rumah </span>
        </a>
        <span class="font-bold text-blue-500"> Tambah Rumah </span>
    </div>

    <div class="container mx-auto p-8 bg-white mt-4 w-5xl shadow text-black mb-8">
        <div class="flex justify-center mb-8">
            <span class="text-2xl font-bold"> TAMBAH DATA RUMAH </span>
        </div>
        <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data" id="myForm">
            @csrf
            <div>
                <label for="nama">Nama Properti</label><br />
                <input class="w-full border-2 p-2 mb-4" type="text" name="nama" maxlength="100" value=""
                    required placeholder="Masukkan Nama atau Judul maks 100 kata" /><br />

                <div class="flex gap-2">
                    <div>
                        <label for="harga">Harga</label><br />
                        <input class="w-[200px] border-2 p-2 mb-4" type="number" name="harga" value=""
                            placeholder="Masukkan Harga Properti" /><br />
                    </div>
                    <div class="w-full">
                        <label for="subNama">Sub Judul</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="text" name="subNama" value=""
                            maxlength="55" placeholder="Masukkan Subjudul maks 55 kata" /><br />
                    </div>
                </div>
                <label for="deskripsi">Deskripsi Properti</label><br />
                <textarea class="w-full h-130 border-2 p-2 mb-4" id="deskripsi" name="deskripsi"
                    placeholder="Masukkan deskripsi dari properti"></textarea>
                <div class="flex gap-2">
                    <div class="w-[250px]">
                        <label for="luas">Luas m2</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="luas" value=""
                            placeholder="Masukkan luas" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="kamarTidur">Jumlah Kamar Tidur</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="kamarTidur" value=""
                            placeholder="Masukkan jumlah kamar tidur" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="kamarMandi">Jumlah Kamar Mandi</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="kamarMandi" value=""
                            placeholder="Masukkan jumlah mandi" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="garasi">Garasi/Port</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="garasi" value=""
                            placeholder="Masukkan jumlah ketersediaan garasi" /><br />
                    </div>
                </div>
                <div class="flex gap-2 w-full">
                    <div class="w-[500px]">
                        <label for="video">Video</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="text" name="video"
                            placeholder="Masukkan Link Video" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="foto">Foto</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="file" name="foto[]" multiple /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="fotoDenah">Foto Denah (Opsional)</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="file" name="fotoDenah"
                            placeholder="Deskripsi Singkat dari produk" /><br />
                    </div>
                </div>
                <div class="w-full">
                    <label for="deskripsiLanjutan">Deskripsi Lanjutan (Opsional)</label><br />
                    <textarea class="w-full h-40 border-2 p-2 mb-4" type="text" name="deskripsiLanjutan" maxlength="250"
                        placeholder="Deskripsi Lanjutan maks 250 kata"></textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="bg-blue-500 p-4 border text-white hover:bg-blue-700 cursor-pointer">Tambahkan Data
                    Rumah</button>
            </div>
        </form>


    </div>


</body>

</html>
