<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h1 align="center">🕌 Sistem Informasi Islam Terpadu<br>Nurul Imam Islamic School (NIIS)</h1>

<p align="center">
  <strong>Comprehensive Islamic school management system built with Laravel + AdminLTE + TailwindCSS.</strong><br>
  Supporting academics, Tahfidz, finance, and communication in one integrated platform.
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-v12-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php" alt="PHP"></a>
  <a href="#"><img src="https://img.shields.io/badge/TailwindCSS-3.4-06B6D4?style=for-the-badge&logo=tailwindcss" alt="TailwindCSS"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License"></a>
</p>

<p align="center">
  <a href="#-demo">🔗 Demo</a> •
  <a href="#-installation">📋 Installation</a> •
  <a href="#-key-features">✨ Features</a> •
  <a href="#-documentation">📚 Documentation</a> •
  <a href="#-contributing">🤝 Contributing</a>
</p>

---

## 📌 About The Project

**NIIS (Nurul Imam Islamic School System)** is a comprehensive web-based school management application designed specifically for integrated Islamic schools. This system combines conventional academic features with Islamic education-specific features such as Qur'an memorization (Tahfidz), Murojaah, and memorization evaluation.

### 🎯 Objectives
- Digitalization of modern Islamic school management
- Integration of Syar'i values in the education system
- Efficiency in academic and non-academic administration
- Transparency in school-parent-student communication

---

## ✨ Key Features

### 🏫 **School Management**
- ✅ Multi-user & role management (Admin, Teacher, Student, Parent)
- ✅ Multi-unit school management (Kindergarten, Elementary, Middle, High School)
- ✅ Interactive dashboard with Islamic widgets
- ✅ School announcements & news

### 📚 **Academic Module**
- ✅ Dynamic class scheduling
- ✅ Grade input & monitoring
- ✅ Digital report cards with custom templates
- ✅ Student & teacher attendance
- ✅ Question bank & online examinations

### 🕌 **Islamic Module**
- ✅ **Tahfidz Management**: Individual student memorization tracking
- ✅ **Murojaah System**: Revision scheduling and evaluation
- ✅ **Study & Tausiyah**: Digital library of Islamic materials
- ✅ **Character Evaluation**: Islamic character assessment

### 💰 **Financial Management**
- ✅ Tuition & school fee payments
- ✅ Real-time financial reporting
- ✅ Automatic payment reminder notifications

### 📱 **Communication**
- ✅ Integrated chatbot
- ✅ WhatsApp Gateway (optional)
- ✅ Push notifications & email
- ✅ Parent portal

### 🎨 **Modern UI/UX**
- ✅ Responsive design (mobile-first)
- ✅ Dark mode support
- ✅ Smooth animations (GSAP + AOS)
- ✅ Professional & SEO-friendly landing page

---

## 🧰 Tech Stack

| **Category** | **Technology** | **Version** | **Purpose** |
|-------------|---------------|-------------|-------------|
| **Backend** | [Laravel](https://laravel.com/) | 11.x | Main PHP framework |
| **Frontend** | [AdminLTE](https://adminlte.io/) | 3.2 | Dashboard template |
| **Styling** | [TailwindCSS](https://tailwindcss.com/) | 3.4 | Utility-first CSS |
| **Database** | MySQL | 8.0+ | Data storage |
| **Build Tool** | [Vite](https://vitejs.dev/) | 5.x | Asset bundling |
| **UI Components** | DataTables, SweetAlert2, Toastr | Latest | UI interactivity |
| **Animation** | GSAP, AOS.js | Latest | Animations & transitions |
| **Icons** | FontAwesome | 6.x | Vector icons |
| **Typography** | Google Fonts (Inter, Plus Jakarta Sans) | - | Modern fonts |

---

## 🗂️ Project Structure

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
│   │   └── app.css
│   ├── js/
│   │   └── app.js
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

## ⚙️ Installation

### Prerequisites
- PHP 8.2 or higher
- Composer 2.x
- Node.js 18+ & npm
- MySQL 8.0+ or MariaDB 10.4+
- Web server (Apache/Nginx)

### Installation Steps

1. **Clone Repository**
   ```bash
   git clone https://github.com/anjunt87/sisit-app.git
   cd sisit-app
   ```

2. **Install Dependencies**
   ```bash
   # PHP dependencies
   composer install
   
   # Node.js dependencies
   npm install
   ```

3. **Environment Configuration**
   ```bash
   # Copy and edit configuration file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   # Edit .env with your database credentials
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=niis_db
   # DB_USERNAME=your_username
   # DB_PASSWORD=your_password
   
   # Run migrations and seeders
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

7. **Run Application**
   ```bash
   php artisan serve
   ```

   Access the application at: `http://localhost:8000`

### 👤 Default Accounts
- **Admin**: admin@niis.sch.id / password123
- **Teacher**: guru@niis.sch.id / password123
- **Student**: siswa@niis.sch.id / password123

---

## 🌐 Demo & Screenshots

> 📸 **Screenshots will be added soon**

| Landing Page | Admin Dashboard | Tahfidz Module |
|-------------|-----------------|---------------|
| ![Landing](docs/images/landing.png) | ![Dashboard](docs/images/dashboard.png) | ![Tahfidz](docs/images/tahfidz.png) |

---

## 📚 Documentation

| Document | Status | Link |
|----------|--------|------|
| 📋 **User Manual** | 🚧 WIP | [View Docs](docs/user-manual.md) |
| 🔧 **Developer Guide** | ✅ Ready | [View Docs](docs/developer-guide.md) |
| 🗄️ **Database Schema** | ✅ Ready | [View ERD](docs/database-erd.md) |
| 🔌 **API Documentation** | 🚧 WIP | [Postman Collection](docs/api-docs.json) |
| 🛠️ **Deployment Guide** | ✅ Ready | [Deploy Docs](docs/deployment.md) |

---

## 🤝 Contributing

We welcome contributions! Here's how to contribute:

1. **Fork** this repository
2. Create a **feature branch** (`git checkout -b feature/amazing-feature`)
3. **Commit** your changes (`git commit -m 'Add amazing feature'`)
4. **Push** to the branch (`git push origin feature/amazing-feature`)
5. Create a **Pull Request**

### 📋 Contribution Guidelines
- Follow [PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)
- Write tests for new features
- Update documentation if necessary
- Ensure all tests pass

### 🐛 Bug Reports
Use [GitHub Issues](https://github.com/anjunt87/sisit-app/issues) with template:
- **Bug description**
- **Steps to reproduce**
- **Expected behavior**
- **Screenshots** (if applicable)
- **Environment details**

---

## 🏗️ Roadmap

### Phase 1 - Core System ✅
- [x] User & role management
- [x] Islamic dashboard
- [x] Basic academic modules
- [x] Tahfidz system

### Phase 2 - Advanced Features 🚧
- [ ] Mobile app (React Native)
- [ ] Advanced reporting & analytics
- [ ] Payment system integration
- [ ] Multi-language support (ID/EN/AR)

### Phase 3 - AI Integration 🔮
- [ ] AI-powered recommendations
- [ ] Intelligent chatbot
- [ ] Learning pattern analysis
- [ ] Auto-generated content

---

## 👨‍💻 Development Team

<table>
  <tr>
    <td align="center">
      <img src="https://github.com/anjunt87.png" width="100px;" alt="Developer"/><br />
      <sub><b>Anjunt87</b></sub><br />
      <sub>Lead Developer</sub><br />
      <a href="https://github.com/anjunt87">🐙</a>
    </td>
  </tr>
</table>

---

## 📄 License

This project is licensed under the [MIT License](LICENSE) - see the LICENSE file for details.

**⚠️ Important Note:**
- The "Nurul Imam Islamic School" logo and name are used for internal purposes
- Reuse is not permitted without official permission from the school
- Islamic content is sourced from valid and accountable references

---

## 🙏 Acknowledgments

- **Laravel Community** - Amazing framework
- **AdminLTE Team** - Elegant dashboard template
- **Tailwind CSS** - Powerful utility CSS
- **Muslim Developer Community** - Inspiration and support

---

## 💬 Support

Need help? Contact us:

- 📧 **Email**: support@niis.sch.id
- 💬 **Telegram**: [@niis_support](https://t.me/niis_support)
- 📱 **WhatsApp**: +62-xxx-xxxx-xxxx
- 🐙 **GitHub Issues**: [Report Bug](https://github.com/anjunt87/sisit-app/issues)

---

<p align="center">
  <sub>
    Built with ❤️ and ☕ by <strong>NIIS IT Team</strong><br>
    for the advancement of integrated and quality Islamic education
  </sub>
</p>

<p align="center">
  <img src="https://raw.githubusercontent.com/anjunt87/sisit-app/main/public/assets/images/islamic-pattern.svg" width="100" alt="Islamic Pattern" onerror="this.style.display='none'">
</p>
