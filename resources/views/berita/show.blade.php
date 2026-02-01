<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $berita->title }} - Komunitas Mahasiswa Bondowoso</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; }
        body { margin: 0; background: #f8fbff; color: #1f2937; line-height: 1.6; }
        a { text-decoration: none; }

        /* Navbar */
        header {
            background: #ffffff;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo { font-weight: bold; color: #2563eb; }
        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            display: inline-block;
            transition: all 0.2s;
        }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-outline { border: 1px solid #2563eb; color: #2563eb; }

        /* Content Container */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Article Header */
        .article-header { margin-bottom: 30px; }
        .back-link { 
            display: inline-flex; 
            align-items: center; 
            gap: 5px; 
            color: #2563eb; 
            font-size: 14px; 
            margin-bottom: 20px; 
            font-weight: 500;
        }
        .article-title { font-size: 32px; font-weight: bold; color: #1e293b; margin: 0 0 15px 0; line-height: 1.2; }
        .article-meta { color: #64748b; font-size: 14px; }

        /* Article Body */
        .article-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }
        .article-hero-img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            background: #f1f5f9;
        }
        .article-body { padding: 40px; }
        .prose { color: #334155; font-size: 16px; }
        .prose h1, .prose h2, .prose h3 { color: #1e293b; margin-top: 1.5em; }
        .prose p { margin-bottom: 1.5em; }
        .prose img { max-width: 100%; border-radius: 12px; margin: 20px 0; }
        .prose ul, .prose ol { padding-left: 1.5em; margin-bottom: 1.5em; }

        /* Footer */
        footer {
            background: #ffffff;
            padding: 40px;
            margin-top: 60px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }
        footer p { font-size: 14px; color: #6b7280; }

        @media (max-width: 768px) {
            .article-title { font-size: 24px; }
            .article-body { padding: 25px; }
            header { padding: 16px 20px; }
        }
    </style>
</head>
<body>

    <header>
        <a href="{{ url('/') }}" class="logo">KOMUNITAS MAHASISWA</a>
        <div>
            <a href="{{ url('/') }}" class="btn btn-outline">Beranda</a>
        </div>
    </header>

    <div class="container">
        <div class="article-header">
            <a href="{{ url('/') }}" class="back-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali ke Beranda
            </a>
            <h1 class="article-title">{{ $berita->title }}</h1>
            <div class="article-meta">
                <span>Diterbitkan pada {{ $berita->created_at->format('d M Y') }}</span>
                <span style="margin: 0 10px; opacity: 0.3;">|</span>
                <span>Oleh Admin</span>
            </div>
        </div>

        <article class="article-card">
            @if($berita->image)
                <img src="{{ asset('storage/' . $berita->image) }}" class="article-hero-img" alt="{{ $berita->title }}">
            @endif
            <div class="article-body">
                <div class="prose">
                    {!! $berita->content !!}
                </div>
            </div>
        </article>
    </div>

    <footer>
        <p>&copy; 2026 Komunitas Mahasiswa Bondowoso - Politeknik Negeri Jember</p>
    </footer>

</body>
</html>
