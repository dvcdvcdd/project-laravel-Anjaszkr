<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Photobooth Anjas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans flex flex-col items-center justify-center min-h-screen p-4">

    <div class="max-w-2xl w-full bg-gray-800 rounded-3xl p-6 shadow-2xl border border-gray-700 text-center">
        <h1 class="text-3xl font-black text-amber-500 mb-2">📸 Anjas Photobooth</h1>
        <p class="text-gray-400 mb-6">Senyum yang lebar! Jepretanmu akan muncul di bawah.</p>

        <div class="relative bg-black rounded-2xl overflow-hidden shadow-inner mb-6 aspect-video">
            <video id="kamera" autoplay playsinline class="w-full h-full object-cover transform -scale-x-100"></video>
        </div>

        <button id="tombol-jepret" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105 active:scale-95 text-xl">
            📷 Jepret Sekarang!
        </button>

        <canvas id="kanvas" class="hidden"></canvas>

        <div id="hasil-area" class="mt-8 hidden flex flex-col items-center">
            <h3 class="text-lg font-semibold text-gray-300 mb-3">Hasil Jepretan:</h3>
            <img id="hasil-foto" class="mb-5 rounded-xl border-4 border-white shadow-xl transform -scale-x-100" />

            <button id="tombol-simpan" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105 active:scale-95 text-lg w-full max-w-sm">
                💾 Simpan ke Database
            </button>
        </div>
    </div>

    <script>
        const kamera = document.getElementById('kamera');
        const kanvas = document.getElementById('kanvas');
        const tombolJepret = document.getElementById('tombol-jepret');
        const hasilFoto = document.getElementById('hasil-foto');
        const hasilArea = document.getElementById('hasil-area');
        const tombolSimpan = document.getElementById('tombol-simpan');

        let dataFotoTerakhir = '';

        // 1. Menyalakan kamera
        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
            .then(function(stream) {
                kamera.srcObject = stream;
            })
            .catch(function(err) {
                alert("Kamera gagal diakses! Pastikan izin di browser sudah diberikan.");
                console.error("Error Kamera: ", err);
            });

        // 2. Logika Tombol Jepret
        tombolJepret.addEventListener('click', function() {
            kanvas.width = kamera.videoWidth;
            kanvas.height = kamera.videoHeight;

            let context = kanvas.getContext('2d');
            context.drawImage(kamera, 0, 0, kanvas.width, kanvas.height);

            let dataUrl = kanvas.toDataURL('image/jpeg', 0.6);

            // Tampilkan foto
            hasilFoto.src = dataUrl;
            hasilArea.classList.remove('hidden'); // Munculkan area hasil dan tombol simpan

            // Simpan sandi gambarnya untuk dikirim ke Laravel nanti
            dataFotoTerakhir = dataUrl;

            // Reset wujud tombol simpan kalau mau jepret ulang
            tombolSimpan.innerText = '💾 Simpan ke Database';
            tombolSimpan.classList.remove('bg-gray-500');
            tombolSimpan.classList.add('bg-green-500', 'hover:bg-green-600');
            tombolSimpan.disabled = false;
        });

        // 3. Logika Tombol Simpan (Mengirim ke Backend)
        tombolSimpan.addEventListener('click', function() {
            tombolSimpan.innerText = '⏳ Menyimpan...';
            tombolSimpan.disabled = true; // Kunci tombol biar tidak diklik 2x

            ffetch('/api/photobooth/save', { // <-- Tambahkan /api di depannya
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                    // Baris X-CSRF-TOKEN DIHAPUS SAJA
                },
                body: JSON.stringify({ image: dataFotoTerakhir })
            })
            .then(response => response.json())
            .then(data => {
                // Munculkan pop-up sukses
                alert(data.message);
                tombolSimpan.innerText = '✅ Berhasil Tersimpan!';
                tombolSimpan.classList.remove('bg-green-500', 'hover:bg-green-600');
                tombolSimpan.classList.add('bg-gray-500');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Waduh, gagal menyimpan foto! Cek console browser.');
                tombolSimpan.innerText = '❌ Gagal. Coba Lagi';
                tombolSimpan.disabled = false;
            });
        });
    </script>
</body>
</html>
