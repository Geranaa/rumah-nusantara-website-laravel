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
        <span class="font-bold text-blue-500"> Edit Rumah ({{ $rumah->id }}) </span>
    </div>

    <div class="container mx-auto p-8 bg-white mt-4 w-5xl shadow text-black mb-8">
        <div class="flex justify-center mb-8">
            <span class="text-2xl font-bold"> EDIT DATA RUMAH </span>
        </div>
        <form action="{{ route('update', $rumah->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nama">Nama Properti</label><br />
                <input class="w-full border-2 p-2 mb-4" type="text" name="nama" maxlength="100"
                    value="{{ $rumah->nama }}" required placeholder="Masukkan Nama atau Judul maks 100 kata" /><br />

                <div class="flex gap-2">
                    <div>
                        <label for="harga">Harga</label><br />
                        <input class="w-[200px] border-2 p-2 mb-4" type="number" name="harga"
                            value="{{ $rumah->harga }}" required
                            placeholder="Masukkan
                            placeholder="Masukkan Harga
                            Properti" /><br />
                    </div>
                    <div class="w-full">
                        <label for="subNama">Sub Judul</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="text" name="subNama"
                            value="{{ $rumah->subNama }}" maxlength="55"
                            placeholder="Masukkan Subjudul maks 55 kata" /><br />
                    </div>
                </div>
                <label for="deskripsi">Deskripsi Properti</label><br />
                <textarea class="w-full h-50 border-2 p-2 mb-4" name="deskripsi" id="deskripsi"
                    placeholder="Masukkan deskripsi dari properti">{{ $rumah->deskripsi }}</textarea>
                <div class="flex gap-2">
                    <div class="w-[250px]">
                        <label for="luas">Luas m2</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="luas"
                            value="{{ $rumah->luas }}" placeholder="Masukkan luas" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="kamarTidur">Jumlah Kamar Tidur</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="kamarTidur"
                            value="{{ $rumah->kamarTidur }}" placeholder="Masukkan jumlah kamar tidur" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="kamarMandi">Jumlah Kamar Mandi</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="kamarMandi"
                            value="{{ $rumah->kamarMandi }}" placeholder="Masukkan jumlah mandi" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="garasi">Garasi/Port</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="number" name="garasi"
                            value="{{ $rumah->garasi }}" placeholder="Masukkan jumlah ketersediaan garasi" /><br />
                    </div>
                </div>
                <div class="flex gap-2 w-full">
                    <div class="w-[350px]">
                        <label for="video">Video</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="text" name="video"
                            value="{{ $rumah->video }}" placeholder="Masukkan Link Video" /><br />
                    </div>
                    <div class="w-[230px]">
                        <label for="label">Label (Status Ketersediaan)</label><br />
                        <select class="w-full border-2 p-2 mb-4" name="label" required>
                            <option value="Tersedia" {{ old('label', $rumah->label) == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia
                            </option>
                            <option value="Sudah Terjual"
                                {{ old('label', $rumah->label) == 'Sudah Terjual' ? 'selected' : '' }}>
                                Sudah Terjual</option>
                        </select>
                    </div>
                    <div class="w-[250px]">
                        <label for="foto">Foto</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="file" name="foto[]" multiple
                            value="{{ $rumah->foto }}" /><br />
                    </div>
                    <div class="w-[250px]">
                        <label for="fotoDenah">Foto Denah (Opsional)</label><br />
                        <input class="w-full border-2 p-2 mb-4" type="file" name="fotoDenah"
                            placeholder="Deskripsi Singkat dari produk" value="{{ $rumah->fotoDenah }}" /><br />
                    </div>
                </div>
                <div class="w-full">
                    <label for="deskripsiLanjutan">Deskripsi Lanjutan (Opsional)</label><br />
                    <textarea class="w-full h-40 border-2 p-2 mb-4" type="text" name="deskripsiLanjutan"
                        placeholder="Deskripsi Lanjutan maks 250 kata" maxlength="250">{{ $rumah->deskripsiLanjutan }}</textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="bg-blue-500 p-4 border text-white hover:bg-blue-700 cursor-pointer">Perbaharui Data
                    Rumah</button>
            </div>
        </form>
    </div>


</body>

</html>
