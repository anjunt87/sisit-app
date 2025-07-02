<!-- Enhanced Navbar -->
<nav class="main-header navbar navbar-expand navbar-light islamic-pattern">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" title="Toggle Sidebar">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                <i class="fas fa-home mr-1"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item d-none d-md-inline-block">
            <a href="#" class="nav-link">
                <i class="fas fa-users mr-1"></i>
                Santri
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Prayer Time Enhanced -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" title="Jadwal Sholat">
                <i class="fas fa-mosque text-success mr-1"></i>
                <span id="current-prayer" class="d-none d-md-inline">Memuat...</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3" style="min-width: 280px;">
                <h6 class="dropdown-header">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Jadwal Sholat Hari Ini
                </h6>
                <div id="prayer-times" class="prayer-schedule">
                    <div class="text-center text-muted py-3">Sedang memuat...</div>
                </div>
            </div>
        </li>


        <!-- Enhanced Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" title="Notifikasi">
                <i class="far fa-bell"></i>
                <span
                    class="badge badge-warning navbar-badge animate__animated animate__pulse animate__infinite">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">
                    <i class="fas fa-bell mr-2"></i>
                    3 Notifikasi Baru
                </span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-object bg-success rounded-circle p-2 mr-3">
                            <i class="fas fa-user-graduate text-white"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-1">Siswa Baru</h6>
                            <p class="mb-1 text-muted small">5 siswa baru mendaftar hari ini</p>
                            <small class="text-muted">2 jam lalu</small>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-object bg-info rounded-circle p-2 mr-3">
                            <i class="fas fa-quran text-white"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-1">Hafalan Quran</h6>
                            <p class="mb-1 text-muted small">Juz 1 perlu diverifikasi</p>
                            <small class="text-muted">1 hari lalu</small>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item text-center">
                    <strong>Lihat Semua Notifikasi</strong>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="toggle-theme" role="button" title="Toggle Light/Dark Mode">
                <i class="fas fa-adjust"></i> <!-- Icon lampu -->
            </a>
        </li>
        <!-- Enhanced User Profile -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" role="button" title="Toggle Light/Dark Mode">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="User Avatar"
                        class="img-circle mr-2" style="width: 20px; height: 20px;" alt="User Avatar">
                    <div class="d-none d-md-flex flex-column justify-content-center lh-1">
                        <span class="text-truncate" style="max-width: 120px;">
                            {{ \Illuminate\Support\Str::limit(Auth::user()?->profil?->nama_lengkap ?? '', 10) }}
                        </span>
                    </div>
                    <i class="fas fa-caret-down ml-2 d-none d-md-inline"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="User Avatar" class="img-circle"
                        style="width: 50px; height: 50px;">
                    <h6 class="mt-2 mb-0">{{ Auth::user()?->profil?->nama_lengkap ?? '' }}</h6>
                    <small class="text-muted">{{ Auth::user()?->role?->name ?? '' }}</small>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profil Saya
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Pengaturan
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-question-circle mr-2"></i> Bantuan
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                    @csrf
                    <button type="submit" id="logout-button"
                        class="btn btn-link dropdown-item text-left w-100 text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (!navigator.geolocation) {
            console.warn("Geolocation tidak didukung");
            getPrayerTimesByKotaId('1210'); // fallback: Karawang
            return;
        }

        navigator.geolocation.getCurrentPosition(success, fallback, {
            timeout: 8000
        });

        function success(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            getCityAndPrayerTimes(lat, lng);
        }

        function fallback() {
            console.warn("Tidak bisa mendapatkan lokasi, fallback Karawang");
            getPrayerTimesByKotaId('1210');
        }

        async function getCityAndPrayerTimes(lat, lng) {
            try {
                const res = await fetch(
                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`);
                const data = await res.json();
                const city = data.address.city || data.address.town || data.address.county || data.address
                    .state;
                console.log("Kota terdeteksi:", city);
                getKotaIdFromMyQuran(city);
            } catch (err) {
                console.error("Gagal reverse geocoding:", err);
                fallback();
            }
        }

        async function getKotaIdFromMyQuran(cityName) {
            try {
                const res = await fetch('https://api.myquran.com/v2/sholat/kota/semua');
                const data = await res.json();

                const match = data.find(kota =>
                    kota.lokasi.toLowerCase().includes(cityName.toLowerCase())
                );

                if (match) {
                    console.log("Kota cocok:", match.lokasi, match.id);
                    getPrayerTimesByKotaId(match.id);
                } else {
                    console.warn("Kota tidak cocok, fallback Karawang");
                    getPrayerTimesByKotaId('1210');
                }
            } catch (err) {
                console.error("Gagal ambil daftar kota:", err);
                fallback();
            }
        }

        async function getPrayerTimesByKotaId(kotaId) {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const now = today.toTimeString().substring(0, 5);

            const url = `https://api.myquran.com/v2/sholat/jadwal/${kotaId}/${yyyy}/${mm}/${dd}`;
            const container = document.getElementById('prayer-times');
            const display = document.getElementById('current-prayer');

            try {
                const res = await fetch(url);
                const data = await res.json();
                const jadwal = data.data.jadwal;

                const list = [{
                        name: 'Subuh',
                        time: jadwal.subuh,
                        icon: 'fa-sun',
                        color: 'warning'
                    },
                    {
                        name: 'Dzuhur',
                        time: jadwal.dzuhur,
                        icon: 'fa-cloud-sun',
                        color: 'info'
                    },
                    {
                        name: 'Ashar',
                        time: jadwal.ashar,
                        icon: 'fa-sun',
                        color: 'orange'
                    },
                    {
                        name: 'Maghrib',
                        time: jadwal.maghrib,
                        icon: 'fa-moon',
                        color: 'primary'
                    },
                    {
                        name: 'Isya',
                        time: jadwal.isya,
                        icon: 'fa-star',
                        color: 'dark'
                    }
                ];

                let currentPrayer = null;
                for (let i = 0; i < list.length; i++) {
                    const nowT = list[i].time;
                    const nextT = list[i + 1]?.time;
                    if (now >= nowT && (!nextT || now < nextT)) {
                        currentPrayer = list[i];
                        break;
                    }
                }

                display.textContent = currentPrayer ?
                    `${currentPrayer.name} ${currentPrayer.time}` :
                    'Belum masuk waktu';

                // Render dropdown
                container.innerHTML = '';
                list.forEach(prayer => {
                    const isNow = currentPrayer && prayer.name === currentPrayer.name;
                    container.innerHTML += `
                        <div class="d-flex justify-content-between py-2 border-bottom ${isNow ? 'bg-light' : ''}">
                            <span><i class="fas ${prayer.icon} text-${prayer.color} mr-2"></i>${prayer.name}</span>
                            <strong class="${isNow ? 'text-success' : ''}">${prayer.time}</strong>
                        </div>
                    `;
                });

            } catch (err) {
                console.error("Gagal ambil jadwal:", err);
                container.innerHTML = `<div class="text-danger py-2">Gagal memuat jadwal sholat</div>`;
                display.textContent = 'Gagal';
            }
        }
    });
</script>
<!-- Enhanced & Responsive Sidebar -->
