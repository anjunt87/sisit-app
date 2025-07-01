<!-- Tailwind CSS -->
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

<!-- Swiper CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}

<!-- AOS CSS -->
{{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

<style>
    /* Custom Swiper Styles */
    .berita-swiper .swiper-pagination-bullet {
        background: #10b981;
        opacity: 0.5;
    }

    .berita-swiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: #059669;
    }

    .berita-swiper .swiper-button-next,
    .berita-swiper .swiper-button-prev {
        color: #059669;
    }

    .berita-swiper .swiper-button-next:hover,
    .berita-swiper .swiper-button-prev:hover {
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

<!-- Berita Section -->
<section class="py-20 bg-green-50 px-6" id="berita">
    <div class="max-w-7xl mx-auto">
        <!-- Heading -->
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Berita
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                Kabar <span class="text-green-600">Terbaru</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Informasi seputar kegiatan, prestasi, dan perkembangan di Nurul Imam Islamic School.
            </p>
        </div>

        <!-- Swiper Container -->
        <div class="swiper berita-swiper" data-aos="fade-up">
            <div class="swiper-wrapper pb-10">
                <!-- Card 1 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full overflow-hidden"
                        data-aos="zoom-in-up" data-aos-delay="100">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=600&h=400&fit=crop&auto=format"
                                alt="Wisuda Tahfidz" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">Wisuda Tahfidz & Akhirussanah</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 flex-grow">
                                Acara khidmat untuk siswa-siswi penghafal Quran, menandai akhir tahun ajaran
                                dengan
                                penuh makna spiritual.
                            </p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:underline mt-4">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full overflow-hidden"
                        data-aos="zoom-in-up" data-aos-delay="200">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&h=400&fit=crop&auto=format"
                                alt="OSN" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">Juara OSN Tingkat Provinsi</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 flex-grow">
                                Siswa SMPIT meraih medali emas di Olimpiade Sains Nasional bidang Matematika
                                tingkat
                                provinsi.
                            </p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:underline mt-4">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full overflow-hidden"
                        data-aos="zoom-in-up" data-aos-delay="300">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?w=600&h=400&fit=crop&auto=format"
                                alt="Gebyar Muharram" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">Gebyar Muharram 1447 H</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 flex-grow">
                                Lomba adzan, MTQ, kaligrafi, dan tausiyah menyemarakkan semangat hijrah siswa.
                            </p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:underline mt-4">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full overflow-hidden"
                        data-aos="zoom-in-up" data-aos-delay="400">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&h=400&fit=crop&auto=format"
                                alt="Workshop Guru" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">Workshop Pengembangan Guru</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 flex-grow">
                                Guru-guru mendapatkan pelatihan strategi pembelajaran interaktif dan kurikulum
                                berbasis nilai Islam.
                            </p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:underline mt-4">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="swiper-slide">
                    <div
                        class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=600&h=400&fit=crop&auto=format"
                                alt="Ekstrakurikuler" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">Pameran Karya Siswa</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 flex-grow">
                                Siswa memamerkan hasil karya seni, kerajinan, dan proyek sains dalam acara
                                tahunan sekolah.
                            </p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:underline mt-4">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="swiper-slide">
                    <div
                        class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 flex flex-col h-full overflow-hidden">
                        <div class="h-48">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&h=400&fit=crop&auto=format"
                                alt="Olahraga" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">Turnamen Olahraga Antar Sekolah
                            </h3>
                            <p class="text-gray-600 text-sm line-clamp-2 flex-grow">
                                Tim olahraga sekolah meraih juara umum dalam kompetisi sepak bola dan bulu
                                tangkis tingkat kota.
                            </p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:underline mt-4">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

<!-- Scripts -->
<!-- Swiper JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}

<!-- AOS JS -->
{{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
