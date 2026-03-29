<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Photobooth;
use Illuminate\Support\Facades\Validator;

// Loket API penerima foto dari HP
Route::post('/photobooth/save', function (Request $request) {

    // Pastikan data 'image' ada dan wujudnya teks
    $validator = Validator::make($request->all(), [
        'image' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Paket mencurigakan atau kosong!'], 400);
    }

    $image = $request->input('image');

    if (!str_contains($image, 'data:image/jpeg;base64,')) {
        return response()->json(['error' => 'Bahaya! Ini bukan format gambar yang diizinkan!'], 400);
    }

    // PROSES AMAN: Bersihkan sandi dan simpan
    $image = str_replace('data:image/jpeg;base64,', '', $image);
    $image = str_replace(' ', '+', $image);

    $imageName = 'photos/foto-' . Str::random(10) . '.jpg';
    Storage::disk('public')->put($imageName, base64_decode($image));
    Photobooth::create(['image_path' => $imageName]);

    return response()->json(['message' => 'Foto aman dan sukses disimpan ke Database!']);

})->middleware('throttle:3,1'); // Batasi 3 permintaan per menit untuk mencegah spam

Route::get('/test-simpan-foto', function () {

    $dummyImage = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAP//////////////////////////////////////////////////////////////////////////////////////wgALCAABAAEBAREA/8QAFBABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQABPxA=';

    $image = str_replace('data:image/jpeg;base64,', '', $dummyImage);
    $image = str_replace(' ', '+', $image);

    $imageName = 'photos/foto-test-' . Str::random(5) . '.jpg';
    Storage::disk('public')->put($imageName, base64_decode($image));
    App\Models\Photobooth::create(['image_path' => $imageName]);

    return 'Sukses! Cek folder storage/app/public/photos dan database phpMyAdmin-mu.';
});

Route::get('/posts', [PostApiController::class, 'index']);
