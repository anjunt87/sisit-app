<!-- Section FAQ -->
<section id="pertanyaan" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-down">
            <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Pertanyaan
            </span>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                <span class="text-green-600">Pertanyaan </span> Umum
            </h2>
            <p class="text-gray-600 text-lg">
                Temukan jawaban dari pertanyaan yang sering diajukan oleh orang tua calon siswa
            </p>
        </div>

        <!-- Accordion -->
        <div class="space-y-4" x-data="{ openFaq: null }">

            <!-- Item -->
            <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up"
                x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Apakah sekolah ini hanya menerima siswa
                        Muslim?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-green-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-6 px-6 pb-4 text-gray-600">
                    Ya, sekolah kami ditujukan untuk siswa Muslim dengan fokus pada pendidikan Islami, tahfidz,
                    dan
                    pembentukan karakter berdasarkan syariat.
                </div>
            </div>

            <!-- Item -->
            <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up"
                data-aos-delay="100" x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Bagaimana sistem tahfidz di sekolah ini?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-green-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-6 px-6 pb-4 text-gray-600">
                    Kami menggunakan metode talaqqi dengan target hafalan per pekan, evaluasi rutin, serta
                    laporan
                    perkembangan ke orang tua melalui aplikasi.
                </div>
            </div>

            <!-- Item -->
            <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up"
                data-aos-delay="200" x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Bagaimana sistem pembayaran SPP dan
                        pendaftaran?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-green-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-6 px-6 pb-4 text-gray-600">
                    Pembayaran bisa dilakukan melalui transfer bank. Detail biaya akan diinformasikan saat
                    pendaftaran atau melalui brosur resmi sekolah.
                </div>
            </div>

            <!-- Item -->
            <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up"
                data-aos-delay="300" x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Apakah sekolah memiliki sistem full day?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-green-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-6 px-6 pb-4 text-gray-600">
                    Ya, sistem full day diberlakukan mulai dari pagi hingga sore dengan pembelajaran akademik,
                    diniyah, tahfidz, dan kegiatan karakter.
                </div>
            </div>

            <!-- Item -->
            <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up"
                data-aos-delay="400" x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Apakah orang tua bisa memantau perkembangan anak
                        secara
                        online?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-green-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-6 px-6 pb-4 text-gray-600">
                    Tentu. Kami memiliki sistem informasi sekolah berbasis web (SISIT-App) yang memungkinkan
                    wali
                    murid memantau nilai, hafalan, absensi, dan pengumuman.
                </div>
            </div>

        </div>
    </div>
</section>
