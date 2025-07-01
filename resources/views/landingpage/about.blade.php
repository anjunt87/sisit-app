<!-- About Section -->
<section id="about" class="bg-[#f8fff5]/80 backdrop-blur-md shadow-2xl">
    <div x-data="{
        current: 0,
        autoplay: true,
        autoplayInterval: null,
        slides: [{
                'id': 1,
                'image': 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=2070&q=80',
                'title': 'Tentang Kami',
                'subtitle': 'Membangun Masa Depan Melalui Pendidikan Islami',
                'description': 'Nurul Imam Islamic School (NIIS) adalah lembaga pendidikan yang berkomitmen untuk menyediakan pendidikan Islami berkualitas tinggi, mengintegrasikan nilai-nilai agama dengan kurikulum akademis yang modern.',
                'stats': {
    
                }
            },
            {
                'id': 2,
                'image': 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=2064&q=80',
                'title': 'Modern Learning',
                'subtitle': 'Teknologi untuk Pembelajaran Efektif',
                'description': 'Mengintegrasikan teknologi modern dalam proses pembelajaran untuk pengalaman belajar yang interaktif dan menyenangkan.',
                'stats': {
                    'programs': '50+',
                    'digital_resources': '1000+',
                    'satisfaction': '98%'
                }
            },
            {
                'id': 3,
                'image': 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=2070&q=80',
                'title': 'Research Excellence',
                'subtitle': 'Memajukan Ilmu Pengetahuan',
                'description': 'Mendorong penelitian dan inovasi untuk berkontribusi pada kemajuan ilmu pengetahuan dan teknologi.',
                'stats': {
                    'research_projects': '200+',
                    'publications': '500+',
                    'awards': '25+'
                }
            },
            {
                'id': 4,
                'image': 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=2070&q=80',
                'title': 'Global Community',
                'subtitle': 'Menghubungkan Dunia Melalui Pendidikan',
                'description': 'Membangun komunitas global yang saling mendukung dan berbagi pengetahuan untuk kemajuan bersama.',
                'stats': {
                    'countries': '30+',
                    'partnerships': '100+',
                    'alumni': '15000+'
                }
            }
        ],
        next() {
            this.current = (this.current + 1) % this.slides.length;
            this.resetAutoplay();
        },
        prev() {
            this.current = (this.current - 1 + this.slides.length) % this.slides.length;
            this.resetAutoplay();
        },
        goTo(index) {
            this.current = index;
            this.resetAutoplay();
        },
        toggleAutoplay() {
            this.autoplay = !this.autoplay;
            if (this.autoplay) {
                this.startAutoplay();
            } else {
                this.stopAutoplay();
            }
        },
        startAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
            }
            this.autoplayInterval = setInterval(() => {
                if (this.autoplay) {
                    this.current = (this.current + 1) % this.slides.length;
                }
            }, 5000);
        },
        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = null;
            }
        },
        resetAutoplay() {
            if (this.autoplay) {
                this.stopAutoplay();
                this.startAutoplay();
            }
        },
        formatStatKey(key) {
            return key.replace(/([A-Z])/g, ' $1').replace(/_/g, ' ').trim();
        },
        init() {
            this.startAutoplay();
        }
    }" x-init="init()" @mouseenter="stopAutoplay()"
        @mouseleave="if(autoplay) startAutoplay()" class="relative w-full h-screen bg-[#137f5d] overflow-hidden">

        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="slide.id">
            <div x-show="current === index" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="absolute inset-0 w-full h-full">
                <div class="absolute inset-0 bg-cover bg-center" :style="`background-image: url(${slide.image})`">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>

                <div class="relative z-10 h-full flex items-center">
                    <div class="container mx-auto px-6 lg:px-12">
                        <div class="grid lg:grid-cols-2 gap-12 items-center">
                            <!-- Left Content -->
                            <div class="text-white space-y-8">
                                <div class="space-y-4">
                                    <div
                                        class="inline-block px-4 py-2 bg-green-600 bg-opacity-20 backdrop-blur-sm rounded-full border border-green-400 border-opacity-30">
                                        <span class="text-white text-sm font-medium" x-text="slide.subtitle"></span>
                                    </div>
                                    <h1 class="text-4xl lg:text-6xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent drop-shadow-[0_1px_2px_rgba(0,0,0,0.25)] mb-6"
                                        x-text="slide.title"></h1>
                                    <p class="text-lg lg:text-xl text-gray-200 leading-relaxed max-w-2xl drop-shadow-[0_1px_2px_rgba(0,0,0,0.25)]"
                                        x-text="slide.description"></p>
                                </div>

                                <!-- Stats -->
                                <div class="grid grid-cols-3 gap-6 drop-shadow-[0_1px_2px_rgba(0,0,0,0.25)]">
                                    <template x-for="[key, value] in Object.entries(slide.stats)">
                                        <div class="text-center lg:text-left">
                                            <div class="text-2xl lg:text-3xl font-bold text-green-400 mb-1"
                                                x-text="value"></div>
                                            <div class="text-sm text-gray-300 capitalize" x-text="formatStatKey(key)">
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <!-- Buttons -->
                                <div class="flex flex-wrap gap-4 drop-shadow-[0_1px_2px_rgba(0,0,0,0.25)]">
                                    {{-- <a href="#"
                                        class="px-8 py-4 bg-gradient-to-r bg-[#059669] text-white font-semibold rounded-lg hover:scale-105 hover:shadow-xl transition duration-300">Get
                                        Started</a>
                                    <a href="#"
                                        class="px-8 py-4 border-2 border-white text-white hover:bg-white hover:text-gray-900 rounded-lg transition duration-300">Learn
                                        More</a> --}}
                                    <a href="#"
                                        class="inline-flex items-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-300 group">
                                        Pelajari Lebih Lanjut
                                        <i
                                            class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <!-- Navigation Controls -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
            <div
                class="flex items-center space-x-6  bg-green-100/10 backdrop-blur-md rounded-full px-6 py-4  border border-green-300/20 shadow-lg">
                <!-- Autoplay Toggle -->
                <button @click="toggleAutoplay()" class="text-white hover:text-green-400 transition duration-300">
                    <span x-show="autoplay" class="text-xl">⏸</span>
                    <span x-show="!autoplay" class="text-xl">▶</span>
                </button>

                <!-- Previous Slide -->
                <button @click="prev()"
                    class="text-white hover:text-green-400 transition duration-300 text-xl">❮</button>

                <!-- Slide Indicators -->
                <div class="flex space-x-2">
                    <template x-for="(slide, i) in slides" :key="'indicator-' + i">
                        <button @click="goTo(i)"
                            :class="i === current ? 'bg-green-500 scale-125' : 'bg-white bg-opacity-50 hover:bg-opacity-75'"
                            class="w-3 h-3 rounded-full transition duration-300" type="button"></button>
                    </template>
                </div>

                <!-- Next Slide -->
                <button @click="next()"
                    class="text-white hover:text-green-400 transition duration-300 text-xl">❯</button>

                <!-- Slide Counter -->
                <div class="text-white text-sm ml-4" x-text="`${current + 1} / ${slides.length}`"></div>
            </div>
        </div>

        <!-- Progress Bar -->
        {{-- <div class="absolute top-0 left-0 w-full h-1 bg-black bg-opacity-30 z-20">
            <div class="h-full bg-[#059669] transition-all duration-300"
                :style="`width: ${((current + 1) / slides.length) * 100}%`"></div>
        </div> --}}
    </div>
</section>
