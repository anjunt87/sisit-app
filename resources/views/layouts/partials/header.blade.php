<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SISIT NIIS' }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AdminLTE Theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Plugin Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5/bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.6.2/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Kustom Styling Profesional Bertema Islami -->
    <style>
        :root {
            /* Islamic Warm Color Palette */
            --primary-green: #16610E;
            --accent-orange: #F97A00;
            --accent-gold: #FED16A;
            --light-gold: #FFF4A4;
            --light-green: #F5FFF0;

            /* Typography & Neutrals */
            --text-primary: #1a202c;
            --text-secondary: #4a5568;
            --text-muted: #718096;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #edf2f7;
            --border-color: #e2e8f0;

            /* Shadows */
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);

            /* Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 14px;
            line-height: 1.6;
        }

        /* Preloader Enhancement */
        .preloader {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            backdrop-filter: blur(10px);
        }

        .preloader .logo-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-xl);
            padding: 2rem;
            text-align: center;
        }

        .preloader .loading-text {
            color: white;
            font-weight: 600;
            margin-top: 1rem;
            font-size: 1.1rem;
        }

        /* Main Header Enhancement */
        .main-header.navbar {
            background: linear-gradient(135deg, var(--bg-primary) 0%, #fafbfc 100%);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
        }

        .navbar-brand {
            background: transparent !important;
            border: none !important;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            background: var(--light-green) !important;
            transform: translateY(-1px);
        }

        /* Enhanced Sidebar */
        .main-sidebar {
            background: linear-gradient(180deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
            border-right: 1px solid var(--border-color);
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .brand-link {
            background: var(--primary-green);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.25rem 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            /* Vertikal tengah */
            justify-content: center;
            /* Horizontal tengah */
            flex-direction: column;
            /* Teks di bawah logo */
            gap: 0.3rem;
            /* Jarak antara logo dan teks */
        }

        .brand-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .brand-link:hover::before {
            left: 100%;
        }

        .brand-image {
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .brand-text {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: white;
            line-height: 1.2;
            font-size: 0.75rem;
            /* default */
            text-align: center;
        }

        .brand-subtitle {
            font-size: 0.9rem;
            font-weight: 700;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .brand-text {
                font-size: clamp(0.6rem, 1.5vw, 0.8rem);
            }

            .d-block {
                font-size: clamp(0.75rem, 1.8vw, 1rem);
            }

            .brand-subtitle {
                font-size: clamp(0.75rem, 1.8vw, 1rem);
            }
        }

        .brand-link:hover .brand-image {
            transform: scale(1.05);
            border-color: var(--accent-gold);
        }

        /* User Panel Enhancement */
        /* .user-panel {
            background: var(--light-green);
            margin: 1rem;
            padding: 1rem;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(15, 123, 108, 0.1);
            transition: all 0.3s ease;
        }

        .user-panel:hover {
            background: rgba(15, 123, 108, 0.08);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .user-panel .info a {
            color: var(--primary-green) !important;
            font-weight: 600;
            text-decoration: none;
        }

        .user-panel small {
            color: var(--text-secondary) !important;
            font-weight: 500;
        } */

        /* Professional Navigation - Ukuran Diperkecil */
        .nav-sidebar .nav-item .nav-link {
            color: var(--text-secondary) !important;
            border-radius: var(--radius-sm);
            /* lebih kecil */
            margin: 0.25rem 0.25rem;
            /* vertical spacing diperkecil */
            padding: 0.5rem 0.75rem;
            /* padding dalam dikurangi */
            transition: all 0.3s cubic-bezier(0.2, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.875rem;
            /* ← ukuran teks diperkecil */
            position: relative;
            overflow: hidden;
            width: 14rem;
        }

        /* Highlight kiri ketika hover */
        .nav-sidebar .nav-item .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: var(--primary-green);
            transition: width 0.3s ease;
            border-radius: var(--radius-sm);
        }

        .nav-sidebar .nav-item .nav-link:hover {
            background: var(--light-green) !important;
            color: var(--primary-green) !important;
            transform: translateX(3px);
            box-shadow: var(--shadow-xs);
        }

        .nav-sidebar .nav-item .nav-link:hover::before {
            width: 3px;
        }

        .nav-sidebar .nav-item .nav-link.active {
            background: var(--primary-green) !important;
            color: white !important;
            box-shadow: var(--shadow-sm);
            font-weight: 600;
        }

        /* Submenu Treeview Diperkecil */
        .nav-sidebar .nav-treeview .nav-link {
            padding-left: 1.5rem;
            font-size: 0.8125rem;
            /* 13px */
        }

        /* Nav Header Ukuran Kecil */
        .nav-header {
            color: var(--text-muted) !important;
            font-weight: 600;
            font-size: 0.6875rem;
            /* 11px */
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin: 1rem 0.75rem 0.5rem;
            padding-bottom: 0.25rem;
            border-bottom: 1px solid var(--border-color);
        }

        /* Content Area Enhancement */
        .content-wrapper {
            background: var(--bg-secondary);
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        .content-header {
            background: var(--bg-primary);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            margin-bottom: 0;
        }

        .content-header h1 {
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.75rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .breadcrumb {
            background: transparent;
            margin: 0;
            padding: 0;
        }

        .breadcrumb-item a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }

        /* Card Enhancements */
        .card {
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            background: var(--bg-primary);
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-header {
            background: var(--bg-primary);
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-success .card-header {
            background: var(--primary-green);
            color: white;
            border: none;
        }

        /* Enhanced Buttons */
        .btn {
            border-radius: var(--radius-md);
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: none;
            letter-spacing: 0.025em;
        }

        .btn-success {
            background: var(--primary-green);
            border-color: var(--primary-green);
            box-shadow: var(--shadow-sm);
        }

        .btn-success:hover {
            background: var(--secondary-green);
            border-color: var(--secondary-green);
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        /* Prayer Time Widget */
        .prayer-time-widget {
            background: linear-gradient(135deg, var(--light-green), white);
            border: 1px solid rgba(15, 123, 108, 0.1);
            border-radius: var(--radius-lg);
            padding: 1rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .prayer-time-widget:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        /* Islamic Pattern Background */
        .islamic-pattern {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(15, 123, 108, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(15, 123, 108, 0.05) 0%, transparent 50%);
        }

        /* Enhanced Footer */
        .main-footer {
            background: var(--bg-primary);
            border-top: 1px solid var(--border-color);
            color: var(--text-secondary);
            padding: 1.5rem;
            font-size: 0.875rem;
        }

        .main-footer a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0;
            }

            .main-header h1 {
                font-size: 1.5rem;
            }

            .brand-text {
                font-size: 1rem;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .slide-up {
            animation: slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Navbar Enhancements */
        .navbar-nav .nav-link {
            border-radius: var(--radius-md);
            margin: 0 0.25rem;
            padding: 0.5rem 0.75rem !important;
            transition: all 0.3s ease;
            color: var(--text-secondary) !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            background: var(--light-green);
            color: var(--primary-green) !important;
            transform: translateY(-1px);
        }

        .dropdown-menu {
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: var(--radius-md);
            margin: 0.125rem 0;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: var(--light-green);
            color: var(--primary-green);
        }

        /* Badge Enhancement */
        .badge {
            border-radius: var(--radius-sm);
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* Loading States */
        .btn.loading {
            position: relative;
            color: transparent !important;
        }

        .btn.loading::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Focus States for Accessibility */
        .nav-link:focus,
        .btn:focus,
        .dropdown-item:focus {
            outline: 2px solid var(--primary-green);
            outline-offset: 2px;
        }

        /* Dark Mode Support */
        /* Dark Mode Variables — pakai class manual 'auto-dark' */
        .auto-dark {
            --bg-primary: #212121;
            /* Background utama gelap */
            --bg-secondary: #2b2b2b;
            /* Background sekunder, sidebar, card */
            --primary-green: #06923e;
            /* Hijau utama */
            --accent-orange: #e67514;
            /* Oranye aksen kuat */
            --accent-green-light: #d3eccd;
            /* Highlight, teks penting */
            --text-primary: #d3eccd;
            /* Teks utama */
            --text-secondary: #a3b9a3;
            /* Teks sekunder lembut */
            --border-color: #3a3a3a;
            /* Border halus */
        }

        /* Override beberapa elemen untuk dark mode */
        .auto-dark body {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
        }

        .auto-dark .main-header.navbar {
            background: var(--bg-primary);
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.7);
        }

        .auto-dark .navbar-nav .nav-link {
            color: var(--text-secondary) !important;
        }

        .auto-dark .navbar-nav .nav-link:hover,
        .auto-dark .navbar-nav .nav-link:focus {
            background-color: var(--light-green) !important;
            color: var(--accent-gold) !important;
        }

        .auto-dark .dropdown-menu {
            background-color: var(--bg-primary);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.75);
        }

        .auto-dark .dropdown-item:hover,
        .auto-dark .dropdown-item:focus {
            background-color: var(--light-green);
            color: var(--accent-gold);
        }

        .auto-dark .badge-warning {
            background-color: var(--accent-gold);
            color: var(--bg-primary);
        }

        .auto-dark .prayer-schedule .border-bottom {
            border-color: var(--border-color);
        }

        .auto-dark .prayer-schedule .bg-light {
            background-color: var(--light-green) !important;
        }

        /* Navbar icon warna */
        .auto-dark .fas.fa-mosque.text-success {
            color: var(--primary-green) !important;
        }

        .auto-dark .fas.fa-adjust {
            color: var(--accent-gold);
        }

        .islamic-card {
            border-left: 4px solid var(--primary-green);
            background-color: var(--light-green);
        }

        .next-prayer {
            background-color: var(--light-gold) !important;
        }
    </style>

    @stack('styles')
</head>
