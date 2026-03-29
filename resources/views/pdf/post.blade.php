<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <style>
        /* Gaya CSS klasik untuk PDF */
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #f59e0b; /* Warna kuning khas web-mu */
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .meta {
            font-size: 12px;
            color: #777;
        }
        .content {
            font-size: 14px;
            text-align: justify;
        }
        /* Memastikan gambar tidak keluar dari kertas PDF */
        .content img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="title">{{ $post->title }}</div>
        <div class="meta">
            Ditulis oleh: {{ $post->user->name ?? 'Anonim' }} | Tanggal: {{ $post->created_at->format('d M Y') }}
        </div>
    </div>

    <div class="content">
        {!! $post->content !!}
    </div>

</body>
</html>
