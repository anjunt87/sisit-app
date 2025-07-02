<!-- Programs Section -->
<section id="programs" class="py-20 bg-white px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16 fade-up delay-0">
            <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Program Unggulan
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                Keunggulan <span class="text-green-600">Nurul Imam Islamic School</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Program-program inovatif yang dirancang untuk mengembangkan potensi siswa secara maksimal
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $programs = [
                    [
                        'icon' => 'book-open',
                        'color' => 'green',
                        'title' => 'Kurikulum Merdeka',
                        'desc' =>
                            'Mengadopsi kurikulum terkini yang mendorong kreativitas dan kemandirian siswa dalam belajar.',
                    ],
                    [
                        'icon' => 'quran',
                        'color' => 'blue',
                        'title' => 'Tahfidz Terprogram',
                        'desc' =>
                            'Program hafalan Al-Qur\'an dari jenjang dasar hingga menengah dengan metode yang efektif.',
                    ],
                    [
                        'icon' => 'mobile-alt',
                        'color' => 'purple',
                        'title' => 'Digital & Terintegrasi',
                        'desc' => 'Sistem informasi sekolah dan aplikasi mobile untuk memudahkan komunikasi.',
                    ],
                    [
                        'icon' => 'language',
                        'color' => 'orange',
                        'title' => 'Bahasa Internasional',
                        'desc' => 'Program bilingual dengan penguasaan bahasa Arab dan Inggris yang mendalam.',
                    ],
                    [
                        'icon' => 'microscope',
                        'color' => 'teal',
                        'title' => 'Laboratorium Lengkap',
                        'desc' => 'Fasilitas laboratorium sains, komputer, dan bahasa yang modern dan lengkap.',
                    ],
                    [
                        'icon' => 'trophy',
                        'color' => 'pink',
                        'title' => 'Ekstrakurikuler',
                        'desc' => 'Beragam kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.',
                    ],
                ];
            @endphp

            @foreach ($programs as $i => $program)
                <div
                    class="program-card fade-up delay-{{ $i * 100 }} group bg-gradient-to-br from-{{ $program['color'] }}-50 to-{{ $program['color'] }}-100 p-8 rounded-2xl shadow-lg border border-{{ $program['color'] }}-200">
                    <div
                        class="w-16 h-16 bg-{{ $program['color'] }}-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-{{ $program['icon'] }} text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $program['title'] }}</h3>
                    <p class="text-gray-600 mb-6">{{ $program['desc'] }}</p>
                    <div
                        class="flex items-center text-{{ $program['color'] }}-600 font-semibold group-hover:translate-x-2 transition-transform">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
