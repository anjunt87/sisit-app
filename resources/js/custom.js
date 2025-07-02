    // Custom JS DASHBOARD
    // Preloader Animation Controller
    class NIISPreloader {
        constructor() {
            this.preloader = document.getElementById('preloader');
            this.dashboard = document.getElementById('dashboard');
            this.logoContainer = document.getElementById('logoContainer');
            this.preloaderLogo = document.getElementById('preloaderLogo');
            this.brandLink = document.getElementById('brandLink');
            this.brandImage = document.getElementById('brandImage');
            this.dashboard = document.querySelector('.content-wrapper');

            if (this.preloader && this.logoContainer && this.dashboard) {
                this.init();
            } else {
                console.warn("NIISPreloader: Some required elements are missing.");
            }
        }

        init() {
            // Start preloader sequence
            this.startPreloader();
        }

        startPreloader() {
            // Simulate loading time
            setTimeout(() => {
                this.transitionToSidebar();
            }, 3000); // Show preloader for 3 seconds
        }

        transitionToSidebar() {
            // Step 1: Start logo transition animation
            if (this.logoContainer) {
                this.logoContainer.classList.add('logo-transitioning');
            }

            // Step 2: Fade out preloader background
            setTimeout(() => {
                if (this.preloader) {
                    this.preloader.classList.add('fade-out');
                }
            }, 800);

            // Step 3: Show dashboard
            setTimeout(() => {
                if (this.dashboard) {
                    this.dashboard.classList.add('show');
                }
            }, 1000);

            // Step 4: Show brand link with animation
            // setTimeout(() => {
            //     if (this.brandLink) {
            //         this.brandLink.classList.add('ready');
            //     }
            // }, 1200);

            // Step 5: Final cleanup
            setTimeout(() => {
                if (this.preloader) {
                    this.preloader.style.display = 'none';
                }
                if (this.logoContainer) {
                    this.logoContainer.style.animation = 'none';
                    this.logoContainer.classList.remove('logo-transitioning');
                }
            }, 2000);
        }

        // Method to restart preloader (for demo purposes)
        restart() {
            // Reset all states
            this.preloader.style.display = 'flex';
            this.preloader.classList.remove('fade-out');
            this.dashboard.classList.remove('show');
            this.brandLink.classList.remove('ready');
            this.logoContainer.classList.remove('logo-transitioning');
            this.logoContainer.style.animation = '';

            // Restart sequence
            setTimeout(() => this.init(), 100);
        }
    }

    // Initialize preloader when page loads
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = new NIISPreloader();

        // Add refresh button for demo (optional)
        const refreshBtn = document.createElement('button');
        refreshBtn.innerHTML = '<i class="fas fa-redo me-2"></i>Refresh Preloader';
        refreshBtn.className = 'btn btn-outline-primary btn-sm position-fixed';
        refreshBtn.style.top = '20px';
        refreshBtn.style.right = '20px';
        refreshBtn.style.zIndex = '1001';
        refreshBtn.onclick = () => preloader.restart();

        // Add button after dashboard is shown
        setTimeout(() => {
            if (document.querySelector('.dashboard-container.show')) {
                document.body.appendChild(refreshBtn);
            }
        }, 2500);
    });

    // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effect to nav items
        const navItems = document.querySelectorAll('.nav-link');
        navItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
                this.style.transition = 'all 0.3s ease';
            });

            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    });

    document.getElementById('logout-button').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Yakin ingin keluar?',
            text: "Sesi Anda akan diakhiri.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6', // Tombol logout (kanan)
            cancelButtonColor: '#d33', // Tombol batal (kiri)
            confirmButtonText: 'Ya, logout',
            cancelButtonText: 'Batal',
            reverseButtons: true // Penting! Agar UX tombol lebih baik
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });

     const toggleThemeBtn = document.getElementById('toggle-theme');
    const body = document.body;

    toggleThemeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        body.classList.toggle('auto-dark');
        // Optional: Simpan preferensi ke localStorage
        if (body.classList.contains('auto-dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });

    // Optional: load preferensi dari localStorage saat page load
    window.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('auto-dark');
        }
    });