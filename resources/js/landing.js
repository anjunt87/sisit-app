// Import dasar
import './bootstrap';

// Import Swiper dan CSS-nya
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Import AOS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inisialisasi AOS
document.addEventListener('DOMContentLoaded', () => {
  AOS.init({
    once: true,
    duration: 700
  });
});

// Inisialisasi Swiper - Fasilitas
new Swiper('.facilities-swiper', {
  slidesPerView: 2,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  breakpoints: {
    640: { slidesPerView: 2 },
    768: { slidesPerView: 3 },
    1024: { slidesPerView: 4 },
    1280: { slidesPerView: 5 }
  }
});

// Swiper lainnya bisa ditambahkan sesuai kebutuhan
new Swiper('.testimonial-swiper', {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  breakpoints: {
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 3 }
  }
});

new Swiper('.berita-swiper', {
  slidesPerView: 2,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  breakpoints: {
    640: { slidesPerView: 2 },
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 3 },
    1280: { slidesPerView: 4 }
  }
});

new Swiper('.kerja-sama-swiper', {
  slidesPerView: 2,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  breakpoints: {
    640: { slidesPerView: 3 },
    1024: { slidesPerView: 5 }
  }
});
