<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Models\Photobooth;
Use App\Models\Post;
Use Barryvdh\DomPDF\Facade\Pdf;
Use App\Models\Project;
Use App\Http\Controllers\ProjectController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{id}', [HomeController::class, 'show'])->name('post.show');
Route::get('/post/{id}/pdf', function ($id) {
    $post = Post::findOrFail($id);
    $pdf = Pdf::LoadView('pdf.post', compact('post'));
    return $pdf->download('Catatan_Anjas_' . $post->id . '.pdf');
}) ->name('post.pdf');

Route::get('/photobooth', function() {
    return view('photobooth');
});

Route::get('/galeri', function() {
    $photos = App\Models\Photobooth::latest()->get();
    return view('galeri', compact('photos'));
});

Route::get('/karya', [ProjectController::class, 'index']);
