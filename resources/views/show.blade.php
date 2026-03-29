<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Web CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { primary: '#f59e0b', } } } }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <nav class="bg-white shadow-sm border-b border-gray-100 mb-8">
        <div class="max-w-4xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-black text-gray-900">&larr; Kembali</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 pb-24">
        <article class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100">
            <div class="mb-8 border-b pb-8">
                <div class="text-primary font-semibold tracking-wider uppercase mb-2">
                    {{ $post->created_at->format('d M Y') }}
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">{{ $post->title }}</h1>
            </div>

            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $post->content !!}
            </div>
            <div class="mt-8 mb-4 flex justify-end">
                <a href="{{ route('post.pdf', $post->id) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 text-white font-bold rounded-full hover:bg-red-700 transition shadow-lg transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
             Unduh Catatan (PDF)
                </a>
            </div>
        </article>
    </main>

</body>
</html>
