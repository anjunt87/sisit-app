<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Nurul Imam Karawang NIIS">
    <meta name="keywords"
        content="nurul, imam, niis, nurul imam, niis, nurul imam karawang, sdit karawang, nurul iman islamic, sdit nurul iman karawang, nurul imam islamic school, nurul imam islamic school karawang">
    <meta name="author" content="niis, niis official">
    <meta property="og:site_name" content="Nurul Imam Islamic School">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nurulimamkarawang.sch.id">
    <meta property="og:title" content="Nurul Imam Islamic School">
    <meta property="og:description" content="Nurul Imam Islamic School">
    <meta property="og:image" content="https://nurulimamkarawang.sch.id/ui-kit/img/logo.png">
    <meta name="csrf-token" content="I0OXUghCGEfeBqZjzbAqqAwMiAgYoBNRgjHRkoit">
    <title>SISIT - Nurul Imam Islamic School</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/logo-niis-warna.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .floating {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .gradient-text {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .typing-animation {
            overflow: hidden;
            border-right: 3px solid #fbbf24;
            white-space: nowrap;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: #fbbf24;
            }
        }

        .stat-counter {
            font-size: 2.5rem;
            font-weight: 800;
            color: #059669;
        }

        .testimonial-card {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-left: 4px solid #059669;
        }

        .wave-divider {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' stroke='%23059669' stroke-width='2' stroke-dasharray='6%2c14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateX(-100px) rotate(0deg);
            }

            100% {
                transform: translateX(calc(100vw + 100px)) rotate(360deg);
            }
        }

        .nav-blur {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transition: all 0.3s ease;
        }

        .parallax {
            transform-style: preserve-3d;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-4 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .expanded {
            display: block !important;
            -webkit-line-clamp: unset !important;
            overflow: visible !important;
        }

        .news-excerpt {
            max-height: 3em;
            transition: max-height 0.3s ease;
        }

        .news-excerpt.expanded {
            max-height: none;
        }

        /* Solusi 1: Konsisten tinggi untuk judul */
        .news-title {
            min-height: 3.5rem;
            /* Tinggi minimum untuk 2 baris */
            display: flex;
            align-items: center;
        }

        /* Solusi 2: Ellipsis untuk judul panjang */
        .news-title-ellipsis {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 3.5rem;
        }
    </style>
</head>

<body class="bg-white text-gray-800 overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 nav-blur shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        {{-- <i class="fas fa-graduation-cap text-2xl text-green-600 mr-2"></i>
                        <span class="font-bold text-xl text-gray-800">SISIT</span> --}}
                        <img src="{{ asset('storage/img/logo-niis-warna.png') }}" class="w-10 h-10 object-contain"
                            alt="Logo NIIS">
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition">Beranda</a>
                        <a href="#about"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition">Tentang</a>
                        <a href="#programs"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition">Program</a>
                        <a href="#facilities"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition">Fasilitas</a>
                        <a href="#contact"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium transition">Kontak</a>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm font-medium">Masuk</a>
                    <a href="{{ url('/daftar') }}"
                        class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-500 transition text-sm font-medium">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white py-32 px-6 relative">
        <div class="floating-shapes">
            <div class="shape w-16 h-16 bg-yellow-300 rounded-full" style="top: 20%; animation-delay: 0s;"></div>
            <div class="shape w-12 h-12 bg-white rounded-full" style="top: 60%; animation-delay: 5s;"></div>
            <div class="shape w-20 h-20 bg-yellow-300 rounded-full" style="top: 40%; animation-delay: 10s;"></div>
        </div>

        <div class="max-w-7xl mx-auto text-center relative z-10">
            <div class="fade-in">
                <div class="mb-6">
                    <span class="inline-block bg-yellow-300 text-gray-900 px-4 py-2 rounded-full text-sm font-semibold">
                        🏆 Sekolah Islam Terpadu Terbaik
                    </span>
                </div>

                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Selamat Datang di <br>
                    <span class="gradient-text typing-animation inline-block">NURUL IMAM ISLAMIC SCHOOL</span>
                </h1>

                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
                    Sekolah Islam Terpadu Nurul Imam - Membentuk Generasi Qurani, Berakhlak Mulia, dan Berprestasi
                    Global
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                    <a href="#"
                        class="group bg-white text-green-700 font-semibold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk Sekarang
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#"
                        class="group bg-yellow-300 text-gray-900 font-semibold px-8 py-4 rounded-xl hover:bg-yellow-400 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <div class="glass-effect p-4 rounded-xl text-center">
                        <div class="stat-counter text-white text-3xl font-bold" data-target="15" data-suffix="+">0
                        </div>
                        <p class="text-sm text-white">Tahun Pengalaman</p>
                    </div>
                    <div class="glass-effect p-4 rounded-xl text-center">
                        <div class="stat-counter text-white text-3xl font-bold" data-target="1000" data-suffix="+">0
                        </div>
                        <p class="text-sm text-white">Siswa Aktif</p>
                    </div>
                    <div class="glass-effect p-4 rounded-xl text-center">
                        <div class="stat-counter text-white text-3xl font-bold" data-target="50" data-suffix="+">0
                        </div>
                        <p class="text-sm text-white">Guru Profesional</p>
                    </div>
                    <div class="glass-effect p-4 rounded-xl text-center">
                        <div class="stat-counter text-white text-3xl font-bold" data-target="95" data-suffix="%">0
                        </div>
                        <p class="text-sm text-white">Tingkat Kelulusan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-gradient-to-br from-gray-50 to-white px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="slide-in-left">
                    <div class="mb-6">
                        <span
                            class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                            Tentang Kami
                        </span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                        Membangun Masa Depan Melalui
                        <span class="text-green-600">Pendidikan Islami</span>
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        SISIT adalah lembaga pendidikan Islam terpadu yang mengintegrasikan kurikulum nasional dengan
                        nilai-nilai Islam. Kami berkomitmen membentuk generasi yang cerdas secara intelektual,
                        spiritual, dan emosional.
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Kurikulum Terintegrasi</h4>
                                <p class="text-gray-600">Menggabungkan kurikulum nasional dengan kurikulum khas</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-users text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Tenaga Pengajar Berkualitas</h4>
                                <p class="text-gray-600">Guru profesional dengan pengalaman dan dedikasi tinggi</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-award text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Prestasi Membanggakan</h4>
                                <p class="text-gray-600">Raihan prestasi akademik dan non-akademik tingkat nasional</p>
                            </div>
                        </div>
                    </div>

                    <a href="#"
                        class="inline-flex items-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-300 group">
                        Pelajari Lebih Lanjut
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="slide-in-right">
                    <div class="relative">
                        <div class="floating bg-gradient-to-br from-green-100 to-green-200 rounded-3xl p-8 shadow-2xl">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-white p-6 rounded-2xl shadow-lg hover-scale">
                                    <i class="fas fa-mosque text-3xl text-green-600 mb-4"></i>
                                    <h4 class="font-bold text-gray-800 mb-2">Pendidikan Agama</h4>
                                    <p class="text-gray-600 text-sm">Program tahfidz dan kajian Islam terpadu</p>
                                </div>
                                <div class="bg-white p-6 rounded-2xl shadow-lg hover-scale">
                                    <i class="fas fa-laptop text-3xl text-blue-600 mb-4"></i>
                                    <h4 class="font-bold text-gray-800 mb-2">Teknologi</h4>
                                    <p class="text-gray-600 text-sm">Pembelajaran berbasis teknologi modern</p>
                                </div>
                                <div class="bg-white p-6 rounded-2xl shadow-lg hover-scale">
                                    <i class="fas fa-globe text-3xl text-purple-600 mb-4"></i>
                                    <h4 class="font-bold text-gray-800 mb-2">Bahasa Internasional</h4>
                                    <p class="text-gray-600 text-sm">Program bilingual Arab dan Inggris</p>
                                </div>
                                <div class="bg-white p-6 rounded-2xl shadow-lg hover-scale">
                                    <i class="fas fa-heart text-3xl text-red-600 mb-4"></i>
                                    <h4 class="font-bold text-gray-800 mb-2">Karakter</h4>
                                    <p class="text-gray-600 text-sm">Pembentukan akhlak mulia dan kepribadian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-24 bg-white px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Program Unggulan
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                    Keunggulan <span class="text-green-600">SISIT</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Program-program inovatif yang dirancang untuk mengembangkan potensi siswa secara maksimal
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="group bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl shadow-lg hover-scale border border-green-200">
                    <div
                        class="w-16 h-16 bg-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-book-open text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Kurikulum Merdeka</h3>
                    <p class="text-gray-600 mb-6">Mengadopsi kurikulum terkini yang mendorong kreativitas dan
                        kemandirian siswa dalam belajar.</p>
                    <div
                        class="flex items-center text-green-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover-scale border border-blue-200">
                    <div
                        class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-quran text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Tahfidz Terprogram</h3>
                    <p class="text-gray-600 mb-6">Program hafalan Al-Qur'an dari jenjang dasar hingga menengah dengan
                        metode yang efektif.</p>
                    <div
                        class="flex items-center text-blue-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl shadow-lg hover-scale border border-purple-200">
                    <div
                        class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-mobile-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Digital & Terintegrasi</h3>
                    <p class="text-gray-600 mb-6">Sistem informasi sekolah dan aplikasi mobile untuk memudahkan
                        komunikasi.</p>
                    <div
                        class="flex items-center text-purple-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-2xl shadow-lg hover-scale border border-orange-200">
                    <div
                        class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-language text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Bahasa Internasional</h3>
                    <p class="text-gray-600 mb-6">Program bilingual dengan penguasaan bahasa Arab dan Inggris yang
                        mendalam.</p>
                    <div
                        class="flex items-center text-orange-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group bg-gradient-to-br from-teal-50 to-teal-100 p-8 rounded-2xl shadow-lg hover-scale border border-teal-200">
                    <div
                        class="w-16 h-16 bg-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-microscope text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Laboratorium Lengkap</h3>
                    <p class="text-gray-600 mb-6">Fasilitas laboratorium sains, komputer, dan bahasa yang modern dan
                        lengkap.</p>
                    <div
                        class="flex items-center text-teal-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div
                    class="group bg-gradient-to-br from-pink-50 to-pink-100 p-8 rounded-2xl shadow-lg hover-scale border border-pink-200">
                    <div
                        class="w-16 h-16 bg-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-trophy text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Ekstrakurikuler</h3>
                    <p class="text-gray-600 mb-6">Beragam kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat
                        siswa.</p>
                    <div
                        class="flex items-center text-pink-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Fasilitas Section dengan Swiper.js -->
    <section id="facilities" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Fasilitas
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                    Fasilitas <span class="text-blue-600">Modern</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Dilengkapi dengan fasilitas terkini untuk mendukung proses pembelajaran yang optimal
                </p>
            </div>

            <!-- Swiper -->
            <div class="swiper facilities-swiper">
                <div class="swiper-wrapper pb-12">
                    <!-- Loop semua fasilitas -->
                    <!-- 1 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Ruang Kelas AC</h4>
                        <p class="text-gray-600 text-sm">Ruang kelas yang nyaman dengan AC dan smart board</p>
                    </div>

                    <!-- 2 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-flask text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Lab Sains</h4>
                        <p class="text-gray-600 text-sm">Laboratorium sains dengan peralatan modern</p>
                    </div>

                    <!-- 3 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-desktop text-2xl text-purple-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Lab Komputer</h4>
                        <p class="text-gray-600 text-sm">Laboratorium komputer dengan koneksi internet cepat</p>
                    </div>

                    <!-- 4 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-book-reader text-2xl text-yellow-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Perpustakaan Digital</h4>
                        <p class="text-gray-600 text-sm">Koleksi buku fisik lengkap dan fasilitas
                            yang nyaman</p>
                    </div>

                    <!-- 5 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-basketball-ball text-2xl text-red-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Lapangan Olahraga</h4>
                        <p class="text-gray-600 text-sm">Lapangan multifungsi untuk kegiatan olahraga dan outdoor</p>
                    </div>

                    <!-- 6 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-pink-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mosque text-2xl text-pink-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Mushola</h4>
                        <p class="text-gray-600 text-sm">Tempat ibadah yang nyaman dan bersih bagi siswa</p>
                    </div>

                    <!-- 7 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-wifi text-2xl text-teal-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Akses Internet</h4>
                        <p class="text-gray-600 text-sm">Jaringan Wi-Fi cepat di seluruh area sekolah</p>
                    </div>

                    <!-- 8 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-2xl text-indigo-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Keamanan 24 Jam</h4>
                        <p class="text-gray-600 text-sm">CCTV dan satpam menjaga keamanan lingkungan sekolah</p>
                    </div>

                    <!-- 9 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bus-alt text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Jemputan Sekolah</h4>
                        <p class="text-gray-600 text-sm">Layanan antar-jemput aman dan nyaman untuk siswa</p>
                    </div>

                    <!-- 10 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-running text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Ekstrakurikuler</h4>
                        <p class="text-gray-600 text-sm">Beragam pilihan kegiatan sesuai minat dan bakat</p>
                    </div>

                    <!-- 11 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-utensils text-2xl text-yellow-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Meshall</h4>
                        <p class="text-gray-600 text-sm">Tempat makan bersama yang bersih dan teratur</p>
                    </div>

                    <!-- 12 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-pink-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-friends text-2xl text-pink-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Ruang Konseling</h4>
                        <p class="text-gray-600 text-sm">Bimbingan konseling untuk mendampingi siswa</p>
                    </div>

                    <!-- 13 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-paint-brush text-2xl text-indigo-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Studio Seni & Musik</h4>
                        <p class="text-gray-600 text-sm">Fasilitas lengkap untuk seni rupa, teater & musik</p>
                    </div>

                    <!-- 14 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-lime-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tree text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Taman Bermain</h4>
                        <p class="text-gray-600 text-sm">Area bermain edukatif dan aman untuk siswa TK/SD</p>
                    </div>

                    <!-- 15 -->
                    <div class="swiper-slide bg-white p-6 rounded-2xl shadow-lg hover-scale text-center">
                        <div class="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-baby text-2xl text-rose-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Daycare</h4>
                        <p class="text-gray-600 text-sm">Fasilitas aman dan edukatif bagi anak usia dini</p>
                    </div>

                </div>
                <div class="swiper-pagination mt-6 flex justify-center"></div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="py-24 bg-green-50 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Berita
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                    Kabar <span class="text-green-600">Terbaru</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Informasi seputar kegiatan, prestasi, dan perkembangan di Nurul Imam Islamic School.
                </p>
            </div>

            <div class="swiper berita-swiper">
                <div class="swiper-wrapper pb-10">
                    <!-- CARD 1 -->
                    <div
                        class="swiper-slide bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full max-w-md overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=600&h=400&fit=crop&auto=format"
                                alt="Wisuda Tahfidz" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2 news-title">Wisuda Tahfidz & Akhirussanah
                            </h3>
                            <div class="flex-grow mb-4">
                                <p class="text-gray-600 text-sm line-clamp-2 news-excerpt">
                                    Acara khidmat untuk siswa-siswi penghafal Quran, menandai akhir tahun ajaran dengan
                                    penuh makna spiritual.
                                </p>
                                <button class="read-more-btn text-green-600 text-xs hover:underline mt-1"
                                    onclick="toggleReadMore(this)">
                                    Baca Selengkapnya
                                </button>
                            </div>
                            <a href="#"
                                class="text-green-600 font-semibold hover:underline text-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>

                    <!-- CARD 2 -->
                    <div
                        class="swiper-slide bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full max-w-md overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&h=400&fit=crop&auto=format"
                                alt="OSN" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2 news-title">Juara OSN Tingkat Provinsi
                            </h3>
                            <div class="flex-grow mb-4">
                                <p class="text-gray-600 text-sm line-clamp-2 news-excerpt">
                                    Siswa SMPIT meraih medali emas di Olimpiade Sains Nasional bidang Matematika tingkat
                                    provinsi.
                                </p>
                                <button class="read-more-btn text-green-600 text-xs hover:underline mt-1"
                                    onclick="toggleReadMore(this)">
                                    Baca Selengkapnya
                                </button>
                            </div>
                            <a href="#"
                                class="text-green-600 font-semibold hover:underline text-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>

                    <!-- CARD 3 -->
                    <div
                        class="swiper-slide bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full max-w-md overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?w=600&h=400&fit=crop&auto=format"
                                alt="Gebyar Muharram" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2 news-title">Gebyar Muharram 1447 H</h3>
                            <div class="flex-grow mb-4">
                                <p class="text-gray-600 text-sm line-clamp-2 news-excerpt">
                                    Lomba adzan, MTQ, kaligrafi, dan tausiyah menyemarakkan semangat hijrah siswa.
                                </p>
                                <button class="read-more-btn text-green-600 text-xs hover:underline mt-1"
                                    onclick="toggleReadMore(this)">
                                    Baca Selengkapnya
                                </button>
                            </div>
                            <a href="#"
                                class="text-green-600 font-semibold hover:underline text-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>

                    <!-- CARD 4 -->
                    <div
                        class="swiper-slide bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full max-w-md overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&h=400&fit=crop&auto=format"
                                alt="Workshop Guru" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2 news-title">Program Intensif Tahfidz</h3>
                            <div class="flex-grow mb-4">
                                <p class="text-gray-600 text-sm line-clamp-2 news-excerpt">
                                    Siswa mengikuti program intensif untuk meningkatkan jumlah hafalan dan memperbaiki
                                    tajwid Al-Qur'an.
                                </p>
                                <button class="read-more-btn text-green-600 text-xs hover:underline mt-1"
                                    onclick="toggleReadMore(this)">
                                    Baca Selengkapnya
                                </button>
                            </div>
                            <a href="#"
                                class="text-green-600 font-semibold hover:underline text-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>

                    <!-- CARD 5  -->
                    <div
                        class="swiper-slide bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full max-w-md overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&h=400&fit=crop&auto=format"
                                alt="Workshop Pengembangan Guru" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2 news-title">Workshop Pengembangan Guru
                            </h3>
                            <div class="flex-grow mb-4">
                                <p class="text-gray-600 text-sm line-clamp-2 news-excerpt">
                                    Guru-guru mendapatkan pelatihan strategi pembelajaran interaktif dan kurikulum
                                    berbasis nilai Islam.
                                </p>
                                <button class="read-more-btn text-green-600 text-xs hover:underline mt-1"
                                    onclick="toggleReadMore(this)">
                                    Baca Selengkapnya
                                </button>
                            </div>
                            <a href="#"
                                class="text-green-600 font-semibold hover:underline text-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>

                    <!-- CARD 6 -->
                    <div
                        class="swiper-slide bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full max-w-md overflow-hidden">
                        <div class="h-48">
                            <<img
                                src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&h=400&fit=crop&auto=format"
                                alt="Workshop Guru" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2 news-title">Market Day Siswa</h3>
                            <div class="flex-grow mb-4">
                                <p class="text-gray-600 text-sm line-clamp-2 news-excerpt">
                                    Siswa belajar kewirausahaan dengan menjual produk hasil kreativitas sendiri dalam
                                    kegiatan Market Day.
                                </p>
                                <button class="read-more-btn text-green-600 text-xs hover:underline mt-1"
                                    onclick="toggleReadMore(this)">
                                    Baca Selengkapnya
                                </button>
                            </div>
                            <a href="#"
                                class="text-green-600 font-semibold hover:underline text-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination mt-6 flex justify-center"></div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Lokasi Sekolah</h3>
                <p class="text-gray-600">Temukan kami di lokasi yang strategis dan mudah dijangkau</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Lokasi NIIS 1 & 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div
                        class="h-96 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center px-6">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-6xl text-green-600 mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">NIIS 1 & NIIS 2</h4>
                            <p class="text-gray-600 mb-2">
                                Jl. Manunggal XIX, Pasirjengkol, Kec. Majalaya,<br>
                                Karawang, Jawa Barat 41371
                            </p>
                            <p class="text-gray-600 mb-2">📞 0812-8215-9719</p>
                            <p class="text-gray-600">📧 info@nurulimam.sch.id</p>
                            <button
                                class="mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-all">
                                <i class="fas fa-directions mr-2"></i>Lihat Rute
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lokasi NIIS 3 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div
                        class="h-96 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center px-6">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-6xl text-green-600 mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">NIIS 3</h4>
                            <p class="text-gray-600 mb-2">
                                Jl. Trisakti, Perum Klari Indah Permata,<br>
                                RT 028 RW 008, Dusun Kopo, Desa Klari,<br>
                                Kec. Klari, Kab. Karawang 41371
                            </p>
                            <p class="text-gray-600 mb-2">📞 0812-8215-9719</p>
                            <p class="text-gray-600">📧 info@nurulimam.sch.id</p>
                            <button
                                class="mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-all">
                                <i class="fas fa-directions mr-2"></i>Lihat Rute
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-r from-green-600 to-green-800 text-white px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Bergabunglah dengan <span class="text-yellow-300">SISIT</span>
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Wujudkan masa depan gemilang anak Anda bersama pendidikan Islam terpadu berkualitas
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button
                    class="bg-yellow-400 text-gray-800 px-8 py-4 rounded-xl font-bold hover:bg-yellow-300 transition-all hover:shadow-lg">
                    <i class="fas fa-phone mr-2"></i>Hubungi Kami
                </button>
                <button
                    class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold hover:bg-white hover:text-green-600 transition-all">
                    <i class="fas fa-calendar mr-2"></i>Jadwalkan Kunjungan
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Kontak
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                    Hubungi <span class="text-green-600">Kami</span>
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Alamat</h4>
                                <p class="text-gray-600">Jl. Pendidikan No. 123, Jakarta Selatan 12345</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Telepon</h4>
                                <p class="text-gray-600">(021) 1234-5678</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Email</h4>
                                <p class="text-gray-600">info@sisit.sch.id</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Jam Operasional</h4>
                                <p class="text-gray-600">Senin - Jumat: 07:00
                                <p class="text-gray-600">Senin - Jumat: 07:00 - 16:00 WIB</p>
                                <p class="text-gray-600">Sabtu: 08:00 - 12:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="tel"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    placeholder="Masukkan nomor telepon">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Masukkan alamat email">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subjek</label>
                            <select
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option>Informasi Pendaftaran</option>
                                <option>Konsultasi Program</option>
                                <option>Jadwal Kunjungan</option>
                                <option>Biaya Pendidikan</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-green-600 text-white px-8 py-4 rounded-lg font-bold hover:bg-green-700 transition-all hover:shadow-lg">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section with Swiper -->
    <section class="py-24 bg-gradient-to-br from-green-50 to-blue-50 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Testimoni
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                    Apa Kata <span class="text-green-600">Mereka</span>
                </h2>
            </div>

            <!-- Swiper Container -->
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper pb-10">
                    <!-- Slide 1 -->
                    <div
                        class="swiper-slide p-8 bg-white rounded-2xl shadow-lg hover:scale-105 transition duration-300 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-12 h-12 bg-lime-600 text-white rounded-full flex items-center justify-center font-bold mr-4">
                                    S</div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Siti Nurhaliza</h4>
                                    <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4 leading-relaxed line-clamp-4">"SISIT memberikan pendidikan
                                yang seimbang antara akademik dan spiritual. Anak saya berkembang pesat dalam hafalan
                                Quran dan nilai akademiknya."</p>
                            <button onclick="toggleReadMore(this)"
                                class="text-green-600 text-xs hover:underline mb-5">
                                Baca Selengkapnya
                            </button>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div
                        class="swiper-slide p-8 bg-white rounded-2xl shadow-lg hover:scale-105 transition duration-300 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-12 h-12 bg-lime-600 text-white rounded-full flex items-center justify-center font-bold mr-4">
                                    A</div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Ahmad Ridwan</h4>
                                    <p class="text-sm text-gray-600">Alumni SISIT</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4 leading-relaxed line-clamp-4">"Pengalaman di SISIT membentuk
                                karakter saya. Sekarang saya berhasil diterima di PTN favorit dengan bekal yang kuat
                                dari sekolah."</p>
                            <button onclick="toggleReadMore(this)"
                                class="text-green-600 text-xs hover:underline mb-5">
                                Baca Selengkapnya
                            </button>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div
                        class="swiper-slide p-8 bg-white rounded-2xl shadow-lg hover:scale-105 transition duration-300 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-12 h-12 bg-lime-600 text-white rounded-full flex items-center justify-center font-bold mr-4">
                                    F</div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Fatimah Azzahra</h4>
                                    <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4 leading-relaxed line-clamp-4">"Guru-guru di SISIT sangat
                                dedicated dan caring. Mereka tidak hanya mengajar tapi juga mendidik dengan penuh kasih
                                sayang."</p>
                            <button onclick="toggleReadMore(this)"
                                class="text-green-600 text-xs hover:underline mb-5">
                                Baca Selengkapnya
                            </button>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div
                        class="swiper-slide p-8 bg-white rounded-2xl shadow-lg hover:scale-105 transition duration-300 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-12 h-12 bg-lime-600 text-white rounded-full flex items-center justify-center font-bold mr-4">
                                    R</div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Rizky Ramadhan</h4>
                                    <p class="text-sm text-gray-600">Wali Murid</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4 leading-relaxed line-clamp-4">"Sekolah ini sangat disiplin dan
                                memberikan nilai-nilai Islami yang kuat. Saya sangat puas dengan perkembangan karakter
                                anak saya."</p>
                            <button onclick="toggleReadMore(this)"
                                class="text-green-600 text-xs hover:underline mb-5">
                                Baca Selengkapnya
                            </button>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div
                        class="swiper-slide p-8 bg-white rounded-2xl shadow-lg hover:scale-105 transition duration-300 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-12 h-12 bg-lime-600 text-white rounded-full flex items-center justify-center font-bold mr-4">
                                    L</div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Linda Maharani</h4>
                                    <p class="text-sm text-gray-600">Guru</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4 leading-relaxed line-clamp-4">"Lingkungan kerja yang sangat
                                kondusif dan mendukung pengembangan profesional guru. Saya bangga menjadi bagian dari
                                SISIT."</p>
                            <button onclick="toggleReadMore(this)"
                                class="text-green-600 text-xs hover:underline mb-5">
                                Baca Selengkapnya
                            </button>
                        </div>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <!-- Pagination Bullets -->
                <div class="swiper-pagination mt-10 flex justify-center"></div>
            </div>
        </div>
    </section>

    <!-- Kerja Sama Section -->
    <section class="py-14 bg-gradient-to-br from-blue-50 to-green-50 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-10">
                <span
                    class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Kerja Sama
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                    Mitra <span class="text-green-600">Strategis</span>
                </h2>
                <p class="text-gray-600 max-w-xl mx-auto">
                    Kami menjalin kemitraan dengan lembaga keislaman dan universitas terkemuka untuk mendukung
                    pengembangan pendidikan Islami berkualitas.
                </p>
            </div>

            <!-- Swiper Container -->
            <div class="swiper kerja-sama-swiper">
                <div class="swiper-wrapper pb-10">
                    <!-- Slide 1 -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-UIN.png') }}" alt="UIN SGD Bandung"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-UI.png') }}" alt="Universitas Islam Indonesia"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-MUI.png') }}" alt="Majelis Ulama Indonesia"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-baznas.png') }}" alt="BAZNAS"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-rumah-tahfidz.png') }}" alt="Rumah Tahfidz"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                    <!-- Slide 6  -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-odoj-karawang.png') }}" alt="ODOJ Karawang"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                    <!-- Slide 7 -->
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="bg-white shadow-md rounded-xl p-6 w-full h-36 flex items-center justify-center">
                            <img src="{{ asset('storage/img/mitra/logo-UMMI.png') }}" alt="UMMI"
                                class="h-12 object-contain grayscale hover:grayscale-0 transition duration-300">
                        </div>
                    </div>
                </div>

                <!-- Pagination Bullets -->
                <div class="swiper-pagination mt-10 flex justify-center"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
                <!-- Kolom 1 -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        {{-- <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div> --}}
                        <img src="{{ asset('storage/img/logo-niis-putih.png') }}" class="w-40 h-40 object-contain"
                            alt="Logo NIIS">
                    </div>
                    <p class="text-gray-400 mb-6">
                        Menjadi lembaga pendidikan rujukan yang membentuk generasi rabbani.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Program Pendidikan</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-all">KB/TK Islam Terpadu</a></li>
                        <li><a href="#" class="hover:text-white transition-all">SD Islam Terpadu</a></li>
                        <li><a href="#" class="hover:text-white transition-all">SMP Islam Terpadu</a></li>
                        <li><a href="#" class="hover:text-white transition-all">SMA Islam Terpadu</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Program Tahfidz</a></li>
                    </ul>
                </div>

                <!-- Kolom 3 -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Informasi</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-all">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Visi & Misi</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Fasilitas</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Prestasi</a></li>
                        <li><a href="#" class="hover:text-white transition-all">Berita & Event</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Kontak -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Kontak</h4>
                    <div class="space-y-6 text-gray-400">
                        <!-- NIIS 1 & 2 -->
                        <div>
                            <p class="text-base font-semibold text-gray-300 mb-2">NIIS 1 & NIIS 2</p>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                    <span>Jl. Manunggal XIX, Pasirjengkol, Kec. Majalaya, Karawang, Jawa Barat
                                        41371</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-phone text-green-600"></i>
                                    <span>0812-8215-9719</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-green-600"></i>
                                    <span>info@nurulimam.sch.id</span>
                                </div>
                            </div>
                        </div>

                        <!-- NIIS 3 -->
                        <div>
                            <p class="text-base font-semibold text-gray-300 mb-2">NIIS 3</p>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                    <span>
                                        Jl. Trisakti, Perum Klari Indah Permata, RT 028 RW 008,<br>
                                        Dusun Kopo, Desa Klari, Kec. Klari, Kab. Karawang 41371
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-phone text-green-600"></i>
                                    <span>0812-8215-9719</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-green-600"></i>
                                    <span>info@nurulimam.sch.id</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- PENUTUP GRID -->

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    Nurul Imam Islamic School © 2019 - 2025. All Rights Reserved
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Terms of
                        Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/628123456789" target="_blank"
            class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-2xl hover:bg-green-600 transition-all hover:scale-110">
            <i class="fab fa-whatsapp text-white text-2xl"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-6 left-6 w-12 h-12 bg-gray-800 text-white rounded-full items-center justify-center shadow-lg hover:bg-gray-700 transition-all opacity-0 pointer-events-none z-50">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->

    <!-- SwiperJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- SwiperJS Init -->
    <script>
        // Inisialisasi Swiper untuk testimoni
        const testimonialSwiper = new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });

        // Toggle read more functionality
        function toggleReadMore(button) {
            const excerpt = button.previousElementSibling;
            const isExpanded = excerpt.classList.contains('expanded');

            if (isExpanded) {
                excerpt.classList.remove('expanded');
                excerpt.classList.add('line-clamp-4');
                button.textContent = 'Baca Selengkapnya';
            } else {
                excerpt.classList.add('expanded');
                excerpt.classList.remove('line-clamp-4');
                button.textContent = 'Tampilkan Lebih Sedikit';
            }
        }
    </script>

    <script>
        // Initialize Swiper
        var swiper = new Swiper('.berita-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });

        // Toggle read more functionality
        function toggleReadMore(button) {
            const excerpt = button.previousElementSibling;
            const isExpanded = excerpt.classList.contains('expanded');

            if (isExpanded) {
                excerpt.classList.remove('expanded');
                excerpt.classList.add('line-clamp-2');
                button.textContent = 'Baca Selengkapnya';
            } else {
                excerpt.classList.add('expanded');
                excerpt.classList.remove('line-clamp-2');
                button.textContent = 'Tampilkan Lebih Sedikit';
            }
        }
    </script>

    <script>
        const kerjaSamaSwiper = new Swiper('.kerja-sama-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 5
                }
            }
        });
    </script>

    <!-- Inisialisasi Swiper -->
    <script>
        const swiper = new Swiper('.facilities-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 4,
                },
            },
        });
    </script>

    <!-- Js angka dinamis -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll(".stat-counter");

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target");
                    const suffix = counter.getAttribute("data-suffix") || "";
                    const count = +counter.innerText.replace(/\D/g, '');
                    const increment = Math.ceil(target / 100);

                    if (count < target) {
                        counter.innerText = count + increment + suffix;
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target + suffix;
                    }
                };

                updateCount();
            });
        });
    </script>


    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');

            if (window.scrollY > 100) {
                navbar.classList.add('bg-white', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
                backToTop.style.opacity = '1';
                backToTop.classList.add('flex');
                backToTop.classList.remove('pointer-events-none');
            } else {
                navbar.classList.remove('bg-white', 'shadow-lg');
                navbar.classList.add('bg-transparent');
                backToTop.style.opacity = '0';
                backToTop.classList.remove('flex');
                backToTop.classList.add('pointer-events-none');
            }
        });

        // Back to top functionality
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Counter animation
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);

            function updateCounter() {
                start += increment;
                if (start < target) {
                    element.textContent = Math.floor(start);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            }

            updateCounter();
        }

        // Intersection Observer for counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateCounter(counter, target);
                    counterObserver.unobserve(counter);
                }
            });
        });

        document.querySelectorAll('[data-target]').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Form submission handling
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);

            // Show success message (in real implementation, you would send data to server)
            alert('Terima kasih! Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.');

            // Reset form
            this.reset();
        });

        // Add loading animation to buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                if (this.type !== 'submit') return;

                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 2000);
            });
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Add smooth reveal animation to sections
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('section').forEach(section => {
            revealObserver.observe(section);
        });
    </script>

    <!-- Custom CSS for animations -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .lazy {
            opacity: 0;
            transition: opacity 0.3s;
        }

        .lazy.loaded {
            opacity: 1;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #16a34a;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #15803d;
        }

        /* Smooth transitions for all interactive elements */
        * {
            transition: all 0.3s ease;
        }

        /* Focus styles for accessibility */
        button:focus,
        input:focus,
        select:focus,
        textarea:focus {
            outline: 2px solid #16a34a;
            outline-offset: 2px;
        }
    </style>

</body>

</html>
