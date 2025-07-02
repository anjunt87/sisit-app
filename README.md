<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h1 align="center">🕌 Sistem Informasi Islam Terpadu<br>Nurul Imam Islamic School (NIIS)</h1>

<p align="center">
  <strong>Sistem informasi sekolah Islam terpadu berbasis Laravel + AdminLTE + TailwindCSS.</strong><br>
  Mendukung akademik, tahfidz, keuangan, dan komunikasi dalam satu platform terintegrasi.
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-v12-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php" alt="PHP"></a>
  <a href="#"><img src="https://img.shields.io/badge/TailwindCSS-3.4-06B6D4?style=for-the-badge&logo=tailwindcss" alt="TailwindCSS"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License"></a>
</p>

<p align="center">
  <a href="#-demo">🔗 Demo</a> •
  <a href="#-instalasi">📋 Instalasi</a> •
  <a href="#-fitur-utama">✨ Fitur</a> •
  <a href="#-dokumentasi">📚 Dokumentasi</a> •
  <a href="#-kontribusi">🤝 Kontribusi</a>
</p>

---

## 📌 Tentang Proyek

**NIIS (Nurul Imam Islamic School System)** adalah aplikasi manajemen sekolah berbasis web yang didesain khusus untuk kebutuhan sekolah Islam terpadu. Sistem ini menggabungkan fitur akademik konvensional dengan fitur khas pendidikan Islam seperti tahfidz Al-Qur'an, murojaah, dan evaluasi hafalan.

### 🎯 Tujuan
- Digitalisasi pengelolaan sekolah Islam modern
- Integrasi nilai-nilai syar'i dalam sistem pendidikan
- Efisiensi administrasi akademik dan non-akademik
- Transparansi komunikasi sekolah-orangtua-siswa

---

## ✨ Fitur Utama

### 🏫 **Manajemen Sekolah**
- ✅ Multi-user & role management (Admin, Guru, Siswa, Orangtua)
- ✅ Manajemen unit sekolah (TK, SD, SMP, SMA)
- ✅ Dashboard interaktif dengan widget Islamik
- ✅ Pengumuman & berita sekolah

### 📚 **Akademik**
- ✅ Jadwal pelajaran dinamis
- ✅ Input & monitoring nilai
- ✅ Rapor digital dengan template custom
- ✅ Absensi siswa & guru
- ✅ Bank soal & ujian online

### 🕌 **Modul Islamik**
- ✅ **Tahfidz Management**: tracking hafalan per siswa
- ✅ **Murojaah System**: jadwal dan evaluasi muroja'ah
- ✅ **Kajian & Tausiyah**: perpustakaan digital materi Islam
- ✅ **Evaluasi Akhlak**: penilaian karakter Islami

### 💰 **Keuangan**
- ✅ SPP & pembayaran sekolah
- ✅ Laporan keuangan real-time
- ✅ Notifikasi tunggakan otomatis

### 📱 **Komunikasi**
- ✅ Chatbot terintegrasi
- ✅ WhatsApp Gateway (opsional)
- ✅ Notifikasi push & email
- ✅ Portal orangtua

### 🎨 **UI/UX Modern**
- ✅ Responsive design (mobile-first)
- ✅ Dark mode support
- ✅ Animasi smooth (GSAP + AOS)
- ✅ Landing page profesional & SEO friendly

---

## 🧰 Tech Stack

| **Kategori** | **Teknologi** | **Versi** | **Fungsi** |
|-------------|---------------|-----------|------------|
| **Backend** | [Laravel](https://laravel.com/) | 12.x | Framework PHP utama |
| **Frontend** | [AdminLTE](https://adminlte.io/) | 3.2 | Dashboard template |
| **Styling** | [TailwindCSS](https://tailwindcss.com/) | 3.4 | Utility-first CSS |
| **Database** | MySQL | 8.0+ | Penyimpanan data |
| **Build Tool** | [Vite](https://vitejs.dev/) | 4.x | Asset bundling |
| **UI Components** | DataTables, SweetAlert2, Toastr | Latest | Interaktivitas UI |
| **Animation** | GSAP, AOS.js | Latest | Animasi & transisi |
| **Icons** | FontAwesome | 6.x | Ikon vektor |
| **Typography** | Google Fonts (Inter, Plus Jakarta Sans) | - | Font modern |

---

## 🗂️ Struktur Proyek

```
niis/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   ├── Services/
│   └── Helpers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── public/
│   ├── assets/
│   └── storage/
├── resources/
│   ├── css/
│   │   └── custom.css
│   ├── js/
│   │   └── custom.js
│   └── views/
│       ├── layouts/
│       ├── dashboard/
│       ├── landingpage/
│       └── auth/
├── routes/
│   ├── web.php
│   └── api.php
├── storage/
├── .env.example
├── vite.config.js
├── composer.json
├── package.json
└── README.md
```

---

## ⚙️ Instalasi

### Prasyarat
- PHP 8.1 atau lebih tinggi
- Composer 2.x
- Node.js 16+ & npm
- MySQL 8.0+ atau MariaDB 10.4+
- Web server (Apache/Nginx)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/your-username/niis.git
   cd niis
   ```

2. **Install Dependencies**
   ```bash
   # PHP dependencies
   composer install
   
   # Node.js dependencies
   npm install
   ```

3. **Konfigurasi Environment**
   ```bash
   # Copy dan edit file konfigurasi
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Setup Database**
   ```bash
   # Edit .env dengan kredensial database Anda
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=niis_db
   # DB_USERNAME=your_username
   # DB_PASSWORD=your_password
   
   # Jalankan migrasi dan seeder
   php artisan migrate --seed
   ```

5. **Build Assets**
   ```bash
   # Development
   npm run dev
   
   # Production
   npm run build
   ```

6. **Setup Storage**
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```

   Akses aplikasi di: `http://localhost:8000`

### 👤 Akun Default
- **Admin**: admin@niis.sch.id / password123
- **Guru**: guru@niis.sch.id / password123
- **Siswa**: siswa@niis.sch.id / password123

---

## 🌐 Demo & Screenshot

> 📸 **Screenshot akan ditambahkan segera**

| Landing Page | Dashboard Admin | Modul Tahfidz |
|-------------|-----------------|---------------|
| ![Landing](docs/images/landing.png) | ![Dashboard](docs/images/dashboard.png) | ![Tahfidz](docs/images/tahfidz.png) |

---

## 📚 Dokumentasi

| Dokumen | Status | Link |
|---------|--------|------|
| 📋 **User Manual** | 🚧 WIP | [Lihat Docs](docs/user-manual.md) |
| 🔧 **Developer Guide** | ✅ Ready | [Lihat Docs](docs/developer-guide.md) |
| 🗄️ **Database Schema** | ✅ Ready | [Lihat ERD](docs/database-erd.md) |
| 🔌 **API Documentation** | 🚧 WIP | [Postman Collection](docs/api-docs.json) |
| 🛠️ **Deployment Guide** | ✅ Ready | [Deploy Docs](docs/deployment.md) |

---

## 🤝 Kontribusi

Kami sangat terbuka untuk kontribusi! Berikut cara berkontribusi:

1. **Fork** repository ini
2. Buat **branch** fitur baru (`git checkout -b feature/amazing-feature`)
3. **Commit** perubahan (`git commit -m 'Add amazing feature'`)
4. **Push** ke branch (`git push origin feature/amazing-feature`)
5. Buat **Pull Request**

### 📋 Panduan Kontribusi
- Ikuti [PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)
- Tulis test untuk fitur baru
- Update dokumentasi jika diperlukan
- Pastikan semua test passing

### 🐛 Melaporkan Bug
Gunakan [GitHub Issues](https://github.com/your-username/niis/issues) dengan template:
- **Bug description**
- **Steps to reproduce**
- **Expected behavior**
- **Screenshots** (jika ada)
- **Environment details**

---

## 🏗️ Roadmap

### Phase 1 - Core System ✅
- [x] Manajemen user & role
- [x] Dashboard Islamik
- [x] Modul akademik dasar
- [x] Sistem tahfidz

### Phase 2 - Advanced Features 🚧
- [ ] Mobile app (React Native)
- [ ] Advanced reporting & analytics
- [ ] Integration dengan sistem pembayaran
- [ ] Multi-bahasa (ID/EN/AR)

### Phase 3 - AI Integration 🔮
- [ ] AI-powered recommendation
- [ ] Chatbot cerdas
- [ ] Analisis learning pattern
- [ ] Auto-generated content

---

## 👨‍💻 Tim Developer

<table>
  <tr>
    <td align="center">
      <img src="https://github.com/andrijuliyanto.png" width="100px;" alt="Andri Juliyanto"/><br />
      <sub><b>Andri Juliyanto</b></sub><br />
      <sub>Lead Developer</sub><br />
      <a href="mailto:andrijuliyanto87@gmail.com">📧</a>
      <a href="https://linkedin.com/in/andrijuliyanto">💼</a>
      <a href="https://github.com/andrijuliyanto">🐙</a>
    </td>
  </tr>
</table>

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE) - lihat file LICENSE untuk detail.

**⚠️ Catatan Penting:**
- Logo dan nama "Nurul Imam Islamic School" digunakan untuk keperluan internal
- Tidak diperkenankan penggunaan ulang tanpa izin resmi dari pihak sekolah
- Konten Islami bersumber dari referensi yang valid dan dapat dipertanggungjawabkan

---

## 🙏 Acknowledgments

- **Laravel Community** - Framework yang luar biasa
- **AdminLTE Team** - Template dashboard yang elegant
- **Tailwind CSS** - Utility CSS yang powerful
- **Komunitas Developer Muslim** - Inspirasi dan dukungan

---

## 💬 Support

Butuh bantuan? Hubungi kami:

- 📧 **Email**: support@niis.sch.id
- 💬 **Telegram**: [@niis_support](https://t.me/niis_support)
- 📱 **WhatsApp**: +62-xxx-xxxx-xxxx
- 🐙 **GitHub Issues**: [Report Bug](https://github.com/your-username/niis/issues)

---

<p align="center">
  <sub>
    Dibuat dengan ❤️ dan ☕ oleh <strong>Tim IT NIIS</strong><br>
    untuk kemajuan pendidikan Islam yang terintegrasi dan berkualitas
  </sub>
</p>

<p align="center">
  <img src="https://raw.githubusercontent.com/andrijuliyanto/niis/main/public/assets/images/islamic-pattern.svg" width="100" alt="Islamic Pattern">
</p>
