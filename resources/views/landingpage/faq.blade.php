<section id="pertanyaan" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-down">
            <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Pertanyaan
            </span>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Pertanyaan<span class="text-green-600"> Umum</span>
            </h2>
            <p class="text-gray-600 text-lg">
                Temukan jawaban dari pertanyaan yang sering diajukan oleh orang tua calon siswa
            </p>
        </div>

        <!-- Accordion -->
        <div class="space-y-4" id="faq-accordion">
            @php
                $faqs = [
                    [
                        'q' => 'Bagaimana sistem tahfidz di sekolah ini?',
                        'a' =>
                            'Kami menggunakan metode talaqqi dengan target hafalan per pekan, evaluasi rutin, serta laporan perkembangan ke orang tua melalui aplikasi.',
                    ],
                    [
                        'q' => 'Bagaimana sistem pembayaran SPP dan pendaftaran?',
                        'a' =>
                            'Pembayaran bisa dilakukan melalui transfer bank. Detail biaya akan diinformasikan saat pendaftaran atau melalui brosur resmi sekolah.',
                    ],
                    [
                        'q' => 'Apakah sekolah memiliki sistem full day?',
                        'a' =>
                            'Ya, sistem full day diberlakukan mulai dari pagi hingga sore dengan pembelajaran akademik, diniyah, tahfidz, dan kegiatan karakter.',
                    ],
                    [
                        'q' => 'Apakah orang tua bisa memantau perkembangan anak secara online?',
                        'a' =>
                            'Tentu. Kami memiliki sistem informasi sekolah berbasis web (SISIT-App) yang memungkinkan wali murid memantau nilai, hafalan, absensi, dan pengumuman.',
                    ],
                ];
            @endphp

            @foreach ($faqs as $index => $faq)
                <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up"
                    data-aos-delay="{{ 100 * ($index + 1) }}">
                    <button type="button"
                        class="faq-toggle w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 hover:bg-green-50 transition-colors duration-200"
                        data-index="{{ $index }}">
                        <span class="font-medium text-gray-800">{{ $faq['q'] }}</span>
                        <svg class="w-5 h-5 text-green-600 transition-transform transform rotate-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-answer hidden px-6 mt-8 pb-4 text-gray-600">
                        {{ $faq['a'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
