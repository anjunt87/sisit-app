<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Sistem Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-soft': 'pulse-soft 2s ease-in-out infinite',
                        'slide-up': 'slide-up 0.5s ease-out',
                        'shake': 'shake 0.5s ease-in-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            }
                        },
                        'pulse-soft': {
                            '0%, 100%': {
                                opacity: '1'
                            },
                            '50%': {
                                opacity: '0.8'
                            }
                        },
                        'slide-up': {
                            '0%': {
                                transform: 'translateY(100px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        shake: {
                            '0%, 100%': {
                                transform: 'translateX(0)'
                            },
                            '25%': {
                                transform: 'translateX(-5px)'
                            },
                            '75%': {
                                transform: 'translateX(5px)'
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 flex items-center justify-center p-4">
    <!-- Background Decorations -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-float">
        </div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-float"
            style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float"
            style="animation-delay: 4s;"></div>
    </div>

    <!-- Login Container -->
    <div class="w-full max-w-md relative z-10">
        <!-- Logo/Header Section -->
        <div class="text-center mb-8 animate-slide-up">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full shadow-lg mb-4 animate-pulse-soft">
                <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Sistem Sekolah</h1>
            <p class="text-gray-600">Masuk ke akun Anda</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20 animate-slide-up"
            style="animation-delay: 0.2s;">
            <!-- Success Message -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700 text-sm">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg animate-shake">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-700 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Login Field (Email/Username) -->
                <div class="mb-6">
                    <label for="login" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-green-500"></i>Email atau Username
                    </label>
                    <div class="relative">
                        <input type="text" id="login" name="login" value="{{ old('login') }}"
                            class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 bg-white/50 backdrop-blur-sm @error('login') border-red-500 @enderror"
                            placeholder="Masukkan email atau username" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-green-500"></i>Password
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 bg-white/50 backdrop-blur-sm @error('password') border-red-500 @enderror"
                            placeholder="Masukkan password" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-green-500 transition-colors duration-200">
                            <i id="toggleIcon" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>
                    <a href="#"
                        class="text-sm text-green-600 hover:text-green-700 transition-colors duration-200">
                        Lupa password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit" id="loginBtn"
                    class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    <span id="loginText">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </span>
                    <span id="loadingText" class="hidden">
                        <i class="fas fa-spinner fa-spin mr-2"></i>Memproses...
                    </span>
                </button>
            </form>

            <!-- Role Info -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-xs text-gray-500 text-center mb-3">Akses berdasarkan role:</p>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="bg-blue-50 p-2 rounded text-center">
                        <i class="fas fa-user-shield text-blue-500 mb-1"></i>
                        <div class="text-blue-700 font-medium">Admin</div>
                    </div>
                    <div class="bg-purple-50 p-2 rounded text-center">
                        <i class="fas fa-chalkboard-teacher text-purple-500 mb-1"></i>
                        <div class="text-purple-700 font-medium">Guru</div>
                    </div>
                    <div class="bg-green-50 p-2 rounded text-center">
                        <i class="fas fa-user-graduate text-green-500 mb-1"></i>
                        <div class="text-green-700 font-medium">Murid</div>
                    </div>
                    <div class="bg-orange-50 p-2 rounded text-center">
                        <i class="fas fa-users text-orange-500 mb-1"></i>
                        <div class="text-orange-700 font-medium">Wali</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 animate-slide-up" style="animation-delay: 0.4s;">
            <p class="text-sm text-gray-500">
                © 2025 Sistem Sekolah. Semua hak dilindungi.
            </p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

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

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const loginBtn = document.getElementById('loginBtn');
            const loginText = document.getElementById('loginText');
            const loadingText = document.getElementById('loadingText');

            // Show loading state
            loginBtn.disabled = true;
            loginText.classList.add('hidden');
            loadingText.classList.remove('hidden');
            loginBtn.classList.add('opacity-75', 'cursor-not-allowed');
        });

        // Auto-hide success/error messages
        setTimeout(function() {
            const alerts = document.querySelectorAll('[class*="bg-green-50"], [class*="bg-red-50"]');
            alerts.forEach(function(alert) {
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            });
        }, 5000);

        // Input focus effects
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('transform', 'scale-105');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('transform', 'scale-105');
            });
        });

        // Add ripple effect to button
        document.getElementById('loginBtn').addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('absolute', 'bg-white', 'rounded-full', 'opacity-30', 'animate-ping');

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    </script>
</body>

</html>
