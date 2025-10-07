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

<body class="bg-[url('/public/assets/rumahh.jpg')] bg-cover">

    <div class="container mx-auto mt-60 w-190 h-90 bg-white p-2">
        <div class="bg-bsi w-full h-full rounded-lg p-4">
            <h1 class="text-white text-center text-2xl font-bold">RUMAH NUSANTARA</h1>
            <h1 class="text-white text-center text-xl font-bold">Administrator Only</h1><br>
            <div class="flex justify-center items-center">
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <input class="bg-white w-80 p-1" name="email" type="text" required
                        value="{{ old('email') }}"><br><br>
                    <input class="bg-white w-80 p-1" name="password" type="password" required><br><br>
                    <button class="p-2 bg-white w-40 hover:bg-sky-800 hover:text-white ml-20">Masuk</button>
                </form>
            </div>
        </div>
    </div>



</body>

</html>
