<!-- Gallery Section -->
<section id="gallery" class="py-20 bg-white px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800">Galeri Kegiatan</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Dokumentasi berbagai kegiatan seru dan edukatif siswa di
                lingkungan sekolah</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach (range(1, 8) as $i)
                <div class="overflow-hidden rounded-xl shadow hover:shadow-lg transition-all fade-up">
                    <img src="{{ asset("storage/gallery/gallery-$i.jpg") }}" alt="Galeri $i"
                        class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300"
                        loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</section>
