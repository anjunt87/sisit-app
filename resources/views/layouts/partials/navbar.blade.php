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
                <span id="current-prayer" class="d-none d-md-inline">Maghrib 18:05</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3" style="min-width: 280px;">
                <h6 class="dropdown-header">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Jadwal Sholat Hari Ini
                </h6>
                <div class="prayer-schedule">
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span><i class="fas fa-sun text-warning mr-2"></i>Subuh</span>
                        <strong>05:15</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span><i class="fas fa-cloud-sun text-info mr-2"></i>Dzuhur</span>
                        <strong>12:10</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span><i class="fas fa-sun text-orange mr-2"></i>Ashar</span>
                        <strong>15:25</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom bg-light">
                        <span><i class="fas fa-moon text-primary mr-2"></i>Maghrib</span>
                        <strong class="text-success">18:05</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fas fa-star text-dark mr-2"></i>Isya</span>
                        <strong>19:30</strong>
                    </div>
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
            <a class="nav-link" data-toggle="dropdown" href="#" title="Profile">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="User Avatar"
                        class="img-size-32 img-circle mr-2">
                    <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <i class="fas fa-caret-down ml-2 d-none d-md-inline"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="User Avatar"
                        class="img-circle" style="width: 50px; height: 50px;">
                    {{-- <h6 class="mt-2 mb-0">{{ Auth::user()->name ?? 'Administrator' }}</h6> --}}
                    {{-- <small class="text-muted">{{ Auth::user()->role ?? 'Super Admin' }}</small> --}}
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
<!-- Enhanced & Responsive Sidebar -->
