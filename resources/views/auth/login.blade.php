<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Sistem Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1)',
                        'slide-down': 'slideDown 0.4s cubic-bezier(0.16, 1, 0.3, 1)',
                        'scale-in': 'scaleIn 0.5s cubic-bezier(0.16, 1, 0.3, 1)',
                        'float': 'float 8s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'shake': 'shake 0.6s cubic-bezier(0.36, 0.07, 0.19, 0.97)',
                        'pulse-gentle': 'pulseGentle 3s ease-in-out infinite',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(60px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        slideDown: {
                            '0%': {
                                transform: 'translateY(-20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        scaleIn: {
                            '0%': {
                                transform: 'scale(0.9)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px) rotate(0deg)'
                            },
                            '33%': {
                                transform: 'translateY(-30px) rotate(2deg)'
                            },
                            '66%': {
                                transform: 'translateY(-10px) rotate(-1deg)'
                            }
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 20px rgba(34, 197, 94, 0.4)'
                            },
                            '100%': {
                                boxShadow: '0 0 30px rgba(34, 197, 94, 0.6)'
                            }
                        },
                        shake: {
                            '0%, 100%': {
                                transform: 'translateX(0)'
                            },
                            '10%, 30%, 50%, 70%, 90%': {
                                transform: 'translateX(-4px)'
                            },
                            '20%, 40%, 60%, 80%': {
                                transform: 'translateX(4px)'
                            }
                        },
                        pulseGentle: {
                            '0%, 100%': {
                                opacity: '0.6'
                            },
                            '50%': {
                                opacity: '0.3'
                            }
                        },
                        bounceGentle: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        }
                    },
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            900: '#14532d'
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px rgba(0, 0, 0, 0.08)',
                        'medium': '0 8px 30px rgba(0, 0, 0, 0.12)',
                        'strong': '0 20px 40px rgba(0, 0, 0, 0.15)',
                        'glow': '0 0 20px rgba(34, 197, 94, 0.3)',
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-stone-50 font-sans antialiased">
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Primary floating elements -->
        <div
            class="absolute -top-32 -right-32 w-64 h-64 bg-gradient-to-r from-primary-200 to-emerald-200 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-float">
        </div>
        <div class="absolute -bottom-32 -left-32 w-64 h-64 bg-gradient-to-r from-green-200 to-primary-200 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-float"
            style="animation-delay: 3s;"></div>
        <div class="absolute top-1/3 left-1/4 w-48 h-48 bg-gradient-to-r from-emerald-200 to-teal-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-float"
            style="animation-delay: 1.5s;"></div>

        <!-- Subtle grid pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Header Section -->
            <header class="text-center mb-8 animate-slide-down">
                <!-- Logo with enhanced styling -->
                <div class="relative inline-block mb-6">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-primary-500 via-primary-600 to-emerald-600 rounded-2xl shadow-strong flex items-center justify-center animate-glow">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-1 -right-1 w-6 h-6 bg-emerald-400 rounded-full animate-bounce-gentle">
                    </div>
                </div>

                <!-- Title and subtitle -->
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2 tracking-tight">
                    Sistem Sekolah
                </h1>
                <p class="text-gray-600 font-medium">Akses portal pembelajaran digital</p>
                <div class="w-16 h-1 bg-gradient-to-r from-primary-500 to-emerald-500 rounded-full mx-auto mt-4"></div>
            </header>

            <!-- Login Card -->
            <main class="animate-slide-up" style="animation-delay: 0.2s;">
                <div
                    class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-strong p-8 border border-white/30 relative overflow-hidden">
                    <!-- Card decoration -->
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary-500 via-emerald-500 to-teal-500">
                    </div>

                    <!-- Status Messages -->
                    <div id="messageContainer" class="mb-6"></div>

                    <!-- Login Form -->
                    <form id="loginForm" class="space-y-6">
                        <!-- CSRF Token (simulated for demo) -->
                        <input type="hidden" name="_token" value="demo-token">

                        <!-- Login Field -->
                        <div class="form-group">
                            <label for="login" class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fas fa-user-circle mr-2 text-primary-600"></i>
                                Email atau Username
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <i
                                        class="fas fa-envelope text-gray-400 group-focus-within:text-primary-500 transition-colors duration-200"></i>
                                </div>
                                <input type="text" id="login" name="login"
                                    class="input-field w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-300 bg-white/80 backdrop-blur-sm placeholder-gray-400 font-medium"
                                    placeholder="Masukkan email atau username Anda" required autocomplete="username">
                                <div
                                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-primary-500/5 to-emerald-500/5 opacity-0 group-focus-within:opacity-100 transition-opacity duration-300 pointer-events-none">
                                </div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fas fa-shield-alt mr-2 text-primary-600"></i>
                                Password
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <i
                                        class="fas fa-key text-gray-400 group-focus-within:text-primary-500 transition-colors duration-200"></i>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="input-field w-full pl-12 pr-14 py-4 border-2 border-gray-200 rounded-xl focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-300 bg-white/80 backdrop-blur-sm placeholder-gray-400 font-medium"
                                    placeholder="Masukkan password Anda" required autocomplete="current-password">
                                <button type="button" onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-primary-600 focus:text-primary-600 transition-colors duration-200 z-10"
                                    tabindex="-1">
                                    <i id="toggleIcon" class="fas fa-eye"></i>
                                </button>
                                <div
                                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-primary-500/5 to-emerald-500/5 opacity-0 group-focus-within:opacity-100 transition-opacity duration-300 pointer-events-none">
                                </div>
                            </div>
                        </div>

                        <!-- Options Row -->
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center group cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" name="remember" class="sr-only peer">
                                    <div
                                        class="w-5 h-5 bg-white border-2 border-gray-300 rounded-md peer-checked:bg-primary-500 peer-checked:border-primary-500 transition-all duration-200">
                                    </div>
                                    <i
                                        class="fas fa-check absolute inset-0 w-5 h-5 text-white text-xs flex items-center justify-center opacity-0 peer-checked:opacity-100 transition-opacity duration-200"></i>
                                </div>
                                <span
                                    class="ml-3 text-sm text-gray-600 font-medium group-hover:text-gray-800 transition-colors duration-200">
                                    Ingat saya
                                </span>
                            </label>
                            <a href="#"
                                class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors duration-200 relative group"
                                onclick="showForgotPassword()">
                                Lupa password?
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 group-hover:w-full transition-all duration-300"></span>
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" id="loginBtn"
                            class="w-full bg-gradient-to-r from-primary-500 via-primary-600 to-emerald-600 hover:from-primary-600 hover:via-primary-700 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] focus:outline-none focus:ring-4 focus:ring-primary-200 shadow-medium hover:shadow-strong relative overflow-hidden group">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></span>
                            <span id="loginText" class="relative flex items-center justify-center">
                                <i class="fas fa-sign-in-alt mr-3"></i>
                                Masuk ke Sistem
                            </span>
                            <span id="loadingText" class="relative hidden items-center justify-center">
                                <div
                                    class="animate-spin rounded-full h-5 w-5 border-2 border-white/30 border-t-white mr-3">
                                </div>
                                Sedang memproses...
                            </span>
                        </button>
                    </form>

                    <!-- Additional Options -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="text-center">
                            <p class="text-sm text-gray-500 mb-4">Atau masuk dengan</p>
                            <div class="flex justify-center space-x-4">
                                <button
                                    class="w-12 h-12 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-200">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button
                                    class="w-12 h-12 bg-gray-700 hover:bg-gray-800 text-white rounded-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-200">
                                    <i class="fab fa-microsoft"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="text-center mt-8 animate-fade-in" style="animation-delay: 0.6s;">
                <div class="space-y-3">
                    <div class="flex justify-center space-x-6 text-sm text-gray-500">
                        <a href="#" class="hover:text-primary-600 transition-colors duration-200">Bantuan</a>
                        <a href="#" class="hover:text-primary-600 transition-colors duration-200">Kebijakan
                            Privasi</a>
                        <a href="#" class="hover:text-primary-600 transition-colors duration-200">Syarat &
                            Ketentuan</a>
                    </div>
                    <p class="text-sm text-gray-400">
                        © 2025 Sistem Sekolah. Dikembangkan dengan
                        <i class="fas fa-heart text-red-400 mx-1"></i>
                        untuk pendidikan Indonesia
                    </p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Enhanced form validation and UX
        class LoginForm {
            constructor() {
                this.form = document.getElementById('loginForm');
                this.loginBtn = document.getElementById('loginBtn');
                this.loginText = document.getElementById('loginText');
                this.loadingText = document.getElementById('loadingText');
                this.messageContainer = document.getElementById('messageContainer');

                this.init();
            }

            init() {
                this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                this.addInputListeners();
                this.addKeyboardNavigation();
            }

            addInputListeners() {
                const inputs = this.form.querySelectorAll('input[type="text"], input[type="password"]');

                inputs.forEach(input => {
                    // Enhanced focus effects
                    input.addEventListener('focus', () => {
                        input.parentElement.classList.add('transform', 'scale-[1.01]');
                        this.clearErrors();
                    });

                    input.addEventListener('blur', () => {
                        input.parentElement.classList.remove('transform', 'scale-[1.01]');
                        this.validateField(input);
                    });

                    // Real-time validation
                    input.addEventListener('input', () => {
                        this.validateField(input, false);
                    });
                });
            }

            addKeyboardNavigation() {
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && e.target.tagName !== 'BUTTON') {
                        e.preventDefault();
                        this.form.requestSubmit();
                    }
                });
            }

            validateField(field, showError = true) {
                const value = field.value.trim();
                let isValid = true;
                let message = '';

                if (field.name === 'login') {
                    if (!value) {
                        isValid = false;
                        message = 'Email atau username harus diisi';
                    } else if (value.includes('@') && !this.isValidEmail(value)) {
                        isValid = false;
                        message = 'Format email tidak valid';
                    }
                } else if (field.name === 'password') {
                    if (!value) {
                        isValid = false;
                        message = 'Password harus diisi';
                    } else if (value.length < 6) {
                        isValid = false;
                        message = 'Password minimal 6 karakter';
                    }
                }

                this.updateFieldState(field, isValid, showError ? message : '');
                return isValid;
            }

            updateFieldState(field, isValid, message) {
                const container = field.closest('.form-group');

                if (isValid) {
                    field.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-100');
                    field.classList.add('border-gray-200', 'focus:border-primary-500', 'focus:ring-primary-100');
                    this.removeFieldError(container);
                } else if (message) {
                    field.classList.remove('border-gray-200', 'focus:border-primary-500', 'focus:ring-primary-100');
                    field.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-100');
                    this.showFieldError(container, message);
                }
            }

            showFieldError(container, message) {
                this.removeFieldError(container);
                const errorDiv = document.createElement('div');
                errorDiv.className = 'field-error mt-2 text-sm text-red-600 flex items-center animate-slide-down';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-circle mr-2"></i>${message}`;
                container.appendChild(errorDiv);
            }

            removeFieldError(container) {
                const existingError = container.querySelector('.field-error');
                if (existingError) {
                    existingError.remove();
                }
            }

            isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            async handleSubmit(e) {
                e.preventDefault();

                // Validate all fields
                const inputs = this.form.querySelectorAll('input[required]');
                let isFormValid = true;

                inputs.forEach(input => {
                    if (!this.validateField(input)) {
                        isFormValid = false;
                    }
                });

                if (!isFormValid) {
                    this.showMessage('Mohon perbaiki data yang tidak valid', 'error');
                    this.shakeForm();
                    return;
                }

                this.setLoadingState(true);

                try {
                    // Get form data
                    const formData = new FormData(this.form);
                    const loginData = {
                        login: formData.get('login'),
                        password: formData.get('password')
                    };

                    // Call real login function
                    const result = await this.login(loginData);

                    if (result.success) {
                        this.showMessage('Login berhasil! Mengalihkan...', 'success');

                        // Redirect after showing success message
                        setTimeout(() => {
                            if (result.redirect) {
                                window.location.href = result.redirect;
                            } else {
                                window.location.href = '/dashboard';
                            }
                        }, 1500);
                    } else {
                        throw new Error(result.message || 'Login gagal');
                    }

                } catch (error) {
                    this.showMessage(error.message, 'error');
                    this.setLoadingState(false);
                    this.shakeForm();
                }
            }

            // Real Laravel login function
            async login(loginData) {
                try {
                    // Get CSRF token (required for Laravel)
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    if (!csrfToken) {
                        throw new Error('CSRF token tidak ditemukan. Silakan refresh halaman.');
                    }

                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({
                            login: loginData.login,
                            password: loginData.password
                        })
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        // Login berhasil
                        return {
                            success: true,
                            user: data.user,
                            redirect: data.redirect_url
                        };
                    } else {
                        // Login gagal - handle different error responses
                        let errorMessage = 'Login gagal';

                        if (data.message) {
                            errorMessage = data.message;
                        } else if (data.errors && data.errors.login) {
                            errorMessage = Array.isArray(data.errors.login) ?
                                data.errors.login[0] :
                                data.errors.login;
                        }

                        throw new Error(errorMessage);
                    }
                } catch (error) {
                    // Network or other errors
                    if (error.name === 'TypeError' && error.message.includes('fetch')) {
                        throw new Error('Koneksi gagal. Periksa koneksi internet Anda.');
                    }

                    console.error('Login error:', error);
                    throw error;
                }
            }

            // Alternative method using FormData (closer to traditional form submission)
            async loginWithFormData(loginData) {
                try {
                    const formData = new FormData();
                    formData.append('login', loginData.login);
                    formData.append('password', loginData.password);

                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    if (csrfToken) {
                        formData.append('_token', csrfToken);
                    } else {
                        throw new Error('CSRF token tidak ditemukan. Silakan refresh halaman.');
                    }

                    const response = await fetch('/login', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        credentials: 'same-origin',
                        body: formData
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        return {
                            success: true,
                            user: data.user,
                            redirect: data.redirect_url
                        };
                    } else {
                        let errorMessage = 'Login gagal';

                        if (data.message) {
                            errorMessage = data.message;
                        } else if (data.errors && data.errors.login) {
                            errorMessage = Array.isArray(data.errors.login) ?
                                data.errors.login[0] :
                                data.errors.login;
                        }

                        throw new Error(errorMessage);
                    }
                } catch (error) {
                    if (error.name === 'TypeError' && error.message.includes('fetch')) {
                        throw new Error('Koneksi gagal. Periksa koneksi internet Anda.');
                    }

                    console.error('Login error:', error);
                    throw error;
                }
            }

            setLoadingState(isLoading) {
                if (isLoading) {
                    this.loginBtn.disabled = true;
                    this.loginBtn.classList.add('opacity-80', 'cursor-not-allowed');
                    this.loginText.classList.add('hidden');
                    this.loadingText.classList.remove('hidden');
                } else {
                    this.loginBtn.disabled = false;
                    this.loginBtn.classList.remove('opacity-80', 'cursor-not-allowed');
                    this.loginText.classList.remove('hidden');
                    this.loadingText.classList.add('hidden');
                }
            }

            showMessage(message, type) {
                const alertClass = type === 'success' ?
                    'bg-green-50 border-green-200 text-green-800' :
                    'bg-red-50 border-red-200 text-red-800';

                const iconClass = type === 'success' ?
                    'fas fa-check-circle text-green-500' :
                    'fas fa-exclamation-triangle text-red-500';

                this.messageContainer.innerHTML = `
            <div class="p-4 border rounded-xl ${alertClass} animate-slide-down">
                <div class="flex items-center">
                    <i class="${iconClass} mr-3"></i>
                    <p class="font-medium">${message}</p>
                </div>
            </div>
        `;

                // Auto-hide after 5 seconds
                setTimeout(() => {
                    const alert = this.messageContainer.querySelector('div');
                    if (alert) {
                        alert.style.transition = 'opacity 0.5s ease-out, transform 0.5s ease-out';
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateY(-20px)';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
            }

            clearErrors() {
                const errors = this.form.querySelectorAll('.field-error');
                errors.forEach(error => error.remove());

                // Clear message container
                this.messageContainer.innerHTML = '';
            }

            shakeForm() {
                const card = this.form.closest('main > div');
                card.classList.add('animate-shake');
                setTimeout(() => card.classList.remove('animate-shake'), 600);
            }
        }

        // Password toggle functionality
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Forgot password handler
        function showForgotPassword() {
            alert('Fitur lupa password akan segera hadir!\n\nSilakan hubungi administrator untuk reset password.');
        }

        // Initialize the login form
        document.addEventListener('DOMContentLoaded', () => {
            new LoginForm();
        });

        // Add ripple effect to interactive elements
        document.addEventListener('click', (e) => {
            if (e.target.matches('button, .btn')) {
                createRipple(e);
            }
        });

        function createRipple(e) {
            const button = e.currentTarget;
            const circle = document.createElement('span');
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;

            const rect = button.getBoundingClientRect();
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${e.clientX - rect.left - radius}px`;
            circle.style.top = `${e.clientY - rect.top - radius}px`;
            circle.classList.add('ripple');

            const rippleStyle = document.createElement('style');
            rippleStyle.textContent = `
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;

            if (!document.querySelector('style[data-ripple]')) {
                rippleStyle.setAttribute('data-ripple', '');
                document.head.appendChild(rippleStyle);
            }

            const existingRipple = button.querySelector('.ripple');
            if (existingRipple) {
                existingRipple.remove();
            }

            button.appendChild(circle);

            setTimeout(() => circle.remove(), 600);
        }
    </script>
</body>

</html>
