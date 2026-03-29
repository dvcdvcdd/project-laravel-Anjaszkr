<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index()
    {
        $post = Post::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Artikel Berhasil Diambil',
            'data'    => $post
        ], 200);
    }
}
