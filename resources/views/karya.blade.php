<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Karya | Anjaszkr</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { primary: '#f59e0b', } } } }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <nav class="sticky top-0 z-50 backdrop-blur-md bg-white/70 border-b border-slate-200">
        <div class="flex justify-between items-center py-5 px-8 w-full max-w-6xl mx-auto">
            <a href="/" class="text-2xl font-black text-slate-900 tracking-tight">
                Anjas<span class="text-primary">Zkr</span>
            </a>
            <div class="flex items-center gap-6 font-semibold text-slate-600 text-sm">
                <a href="/" class="hover:text-primary transition-colors duration-300">📝 Catatan</a>
                <a href="/photobooth" class="hover:text-primary transition-colors duration-300">📸 Photobooth</a>
                <a href="/admin" class="ml-2 px-6 py-2.5 bg-slate-900 text-white rounded-full hover:bg-slate-800 transition shadow-md">🔐 Login Admin</a>
            </div>
        </div>
    </nav>

    <header class="max-w-4xl mx-auto px-4 pt-16 pb-12 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">
            Etalase <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-yellow-400">Karya</span>
        </h2>
        <p class="text-lg text-slate-500 max-w-2xl mx-auto">
            Kumpulan proyek pengembangan web, eksperimen, dan tugas kelompok atau apalah terserah yang sudah berhasil diselesaikan.
        </p>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            @forelse ($projects as $project)
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">

                    <div class="w-full aspect-video bg-slate-100 relative">
                        @if($project->youtube_url)
                            @php
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $project->youtube_url, $match);
                                $youtubeId = $match[1] ?? null;
                            @endphp

                            @if($youtubeId)
                                <iframe class="w-full h-full absolute top-0 left-0" src="https://www.youtube.com/embed/{{ $youtubeId }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                                <div class="flex items-center justify-center w-full h-full text-slate-400">⚠️ Link YouTube Tidak Valid</div>
                            @endif

                        @elseif($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center w-full h-full text-slate-400 text-sm font-semibold">
                                🖼️ Tidak Ada Media
                            </div>
                        @endif
                    </div>

                    <div class="p-8 flex-1 flex flex-col">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ $project->title }}</h3>
                        <p class="text-slate-600 mb-6 flex-1">{{ $project->description }}</p>

                        @if($project->website_url)
                            <div class="mt-auto">
                                <a href="{{ $project->website_url }}" target="_blank" class="inline-flex items-center justify-center w-full px-6 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-primary transition-colors duration-300">
                                    🌐 Kunjungi Website
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <span class="text-4xl mb-4 block">🚀</span>
                    <h3 class="text-xl font-bold text-slate-800">Belum Ada Karya yang Dipajang</h3>
                    <p class="text-slate-500 mt-2">Masuk ke Dashboard Admin untuk mulai menambahkan proyek.</p>
                </div>
            @endforelse

        </div>
    </main>

</body>
     <footer class="bg-slate-900 text-slate-300 py-12 border-t-4 border-primary">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">

                <div>
                    <a href="/" class="text-2xl font-black text-white tracking-tight inline-block mb-4">
                        Anjas<span class="text-primary">Zkr</span>
                    </a>
                    <p class="text-sm text-slate-400 leading-relaxed mb-6 max-w-xs">
                        Mendokumentasikan apa saja yang saya pelajari, eksperimen web development, dan berbagai mahakarya digital.
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Jelajahi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="/karya" class="hover:text-primary transition-colors">Karya</a></li>
                        <li><a href="/photobooth" class="hover:text-primary transition-colors">Photobooth</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Terhubung Denganku</h4>
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/dvcdvcdd" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300" title="GitHub">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                        </a>

                        <a href="https://www.instagram.com/zakxyz.1945?igsh=MTFpZ2UweGUwOWkxZg==" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all duration-300" title="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                        </a>

                        <a href="mailto:anjaszakaria@gmail.com" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300" title="Email">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </a>
                    </div>
                </div>

            </div>

            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500">
                    &copy; 2026 AnjasZkr. All rights reserved.
                </p>
                <p class="text-sm text-slate-600 flex items-center gap-1">
                    Dibuat dengan menggunakan <a href="https://laravel.com" class="text-primary font-bold hover:underline">Laravel</a> dan <a href="https://tailwindcss.com" class="text-primary font-bold hover:underline">Tailwind CSS</a>.
                </p>
            </div>
        </div>
    </footer>
</html>
