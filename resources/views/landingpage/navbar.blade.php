<!-- Navigation -->
<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-500 bg-transparent text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    {{-- <i class="fas fa-graduation-cap text-2xl text-green-600 mr-2"></i>
                        <span class="font-bold text-xl text-gray-800">SISIT</span> --}}
                    <img id="navbar-logo" src="{{ asset('storage/img/logo-niis-putih.png') }}"
                        class="w-10 h-10 object-contain transition-all duration-300" alt="Logo NIIS">
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#vanta-hero" class="nav-link px-3 py-2 text-sm font-medium transition">Beranda</a>
                    <a href="#about" class="nav-link px-3 py-2 text-sm font-medium transition">Tentang</a>
                    <a href="#programs" class="nav-link px-3 py-2 text-sm font-medium transition">Program</a>
                    <a href="#facilities" class="nav-link px-3 py-2 text-sm font-medium transition">Fasilitas</a>
                    <a href="#contact" class="nav-link px-3 py-2 text-sm font-medium transition">Kontak</a>
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
