<style>
    /* Custom Swiper Styles */
    .facilities-swiper .swiper-pagination-bullet {
        background: #10b981;
        opacity: 0.5;
    }

    .facilities-swiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: #059669;
    }

    .facilities-swiper .swiper-button-next,
    .facilities-swiper .swiper-button-prev {
        color: #059669;
    }

    .facilities-swiper .swiper-button-next:hover,
    .facilities-swiper .swiper-button-prev:hover {
        color: #10b981;
    }

    /* Hover effects */
    .swiper-slide {
        transition: transform 0.3s ease;
    }

    .swiper-slide:hover {
        transform: translateY(-5px);
    }
</style>

<!-- Fasilitas Section -->
<section id="facilities" class="py-20 px-6 bg-[#f8fff5]/80 backdrop-blur-md shadow-2xl rounded-3xl ring-1 ring-green-100">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100" data-aos="fade-up" data-aos-delay="100">
            <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Fasilitas
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                Fasilitas <span class="text-green-600">Modern</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-600 text-lg max-w-3xl mx-auto">
                Dilengkapi dengan fasilitas terkini untuk mendukung proses pembelajaran yang optimal
            </p>
        </div>

        <!-- Swiper Container -->
        <div class="swiper facilities-swiper">
            <div class="swiper-wrapper mb-16">

                <!-- 1 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Ruang Kelas AC</h4>
                        <p class="text-gray-600 text-sm">Ruang kelas yang nyaman dengan AC dan smart board</p>
                    </div>
                </div>

                <!-- 2 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-flask text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Lab Sains</h4>
                        <p class="text-gray-600 text-sm">Laboratorium sains dengan peralatan modern</p>
                    </div>
                </div>

                <!-- 3 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-desktop text-2xl text-purple-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Lab Komputer</h4>
                        <p class="text-gray-600 text-sm">Laboratorium komputer dengan koneksi internet cepat
                        </p>
                    </div>
                </div>

                <!-- 4 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-book-reader text-2xl text-yellow-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Perpustakaan Digital</h4>
                        <p class="text-gray-600 text-sm">Koleksi buku fisik lengkap dan fasilitas yang nyaman
                        </p>
                    </div>
                </div>

                <!-- 5 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-basketball-ball text-2xl text-red-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Lapangan Olahraga</h4>
                        <p class="text-gray-600 text-sm">Lapangan multifungsi untuk kegiatan olahraga dan
                            outdoor
                        </p>
                    </div>
                </div>

                <!-- 6 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-pink-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mosque text-2xl text-pink-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Mushola</h4>
                        <p class="text-gray-600 text-sm">Tempat ibadah yang nyaman dan bersih bagi siswa</p>
                    </div>
                </div>

                <!-- 7 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-wifi text-2xl text-teal-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Akses Internet</h4>
                        <p class="text-gray-600 text-sm">Jaringan Wi-Fi cepat di seluruh area sekolah</p>
                    </div>
                </div>

                <!-- 8 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-2xl text-indigo-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Keamanan 24 Jam</h4>
                        <p class="text-gray-600 text-sm">CCTV dan satpam menjaga keamanan lingkungan sekolah
                        </p>
                    </div>
                </div>

                <!-- 9 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bus-alt text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Jemputan Sekolah</h4>
                        <p class="text-gray-600 text-sm">Layanan antar-jemput aman dan nyaman untuk siswa</p>
                    </div>
                </div>

                <!-- 10 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-running text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Ekstrakurikuler</h4>
                        <p class="text-gray-600 text-sm">Beragam pilihan kegiatan sesuai minat dan bakat</p>
                    </div>
                </div>

                <!-- 11 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-utensils text-2xl text-yellow-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Meshall</h4>
                        <p class="text-gray-600 text-sm">Tempat makan bersama yang bersih dan teratur</p>
                    </div>
                </div>

                <!-- 12 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-pink-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-friends text-2xl text-pink-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Ruang Konseling</h4>
                        <p class="text-gray-600 text-sm">Bimbingan konseling untuk mendampingi siswa</p>
                    </div>
                </div>

                <!-- 13 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-paint-brush text-2xl text-indigo-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Studio Seni & Musik</h4>
                        <p class="text-gray-600 text-sm">Fasilitas lengkap untuk seni rupa, teater & musik</p>
                    </div>
                </div>

                <!-- 14 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-lime-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tree text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Taman Bermain</h4>
                        <p class="text-gray-600 text-sm">Area bermain edukatif dan aman untuk siswa TK/SD</p>
                    </div>
                </div>

                <!-- 15 -->
                <div class="swiper-slide">
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-baby text-2xl text-rose-600"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Daycare</h4>
                        <p class="text-gray-600 text-sm">Fasilitas aman dan edukatif bagi anak usia dini</p>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination mt-6"></div>
        </div>
    </div>
</section>
