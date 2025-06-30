<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Nurul Imam Karawang NIIS">
    <meta name="keywords"
        content="nurul, imam, niis, nurul imam, niis, nurul imam karawang, sdit karawang, nurul iman islamic, sdit nurul iman karawang, nurul imam islamic school, nurul imam islamic school karawang">
    <meta name="author" content="niis, niis official">
    <meta property="og:site_name" content="Nurul Imam Islamic School">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nurulimamkarawang.sch.id">
    <meta property="og:title" content="Nurul Imam Islamic School">
    <meta property="og:description" content="Nurul Imam Islamic School">
    <meta property="og:image" content="https://nurulimamkarawang.sch.id/ui-kit/img/logo.png">
    <meta name="csrf-token" content="I0OXUghCGEfeBqZjzbAqqAwMiAgYoBNRgjHRkoit">
    <title>SISIT - Nurul Imam Islamic School</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/logo-niis-warna.png') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/landing.css') }}"> --}}
    @vite('resources/css/landing.css')
</head>

<body class="bg-white text-gray-800 overflow-x-hidden">
    @include('landingpage.navbar') {{-- Navigasi utama --}}
    @include('landingpage.hero') {{-- Hero section (headline utama) --}}
    @include('landingpage.about') {{-- Tentang sekolah --}}
    @include('landingpage.programs') {{-- Program pendidikan utama --}}
    @include('landingpage.achievements') {{-- Prestasi & pencapaian --}}
    @include('landingpage.facilities') {{-- Fasilitas sekolah --}}
    {{-- @include('landingpage.gallery') Galeri foto kegiatan --}}
    @include('landingpage.cta') {{-- Ajak daftar/aksi (Call to Action) --}}
    @include('landingpage.testimonials') {{-- Testimoni wali/guru/alumni --}}
    @include('landingpage.news') {{-- Berita & informasi terbaru --}}
    {{-- @include('landingpage.events') (Opsional) Event mendatang --}}
    @include('landingpage.faq') {{-- Tanya jawab umum --}}
    @include('landingpage.map') {{-- Peta lokasi sekolah --}}
    @include('landingpage.contact') {{-- Form & informasi kontak --}}
    @include('landingpage.cooperation') {{-- Mitra & kerja sama --}}
    @include('landingpage.footer') {{-- Footer --}}


    <!-- Back to top button -->
    <button id="backToTop"
        class="fixed bottom-4 right-4 z-50 p-3 bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- SwiperJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- CDN Alpine.js dan AOS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.AOS) {
                AOS.init({
                    once: true,
                    duration: 700
                });
            }
        });
    </script>

    <!-- Tambahkan di <head> atau sebelum </body> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.birds.min.js"></script>

    <!-- Inisialisasi Vanta Birds -->
    <script>
        VANTA.BIRDS({
            el: "#vanta-hero",
            backgroundAlpha: 1,
            backgroundColor: 0x059669, // Hijau Tua SISIT
            birdSize: 0.8,
            cohesion: 14,
            color1: 0x16610E, // Hijau tua
            color2: 0xFED16A, // Kuning madu (opsional bisa kamu ganti)
            colorMode: "lerp",
            separation: 20,
            speedLimit: 8,
            wingSpan: 30,
            quantity: 5,
            mouseControls: true,
            touchControls: true,
            gyroControls: true,
            minHeight: 200,
            minWidth: 200,
            scale: 1,
            scaleMobile: 1
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.delay || 0;
                        entry.target.style.animationDelay = `${delay}ms`;
                        entry.target.classList.add('slide-text');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('[data-animate="slide-text"]').forEach(el => observer.observe(el));
        });
    </script>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const navLinks = document.querySelectorAll('.nav-link');
            const navbarLogo = document.getElementById('navbar-logo');

            if (window.scrollY > 20) {
                navbar.classList.add('glassmorph');

                // Ganti logo ke berwarna
                navbarLogo.src = "{{ asset('storage/img/logo-niis-warna.png') }}";

                // Ganti warna teks link
                navLinks.forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-gray-700', 'hover:text-green-600');
                });
            } else {
                navbar.classList.remove('glassmorph');

                // Ganti logo ke putih
                navbarLogo.src = "{{ asset('storage/img/logo-niis-putih.png') }}";

                // Kembalikan warna teks link
                navLinks.forEach(link => {
                    link.classList.remove('text-gray-700', 'hover:text-green-600');
                    link.classList.add('text-white');
                });
            }
        });
    </script>


    <!-- Intersection Observer Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fadeUps = document.querySelectorAll('.fade-up');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            fadeUps.forEach(el => observer.observe(el));
        });
    </script>

    <!-- Animasi & Scroll Reveal CSS -->
    <style>
        .slide-in-left,
        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .slide-in-left {
            transform: translateX(-50px);
        }

        .slide-in-left.reveal,
        .slide-in-right.reveal {
            opacity: 1;
            transform: translateX(0);
        }

        .hover-scale:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .floating {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>

    <!-- Intersection Observer Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const revealElements = document.querySelectorAll('.slide-in-left, .slide-in-right');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal');
                        observer.unobserve(entry.target); // hanya sekali animasi
                    }
                });
            }, {
                threshold: 0.2
            });

            revealElements.forEach(el => observer.observe(el));
        });
    </script>

    <!-- SwiperJS Init -->
    <script>
        // Testimoni Swiper
        new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });

        // Jumbotron Swiper Init
        new Swiper('.jumbotron-swiper', {
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });

        // Fasilitas Swiper
        new Swiper('.facilities-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
            }
        });
        // Berita Swiper
        new Swiper('.berita-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
            }
        });

        // Kerja Sama Swiper
        new Swiper('.kerja-sama-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 5
                }
            }
        });
    </script>

    <script>
        // Toggle read more functionality
        function toggleReadMore(button) {
            const excerpt = button.previousElementSibling;
            const isExpanded = excerpt.classList.contains('expanded');

            if (isExpanded) {
                excerpt.classList.remove('expanded');
                excerpt.classList.add('line-clamp-4');
                button.textContent = 'Baca Selengkapnya';
            } else {
                excerpt.classList.add('expanded');
                excerpt.classList.remove('line-clamp-4');
                button.textContent = 'Tampilkan Lebih Sedikit';
            }
        }
    </script>

    <script>
        // Initialize Swiper
        var swiper = new Swiper('.berita-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });

        // Toggle read more functionality
        function toggleReadMore(button) {
            const excerpt = button.previousElementSibling;
            const isExpanded = excerpt.classList.contains('expanded');

            if (isExpanded) {
                excerpt.classList.remove('expanded');
                excerpt.classList.add('line-clamp-2');
                button.textContent = 'Baca Selengkapnya';
            } else {
                excerpt.classList.add('expanded');
                excerpt.classList.remove('line-clamp-2');
                button.textContent = 'Tampilkan Lebih Sedikit';
            }
        }
    </script>

    <script>
        const kerjaSamaSwiper = new Swiper('.kerja-sama-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 5
                }
            }
        });
    </script>

    <!-- Inisialisasi Swiper -->
    <!-- Swiper Init -->


    <!-- Js angka dinamis -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll(".stat-counter");

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target");
                    const suffix = counter.getAttribute("data-suffix") || "";
                    const count = +counter.innerText.replace(/\D/g, '');
                    const increment = Math.ceil(target / 100);

                    if (count < target) {
                        counter.innerText = count + increment + suffix;
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target + suffix;
                    }
                };

                updateCount();
            });
        });
    </script>


    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');

            if (window.scrollY > 100) {
                navbar.classList.add('bg-white', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
                backToTop.style.opacity = '1';
                backToTop.classList.add('flex');
                backToTop.classList.remove('pointer-events-none');
            } else {
                navbar.classList.remove('bg-white', 'shadow-lg');
                navbar.classList.add('bg-transparent');
                backToTop.style.opacity = '0';
                backToTop.classList.remove('flex');
                backToTop.classList.add('pointer-events-none');
            }
        });

        // Back to top functionality
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Counter animation
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);

            function updateCounter() {
                start += increment;
                if (start < target) {
                    element.textContent = Math.floor(start);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            }

            updateCounter();
        }

        // Intersection Observer for counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateCounter(counter, target);
                    counterObserver.unobserve(counter);
                }
            });
        });

        document.querySelectorAll('[data-target]').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Form submission handling
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);

            // Show success message (in real implementation, you would send data to server)
            alert('Terima kasih! Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.');

            // Reset form
            this.reset();
        });

        // Add loading animation to buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                if (this.type !== 'submit') return;

                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 2000);
            });
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Add smooth reveal animation to sections
        // const revealObserver = new IntersectionObserver((entries) => {
        //     entries.forEach(entry => {
        //         if (entry.isIntersecting) {
        //             entry.target.classList.add('animate-fadeInUp');
        //         }
        //     });
        // }, {
        //     threshold: 0.1
        // });

        // document.querySelectorAll('section').forEach(section => {
        //     revealObserver.observe(section);
        // });
    </script>
</body>

</html>
