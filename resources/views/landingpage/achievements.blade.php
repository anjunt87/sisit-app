<!-- Achievements Section -->
<section id="achievements" class="py-20 px-6 relative overflow-hidden bg-gray-50">
    <!-- Background Geometri Islami -->
    <svg class="absolute inset-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="star" patternUnits="userSpaceOnUse" width="50" height="50">
                <path d="M25 0 L30 20 L50 25 L30 30 L25 50 L20 30 L0 25 L20 20 Z" fill="none" stroke="#16610E"
                    stroke-width="1" />
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#star)" />
    </svg>
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 fade-up">
            <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Prestasi
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                Prestasi
                <span class="text-green-600"> Sekolah</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Berbagai prestasi membanggakan yang telah diraih oleh
                siswa dan lembaga kami</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ([['icon' => 'fas fa-trophy', 'title' => 'Juara 1 Olimpiade Matematika', 'desc' => 'Tingkat Kabupaten Karawang, 2024'], ['icon' => 'fas fa-microphone', 'title' => 'Lomba Pidato Bahasa Arab', 'desc' => 'Tingkat Provinsi Jawa Barat, 2023'], ['icon' => 'fas fa-book', 'title' => 'Wisuda Hafizh 30 Juz', 'desc' => 'Santri terbaik tahun 2024']] as $achievement)
                <div
                    class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 fade-up group hover:shadow-lg transition-all">
                    <div
                        class="w-14 h-14 bg-green-600 text-white rounded-xl flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="{{ $achievement['icon'] }}"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $achievement['title'] }}</h3>
                    <p class="text-gray-600">{{ $achievement['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
