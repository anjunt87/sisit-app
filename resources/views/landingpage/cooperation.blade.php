<style>
    /* Custom Swiper Styles */
    .kerja-sama-swiper .swiper-pagination-bullet {
        background: #10b981;
        opacity: 0.5;
    }

    .kerja-sama-swiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: #059669;
    }

    .kerja-sama-swiper .swiper-button-next,
    .kerja-sama-swiper .swiper-button-prev {
        color: #059669;
    }

    .kerja-sama-swiper .swiper-button-next:hover,
    .kerja-sama-swiper .swiper-button-prev:hover {
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
<!-- Kerja Sama Section -->
<section class="py-14 bg-gradient-to-br from-blue-50 to-green-50 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-10 fade-up delay-0">
            <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
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
        <div class="swiper kerja-sama-swiper fade-up delay-0">
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
