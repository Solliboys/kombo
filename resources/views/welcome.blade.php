<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Komunitas Mahasiswa Bondowoso - Politeknik Negeri Jember</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; }
        body { margin: 0; background: #f8fbff; color: #1f2937; }
        a { text-decoration: none; }

        /* Navbar */
        header {
            background: #ffffff;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }
        .logo { font-weight: bold; color: #2563eb; }
        nav a { margin: 0 12px; color: #374151; font-size: 14px; }
        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            display: inline-block;
            transition: all 0.2s;
        }
        .btn:hover { opacity: 0.9; transform: translateY(-1px); }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-outline { border: 1px solid #2563eb; color: #2563eb; }

        /* Hero */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 80px 40px;
            align-items: center;
        }
        .hero h1 { font-size: 36px; margin-bottom: 16px; }
        .hero p { color: #6b7280; margin-bottom: 24px; }
        .hero img { max-width: 100%; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }

        /* Feature box */
        .feature-box {
            background: #ffffff;
            margin: 0 40px;
            padding: 24px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 25px rgba(0,0,0,.05);
        }
        .features {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .feature-btn {
            padding: 8px 16px;
            font-size: 14px;
            color: #374151;
            background: #f1f5f9;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid transparent;
            font-weight: 500;
        }
        .feature-btn:hover {
            background: #e2e8f0;
            color: #2563eb;
            border-color: #bfdbfe;
            transform: translateY(-2px);
        }

        /* Services */
        .section { padding: 80px 40px; }
        .section h2 { text-align: center; margin-bottom: 12px; }
        .section p { text-align: center; color: #6b7280; margin-bottom: 40px; }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
        }
        .card {
            background: #ffffff;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,.05);
            transition: transform 0.3s;
        }
        .card:hover { transform: translateY(-5px); }
        .card h4 { margin-bottom: 8px; }
        .card p { font-size: 14px; color: #6b7280; }

        /* Profile */
        .profile {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            max-width: 900px;
            margin: auto;
        }
        .profile-card {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #fff;
            padding: 24px;
            border-radius: 20px;
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .profile-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            background: #fff;
        }

        /* Steps */
        .steps {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }
        .step { margin-bottom: 20px; }
        .step span {
            display: inline-block;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #2563eb;
            color: #fff;
            text-align: center;
            line-height: 28px;
            margin-right: 10px;
            font-size: 14px;
        }

        /* Footer */
        footer {
            background: #ffffff;
            padding: 40px;
            margin-top: 80px;
            border-top: 1px solid #e5e7eb;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 24px;
        }
        footer p, footer a { font-size: 14px; color: #6b7280; }

        /* News Cards */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin: 20px auto 0;
            max-width: 800px;
        }
        .news-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            border: 1px solid #f1f5f9;
        }
        .news-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .news-img {
            width: 100%;
            max-height: 180px;
            height: auto;
            object-fit: contain;
            display: block;
            background: #f8fafc;
            border-bottom: 1px solid #f1f5f9;
        }
        .news-content { padding: 12px; flex-grow: 1; display: flex; flex-direction: column; }
        .news-date { font-size: 9px; color: #94a3b8; margin-bottom: 4px; display: block; }
        .news-title { font-size: 14px; font-weight: bold; margin-bottom: 6px; color: #1e293b; line-height: 1.2; }
        .news-excerpt { font-size: 11px; color: #64748b; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 10px; }
        .news-btn { 
            margin-top: auto;
            color: #2563eb;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 3px;
        }
        .news-btn:hover { text-decoration: underline; }

        /* Poster Style for Jadwal (Ultra-Compact) */
        .poster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); /* Even smaller columns */
            gap: 12px;
            margin: 20px auto 0;
            max-width: 700px; /* Even narrower container */
        }
        .poster-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            border: 1px solid #f1f5f9;
            display: flex; flex-direction: column;
            aspect-ratio: 2/3.3; /* Optimized portrait */
        }
        .poster-card:hover { transform: translateY(-2px); }
        .poster-img {
            width: 100%;
            height: 55%; 
            object-fit: cover;
            background: #f8fafc;
        }
        .poster-content {
            padding: 8px; /* Tighter padding */
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        @media (max-width: 900px) {
            .hero, .profile, .steps { grid-template-columns: 1fr; }
            .feature-box { flex-direction: column; gap: 20px; text-align: center; }
            .features span { display: block; margin-bottom: 10px; margin-right: 0; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <header>
        <div class="logo">KOMUNITAS MAHASISWA</div>
        <nav>
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#">Layanan</a>
            <a href="#">Profil</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak</a>
        </nav>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <div>
            <h1>Komunitas Mahasiswa Bondowoso <span style="color:#2563eb">Politeknik Negeri Jember</span></h1>
            <p>Terlibat langsung dalam kolaborasi aktif mahasiswa untuk meningkatkan kontribusi bagi daerah Bondowoso.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Bergabung Sekarang</a>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1523240715632-6103498a35ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Student Community" />
        </div>
    </section>

    <!-- Feature Box -->
    <div class="feature-box">
        <div class="features">
            <a href="#berita" class="feature-btn">Berita Terkini</a>
            <button class="feature-btn">Jadwal Kegiatan</button>
            <button class="feature-btn">Edukasi Mahasiswa</button>
            <button class="feature-btn">Notifikasi</button>
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary">Unduh</a>
    </div>

    <!-- Berita Terkini -->
    <section id="berita" class="section" style="background: #ffffff; margin-top: 40px;">
        <h2>📰 Berita Terkini</h2>
        <p>Ikuti perkembangan terbaru dari Komunitas Mahasiswa Bondowoso.</p>
        
        <div class="news-grid">
            @forelse($beritas as $berita)
                <a href="{{ route('berita.show', $berita->slug) }}" class="news-card">
                    @if($berita->image)
                        <img src="{{ asset('storage/' . $berita->image) }}" class="news-img" alt="{{ $berita->title }}">
                    @else
                        <div class="news-img" style="display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                            <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div class="news-content">
                        <span class="news-date">{{ $berita->created_at->format('d M Y') }}</span>
                        <h4 class="news-title">{{ $berita->title }}</h4>
                        <div class="news-excerpt">
                            {!! Str::limit(strip_tags($berita->content), 100) !!}
                        </div>
                        <span class="news-btn">
                            Baca Selengkapnya
                            <svg style="width: 8px; height: 8px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    </div>
                </a>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #94a3b8;">
                    Belum ada berita yang diterbitkan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Jadwal Kegiatan -->
    <section id="jadwal" class="section" style="background: #f8fbff;">
        <h2>📅 Jadwal Kegiatan Terdekat</h2>
        <p>Jangan lewatkan agenda seru dari komunitas kami.</p>
        
        <div class="poster-grid">
            @forelse($jadwals as $jadwal)
                <div class="poster-card">
                    @if($jadwal->image)
                        <img src="{{ asset('storage/' . $jadwal->image) }}" class="poster-img" alt="{{ $jadwal->title }}">
                    @else
                        <div class="poster-img" style="background: #2563eb; color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 60%;">
                            <span style="font-size: 48px; font-weight: bold;">{{ \Carbon\Carbon::parse($jadwal->date)->format('d') }}</span>
                            <span style="font-size: 16px; text-transform: uppercase; letter-spacing: 2px;">{{ \Carbon\Carbon::parse($jadwal->date)->format('M Y') }}</span>
                        </div>
                    @endif
                    <div class="poster-content">
                        <span class="news-date" style="font-size: 8px;">📍 {{ $jadwal->location }}</span>
                        <span class="news-date" style="font-weight: bold; color: #2563eb; margin-top: 1px; font-size: 7px;">
                            {{ \Carbon\Carbon::parse($jadwal->date)->format('d M Y') }} · {{ \Carbon\Carbon::parse($jadwal->time)->format('H:i') }}
                        </span>
                        <h4 class="news-title" style="font-size: 11px; margin-top: 4px; line-height: 1.1;">{{ $jadwal->title }}</h4>
                        <p class="news-excerpt" style="-webkit-line-clamp: 2; font-size: 9px; margin-bottom: 0;">{{ $jadwal->description ?? 'Tidak ada deskripsi.' }}</p>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #94a3b8;">
                    Belum ada jadwal kegiatan mendatang.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Services -->
    <section class="section">
        <h2>Layanan terbaik yang kami tawarkan</h2>
        <p>Mendukung pengembangan potensi mahasiswa secara digital.</p>
        <div class="cards">
            <div class="card"><h4>Pengembangan Karir</h4><p>Program bimbingan karir dan magang.</p></div>
            <div class="card"><h4>Jadwal Kegiatan</h4><p>Informasi kegiatan komunitas terdekat.</p></div>
            <div class="card"><h4>Edukasi</h4><p>Materi pengembangan skill mahasiswa.</p></div>
            <div class="card"><h4>Database Anggota</h4><p>Riwayat keanggotaan tersimpan aman.</p></div>
            <div class="card"><h4>Tips Mahasiswa</h4><p>Tips praktis dunia kampus dan pasca kampus.</p></div>
        </div>
    </section>

    <!-- Profile -->
    <section class="section">
        <h2>Profil Pengurus</h2>
        <p>Pengurus aktif periode saat ini</p>
        <div class="profile">
            <div class="profile-card">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" />
                <div>
                    <h4>Fajar Ramadhan</h4>
                    <p>Ketua Umum</p>
                </div>
            </div>
            <div class="profile-card">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" />
                <div>
                    <h4>Siti Aminah</h4>
                    <p>Sekretaris Jenderal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Steps -->
    <section class="section">
        <h2>Cara kerja platform kami</h2>
        <div class="steps">
            <div>
                <div class="step"><span>1</span>Daftar Keanggotaan</div>
                <div class="step"><span>2</span>Masuk ke Dashboard</div>
                <div class="step"><span>3</span>Pantau Informasi</div>
            </div>
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Collaboration" />
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div>
                <strong>KOMBO</strong>
                <p>Dapatkan informasi dan kolaborasi mahasiswa Bondowoso secara digital.</p>
            </div>
            <div>
                <strong>Kontak</strong>
                <p>+62 812 3456 789</p>
                <p>kombopolije@gmail.com</p>
            </div>
            <div>
                <strong>Ikuti Kami</strong>
                <p>Instagram · Facebook · Twitter</p>
            </div>
        </div>
    </footer>

</body>
</html>
