<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wall of Fame - Photobooth</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans min-h-screen p-8">

    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-black text-amber-500 mb-4">🌟 Wall of Fame</h1>
            <p class="text-lg text-gray-400">Kumpulan senyum terbaik dari pengunjung Photobooth.</p>
            <a href="/photobooth" class="inline-block mt-6 bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-full transition">
                📷 Ikut Foto
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($photos as $photo)
                <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-xl border border-gray-700 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Jepretan Photobooth" class="w-full h-56 object-cover transform -scale-x-100">

                    <div class="p-4 text-center bg-gray-800">
                        <p class="text-xs text-gray-400 font-medium">
                            Dijepret pada:<br>
                            <span class="text-gray-200">{{ $photo->created_at->format('d M Y, H:i') }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        @if($photos->isEmpty())
            <div class="text-center bg-gray-800 rounded-3xl p-12 border border-gray-700 mt-8">
                <span class="text-6xl block mb-4">👻</span>
                <h2 class="text-2xl font-bold text-gray-300 mb-2">Wah, galerinya masih kosong!</h2>
                <p class="text-gray-500">Jadilah orang pertama yang memajang wajahmu di sini.</p>
            </div>
        @endif

    </div>

</body>
</html>
