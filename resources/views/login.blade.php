<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#10b981">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Sistem Sekolah">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icon-192x192.png">

    <title>Login - Sistem Sekolah</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/logo-niis-warna.png') }}">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/css/landing.css'])
    @vite(['resources/js/app.js', 'resources/js/landing.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .floating-label {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: top left;
        }

        .input-group.input-focused .floating-label {
            transform: translate(-12px, -28px) scale(0.85);
            color: #10b981;
            font-weight: 500;
        }

        .gradient-text {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .shimmer-effect {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            background-size: 200% 100%;
        }

        .biometric-button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .biometric-button:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-emerald-50 to-teal-50 overflow-hidden">
    <!-- PWA Install Prompt -->
    <div id="pwa-prompt"
        class="hidden fixed top-4 right-4 z-50 glass-morphism rounded-2xl p-4 shadow-2xl animate-slide-in-right">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center">
                <i class="fas fa-download text-white text-sm"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Install App</p>
                <p class="text-xs text-gray-600">Akses lebih cepat dari home screen</p>
            </div>
            <button onclick="dismissPWAPrompt()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>
    </div>

    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Floating Geometric Shapes -->
        <div
            class="absolute top-20 left-20 w-32 h-32 bg-gradient-to-br from-emerald-200 to-emerald-300 rounded-3xl rotate-12 opacity-30 animate-float">
        </div>
        <div
            class="absolute top-40 right-32 w-24 h-24 bg-gradient-to-br from-teal-200 to-teal-300 rounded-full opacity-40 animate-float-delayed">
        </div>
        <div
            class="absolute bottom-32 left-40 w-20 h-20 bg-gradient-to-br from-green-200 to-green-300 rounded-2xl rotate-45 opacity-35 animate-float-delayed-2">
        </div>
        <div
            class="absolute bottom-20 right-20 w-28 h-28 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-full opacity-25 animate-float">
        </div>

        <!-- Gradient Orbs -->
        <div
            class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-gentle">
        </div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-15 animate-pulse-gentle"
            style="animation-delay: 0,1s;"></div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex">
        <!-- Left Panel - Branding -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden animate-slide-in-left">
            <div class="flex flex-col justify-center items-center w-full p-12 relative z-10">
                <!-- Logo Section -->
                <div class="text-center mb-12 ">
                    <div class="relative mb-8">
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-emerald-500 via-emerald-600 to-teal-600 rounded-3xl shadow-2xl flex items-center justify-center mb-6 mx-auto animate-pulse-gentle transform hover:scale-105 transition-transform duration-500">
                            <i class="fas fa-graduation-cap text-white text-4xl"></i>
                        </div>
                        <!-- Floating badges -->
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-400 rounded-full animate-bounce-gentle">
                        </div>
                        <div class="absolute -bottom-2 -left-2 w-6 h-6 bg-teal-400 rounded-full animate-bounce-gentle"
                            style="animation-delay: 1s;"></div>
                    </div>

                    <h1 class="text-5xl font-bold gradient-text mb-4 tracking-tight">
                        Sistem Sekolah
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Platform pembelajaran digital terdepan untuk masa depan pendidikan yang lebih baik
                    </p>

                    <!-- Feature highlights -->
                    <div class="grid grid-cols-1 gap-4 mt-12 max-w-sm mx-auto">
                        <div class="flex items-center space-x-3 -delayed">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-shield-alt text-emerald-600"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Keamanan Tingkat Bank</span>
                        </div>
                        <div class="flex items-center space-x-3 -delayed" style="animation-delay: 0.1s;">
                            <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-mobile-alt text-teal-600"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Akses Multi-Platform</span>
                        </div>
                        <div class="flex items-center space-x-3 -delayed" style="animation-delay: 0.2s;">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-green-600"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Real-time Sync</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative elements -->
            <div
                class="absolute top-10 right-10 w-20 h-20 border-4 border-emerald-200 rounded-full animate-spin-slow opacity-30">
            </div>
            <div
                class="absolute bottom-10 left-10 w-16 h-16 border-4 border-teal-200 rounded-full animate-pulse opacity-40">
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div
            class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12 overflow-hidden animate-slide-in-right">
            <div class="w-full max-w-md">
                <!-- Mobile Logo (visible on small screens) -->
                <div class="lg:hidden text-center mb-8 ">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold gradient-text">Sistem Sekolah</h1>
                    <p class="text-gray-600 text-sm mt-2">Masuk ke akun Anda</p>
                </div>

                <!-- Login Form Container -->
                <div class="glass-morphism rounded-3xl shadow-2xl p-8 lg:p-10 ">
                    <!-- Welcome Text -->
                    <div class="text-center mb-8 ">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
                        <p class="text-gray-600">Masuk untuk melanjutkan ke dashboard</p>
                    </div>

                    <!-- Success Message -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl ">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <p class="text-emerald-700 text-sm font-medium">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl animate-scale-in">
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="fas fa-exclamation text-white text-sm"></i>
                                </div>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-red-700 text-sm font-medium">{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-6">
                        @csrf

                        <!-- Login Field with Floating Label -->
                        <div class="relative" style="animation-delay: 0.1s;">
                            <div class="input-group relative">
                                <input type="text" id="login" name="login" value="{{ old('login') }}"
                                    class="peer w-full px-4 py-4 pl-12 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-2xl focus:border-emerald-500 focus:outline-none transition-all duration-300 placeholder-transparent @error('login') border-red-400 @enderror"
                                    placeholder="Email atau Username" required>
                                <label for="login"
                                    class="floating-label absolute left-12 top-4 text-gray-500 transition-all duration-300 pointer-events-none">
                                    Email atau Username
                                </label>
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-user text-emerald-500 transition-colors duration-300"></i>
                                </div>
                                <!-- Input type indicator -->
                                <div id="loginTypeIndicator"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 opacity-0 transition-opacity duration-300">
                                    <i class="fas fa-at text-emerald-500 text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Password Field with Floating Label -->
                        <div class="relative " style="animation-delay: 0.2s;">
                            <div class="input-group relative">
                                <input type="password" id="password" name="password"
                                    class="peer w-full px-4 py-4 pl-12 pr-12 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-2xl focus:border-emerald-500 focus:outline-none transition-all duration-300 placeholder-transparent @error('password') border-red-400 @enderror"
                                    placeholder="Password" required>
                                <label for="password"
                                    class="floating-label absolute left-12 top-4 text-gray-500 transition-all duration-300 pointer-events-none">
                                    Password
                                </label>
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-lock text-emerald-500 transition-colors duration-300"></i>
                                </div>
                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-emerald-500 transition-colors duration-300 focus:outline-none">
                                    <i id="passwordToggleIcon" class="fas fa-eye"></i>
                                </button>
                            </div>
                            <!-- Password strength indicator -->
                            <div id="passwordStrength"
                                class="hidden mt-2 h-1 bg-gray-200 rounded-full overflow-hidden">
                                <div id="passwordStrengthBar" class="h-full transition-all duration-300 rounded-full">
                                </div>
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between " style="animation-delay: 0.3s;">
                            <label class="flex items-center cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" name="remember" class="sr-only">
                                    <div
                                        class="w-5 h-5 bg-white border-2 border-gray-300 rounded-md group-hover:border-emerald-400 transition-colors duration-300">
                                    </div>
                                    <div
                                        class="absolute inset-0 w-5 h-5 bg-emerald-500 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                </div>
                                <span
                                    class="ml-3 text-sm text-gray-600 group-hover:text-gray-800 transition-colors duration-300">Ingat
                                    saya</span>
                            </label>
                            <a href="#"
                                class="text-sm text-emerald-600 hover:text-emerald-700 font-medium transition-colors duration-300 hover:underline">
                                Lupa password?
                            </a>
                        </div>

                        <!-- Biometric Login Options -->
                        <div class="flex justify-center space-x-4 " style="animation-delay: 0.4s;">
                            <button type="button"
                                class="biometric-button w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center text-white shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                                <i class="fas fa-fingerprint text-lg"></i>
                            </button>
                            <button type="button"
                                class="biometric-button w-12 h-12 bg-gradient-to-r from-teal-500 to-emerald-500 rounded-2xl flex items-center justify-center text-white shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                                <i class="fas fa-face-smile text-lg"></i>
                            </button>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" id="loginBtn"
                            class="w-full relative overflow-hidden bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-4 px-6 rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-emerald-300 "
                            style="animation-delay: 0.5s;">
                            <span id="loginText" class="flex items-center justify-center">
                                <i class="fas fa-sign-in-alt mr-3"></i>
                                Masuk ke Dashboard
                            </span>
                            <span id="loadingText" class="hidden flex items-center justify-center">
                                <div
                                    class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin mr-3">
                                </div>
                                Memproses...
                            </span>
                            <!-- Shimmer effect -->
                            <div
                                class="absolute inset-0 shimmer-effect animate-shimmer opacity-0 hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </button>
                    </form>
                    {{-- 
                    <!-- Divider -->
                    <div class="my-8 flex items-center " style="animation-delay: 0.6s;">
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                        <span class="px-4 text-sm text-gray-500 bg-white/60 rounded-full">atau</span>
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                    </div>

                    <!-- Quick Access -->
                    <div class="text-center " style="animation-delay: 0.7s;">
                        <p class="text-sm text-gray-500 mb-4">Akses cepat untuk</p>
                        <div class="grid grid-cols-3 gap-3">
                            <div
                                class="p-3 bg-blue-50 rounded-xl text-center group hover:bg-blue-100 transition-colors duration-300 cursor-pointer">
                                <i
                                    class="fas fa-user-shield text-blue-500 mb-1 group-hover:scale-110 transition-transform duration-300"></i>
                                <div class="text-xs text-blue-700 font-medium">Admin</div>
                            </div>
                            <div
                                class="p-3 bg-purple-50 rounded-xl text-center group hover:bg-purple-100 transition-colors duration-300 cursor-pointer">
                                <i
                                    class="fas fa-chalkboard-teacher text-purple-500 mb-1 group-hover:scale-110 transition-transform duration-300"></i>
                                <div class="text-xs text-purple-700 font-medium">Guru</div>
                            </div>
                            <div
                                class="p-3 bg-emerald-50 rounded-xl text-center group hover:bg-emerald-100 transition-colors duration-300 cursor-pointer">
                                <i
                                    class="fas fa-user-graduate text-emerald-500 mb-1 group-hover:scale-110 transition-transform duration-300"></i>
                                <div class="text-xs text-emerald-700 font-medium">Siswa</div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 " style="animation-delay: 0.8s;">
                    <p class="text-sm text-gray-500">
                        Nurul Imam Islamic School © 2019 - 2025. All Rights Reserved
                        {{-- <span class="inline-block mx-2">•</span>
                        <button onclick="showPWAPrompt()"
                            class="text-emerald-600 hover:text-emerald-700 font-medium transition-colors duration-300">
                            Install App
                        </button> --}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay"
        class="hidden fixed inset-0 bg-black/20 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-white rounded-3xl p-8 shadow-2xl text-center animate-scale-in">
            <div
                class="w-16 h-16 border-4 border-emerald-200 border-t-emerald-500 rounded-full animate-spin mb-4 mx-auto">
            </div>
            <p class="text-gray-700 font-medium">Sedang masuk...</p>
        </div>
    </div>

    <script>
        // Floating label functionality
        function setupFloatingLabels() {
            document.querySelectorAll('input').forEach(input => {
                const inputGroup = input.closest('.input-group');
                if (!inputGroup) return;

                function updateLabel() {
                    if (input.value || input === document.activeElement) {
                        inputGroup.classList.add('input-focused');
                    } else {
                        inputGroup.classList.remove('input-focused');
                    }
                }

                input.addEventListener('focus', updateLabel);
                input.addEventListener('blur', updateLabel);
                input.addEventListener('input', updateLabel);

                // Initial check
                updateLabel();
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            setupFloatingLabels();
        });

        // Password toggle functionality
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('passwordToggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Login type detection
        function setupLoginTypeDetection() {
            const loginInput = document.getElementById('login');
            const indicator = document.getElementById('loginTypeIndicator');

            loginInput.addEventListener('input', function() {
                const value = this.value;
                const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);

                if (value.length > 0) {
                    indicator.style.opacity = '1';
                    const icon = indicator.querySelector('i');

                    if (isEmail) {
                        icon.className = 'fas fa-at text-emerald-500 text-sm';
                    } else {
                        icon.className = 'fas fa-user text-gray-400 text-sm';
                    }
                } else {
                    indicator.style.opacity = '0';
                }
            });
        }

        // Password strength indicator
        function setupPasswordStrength() {
            const passwordInput = document.getElementById('password');
            const strengthContainer = document.getElementById('passwordStrength');
            const strengthBar = document.getElementById('passwordStrengthBar');

            passwordInput.addEventListener('input', function() {
                const password = this.value;

                if (password.length > 0) {
                    strengthContainer.classList.remove('hidden');

                    let strength = 0;
                    if (password.length >= 8) strength += 25;
                    if (/[a-z]/.test(password)) strength += 25;
                    if (/[A-Z]/.test(password)) strength += 25;
                    if (/[0-9]/.test(password)) strength += 25;

                    strengthBar.style.width = strength + '%';

                    if (strength < 50) {
                        strengthBar.className = 'h-full transition-all duration-300 rounded-full bg-red-400';
                    } else if (strength < 75) {
                        strengthBar.className = 'h-full transition-all duration-300 rounded-full bg-yellow-400';
                    } else {
                        strengthBar.className = 'h-full transition-all duration-300 rounded-full bg-emerald-400';
                    }
                } else {
                    strengthContainer.classList.add('hidden');
                }
            });
        }

        // Custom checkbox functionality
        function setupCustomCheckbox() {
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                const label = checkbox.closest('label');
                const checkboxDiv = label.querySelector('div');
                const checkIcon = label.querySelector('.absolute');

                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        checkboxDiv.classList.add('border-emerald-500', 'bg-emerald-500');
                        checkboxDiv.classList.remove('border-gray-300', 'bg-white');
                        checkIcon.classList.remove('opacity-0');
                        checkIcon.classList.add('opacity-100');
                    } else {
                        checkboxDiv.classList.remove('border-emerald-500', 'bg-emerald-500');
                        checkboxDiv.classList.add('border-gray-300', 'bg-white');
                        checkIcon.classList.add('opacity-0');
                        checkIcon.classList.remove('opacity-100');
                    }
                });
            });
        }

        // Form submission with enhanced loading
        function setupFormSubmission() {
            const form = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const loginText = document.getElementById('loginText');
            const loadingText = document.getElementById('loadingText');
            const loadingOverlay = document.getElementById('loadingOverlay');

            form.addEventListener('submit', function(e) {
                // Show loading state
                loginBtn.disabled = true;
                loginText.classList.add('hidden');
                loadingText.classList.remove('hidden');
                loginBtn.classList.add('opacity-75', 'cursor-not-allowed');

                // Show overlay after short delay
                setTimeout(() => {
                    loadingOverlay.classList.remove('hidden');
                }, 300);

                // Add ripple effect
                createRippleEffect(loginBtn, e);
            });
        }

        // Ripple effect for buttons
        function createRippleEffect(element, event) {
            const ripple = document.createElement('span');
            const rect = element.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;

            element.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        }

        // Auto-hide alerts
        function setupAutoHideAlerts() {
            setTimeout(() => {
                const alerts = document.querySelectorAll('[class*="bg-emerald-50"], [class*="bg-red-50"]');
                alerts.forEach(alert => {
                    alert.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                    alert.style.transform = 'translateY(-20px)';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                });
            }, 5000);
        }

        // PWA functionality
        let deferredPrompt;

        function setupPWA() {
            window.addEventListener('beforeinstallprompt', (e) => {
                e.preventDefault();
                deferredPrompt = e;
                showPWAPrompt();
            });

            window.addEventListener('appinstalled', () => {
                console.log('PWA was installed');
                hidePWAPrompt();
            });

            // Register service worker
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js')
                        .then((registration) => {
                            console.log('SW registered: ', registration);
                        })
                        .catch((registrationError) => {
                            console.log('SW registration failed: ', registrationError);
                        });
                });
            }
        }

        function showPWAPrompt() {
            const prompt = document.getElementById('pwa-prompt');
            if (deferredPrompt && prompt) {
                prompt.classList.remove('hidden');

                // Auto-hide after 10 seconds
                setTimeout(() => {
                    dismissPWAPrompt();
                }, 10000);
            }
        }

        function dismissPWAPrompt() {
            const prompt = document.getElementById('pwa-prompt');
            if (prompt) {
                prompt.style.transform = 'translateX(100%)';
                prompt.style.opacity = '0';
                setTimeout(() => {
                    prompt.classList.add('hidden');
                    prompt.style.transform = '';
                    prompt.style.opacity = '';
                }, 300);
            }
        }

        async function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const {
                    outcome
                } = await deferredPrompt.userChoice;
                console.log(`User response to the install prompt: ${outcome}`);
                deferredPrompt = null;
                dismissPWAPrompt();
            }
        }

        // Input focus effects
        function setupInputEffects() {
            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.boxShadow = '0 8px 25px rgba(16, 185, 129, 0.15)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                    this.parentElement.style.boxShadow = '';
                });
            });
        }

        // Quick access role selection
        // function setupQuickAccess() {
        //     document.querySelectorAll('.grid div[class*="cursor-pointer"]').forEach(roleCard => {
        //         roleCard.addEventListener('click', function() {
        //             const roleType = this.querySelector('.text-xs').textContent.toLowerCase();
        //             const loginInput = document.getElementById('login');

        //             // Demo credentials (remove in production)
        //             // const demoCredentials = {
        //             //     'admin': 'admin@sekolah.id',
        //             //     'guru': 'guru@sekolah.id',
        //             //     'siswa': 'siswa@sekolah.id'
        //             // };

        //             if (demoCredentials[roleType]) {
        //                 loginInput.value = demoCredentials[roleType];
        //                 loginInput.dispatchEvent(new Event('input'));
        //                 loginInput.focus();

        //                 // Add visual feedback
        //                 this.style.transform = 'scale(0.95)';
        //                 setTimeout(() => {
        //                     this.style.transform = 'scale(1)';
        //                 }, 150);
        //             }
        //         });
        //     });
        // }

        // Keyboard shortcuts
        function setupKeyboardShortcuts() {
            document.addEventListener('keydown', function(e) {
                // Alt + L to focus login field
                if (e.altKey && e.key.toLowerCase() === 'l') {
                    e.preventDefault();
                    document.getElementById('login').focus();
                }

                // Alt + P to focus password field
                if (e.altKey && e.key.toLowerCase() === 'p') {
                    e.preventDefault();
                    document.getElementById('password').focus();
                }

                // Enter to submit (when form is focused)
                if (e.key === 'Enter' && (document.activeElement.tagName === 'INPUT')) {
                    const form = document.getElementById('loginForm');
                    if (form.checkValidity()) {
                        form.requestSubmit();
                    }
                }
            });
        }

        // Network status indicator
        function setupNetworkStatus() {
            function updateNetworkStatus() {
                const isOnline = navigator.onLine;
                const loginBtn = document.getElementById('loginBtn');

                if (!isOnline) {
                    const offlineIndicator = document.createElement('div');
                    offlineIndicator.id = 'offline-indicator';
                    offlineIndicator.className =
                        'fixed top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-medium z-50 animate-slide-in-left';
                    offlineIndicator.innerHTML = '<i class="fas fa-wifi-slash mr-2"></i>Offline';
                    document.body.appendChild(offlineIndicator);

                    loginBtn.disabled = true;
                    loginBtn.classList.add('opacity-50');
                } else {
                    const indicator = document.getElementById('offline-indicator');
                    if (indicator) {
                        indicator.remove();
                    }

                    if (!loginBtn.disabled) {
                        loginBtn.classList.remove('opacity-50');
                    }
                }
            }

            window.addEventListener('online', updateNetworkStatus);
            window.addEventListener('offline', updateNetworkStatus);
            updateNetworkStatus();
        }

        // Performance monitoring
        function setupPerformanceMonitoring() {
            // Measure page load performance
            window.addEventListener('load', function() {
                const loadTime = performance.now();
                console.log(`Page loaded in ${loadTime.toFixed(2)}ms`);

                // Show performance indicator for slow loads
                if (loadTime > 3000) {
                    console.warn('Slow page load detected');
                }
            });
        }

        // Initialize all functionality
        document.addEventListener('DOMContentLoaded', function() {
            setupFloatingLabels();
            setupLoginTypeDetection();
            setupPasswordStrength();
            setupCustomCheckbox();
            setupFormSubmission();
            setupAutoHideAlerts();
            setupPWA();
            setupInputEffects();
            setupQuickAccess();
            setupKeyboardShortcuts();
            setupNetworkStatus();
            setupPerformanceMonitoring();

            console.log('🚀 Modern Login System Initialized');
        });

        // Prevent form resubmission on page reload
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>
