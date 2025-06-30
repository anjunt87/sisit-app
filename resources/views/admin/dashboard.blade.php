@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Pengumuman dan Kegiatan -->
            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="card islamic-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bullhorn text-warning mr-2"></i>
                                Pengumuman Terbaru
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="time-label">
                                    <span class="bg-success">Hari Ini</span>
                                </div>
                                <div>
                                    <i class="fas fa-calendar bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 2 jam yang lalu</span>
                                        <h3 class="timeline-header"><a href="#">Kegiatan Tahfidz</a> Evaluasi Bulanan
                                        </h3>
                                        <div class="timeline-body">
                                            Evaluasi hafalan Al-Quran untuk semua santri akan dilaksanakan pada tanggal 5-7
                                            bulan
                                            ini.
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-mosque bg-green"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 5 jam yang lalu</span>
                                        <h3 class="timeline-header"><a href="#">Kajian Mingguan</a> Ustadz Ahmad</h3>
                                        <div class="timeline-body">
                                            Kajian rutin setiap Jumat ba'da Dzuhur tentang Adab Menuntut Ilmu.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Kalender Kegiatan -->
                    <div class="card islamic-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar text-primary mr-2"></i>
                                Agenda Minggu Ini
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-dot-circle text-success mr-2"></i>Senin - Tahfidz Pagi</span>
                                        <small class="text-muted">06:30</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-dot-circle text-warning mr-2"></i>Rabu - Muroja'ah</span>
                                        <small class="text-muted">07:00</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-dot-circle text-info mr-2"></i>Jumat - Kajian</span>
                                        <small class="text-muted">13:30</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-dot-circle text-danger mr-2"></i>Sabtu - Evaluasi</span>
                                        <small class="text-muted">08:00</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Progress Hafalan -->
                    <div class="card islamic-card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line text-success mr-2"></i>
                                Progress Hafalan
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="progress-group">
                                <span class="float-right"><b>{{ $progressJuz1 ?? '85' }}</b>/100</span>
                                <span>Juz 1 (Al-Fatihah - Al-Baqarah)</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: {{ $progressJuz1 ?? '85' }}%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="float-right"><b>{{ $progressJuz30 ?? '92' }}</b>/100</span>
                                <span>Juz 30 ('Amma)</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: {{ $progressJuz30 ?? '92' }}%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="float-right"><b>{{ $progressJuz29 ?? '67' }}</b>/100</span>
                                <span>Juz 29 (Al-Mulk - Al-Mursalat)</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" style="width: {{ $progressJuz29 ?? '67' }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card islamic-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bolt text-warning mr-2"></i>
                                Aksi Cepat
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-sm-4 col-6">
                                    <a href="#" class="btn btn-app">
                                        <i class="fas fa-quran"></i>
                                        Tahfidz
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6">
                                    <a href="#" class="btn btn-app">
                                        <i class="fas fa-calendar-alt"></i>
                                        Jadwal
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6">
                                    <a href="#" class="btn btn-app">
                                        <i class="fas fa-user-graduate"></i>
                                        Santri
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6">
                                    <a href="#" class="btn btn-app">
                                        <i class="fas fa-chart-bar"></i>
                                        Nilai
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6">
                                    <a href="#" class="btn btn-app">
                                        <i class="fas fa-money-bill-wave"></i>
                                        Keuangan
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6">
                                    <a href="#" class="btn btn-app">
                                        <i class="fas fa-file-alt"></i>
                                        Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card islamic-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-history text-info mr-2"></i>
                                Aktivitas Terbaru
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Aktivitas</th>
                                            <th>Pengguna</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><small>{{ now()->subMinutes(15)->format('H:i') }}</small></td>
                                            <td>
                                                <i class="fas fa-plus-circle text-success mr-1"></i>
                                                Input hafalan Juz 30 - Ahmad Faizal
                                            </td>
                                            <td>Ustadz Rahman</td>
                                            <td><span class="badge badge-success">Selesai</span></td>
                                        </tr>
                                        <tr>
                                            <td><small>{{ now()->subMinutes(32)->format('H:i') }}</small></td>
                                            <td>
                                                <i class="fas fa-edit text-warning mr-1"></i>
                                                Update nilai ujian Fiqh kelas 6
                                            </td>
                                            <td>Ustadzah Siti</td>
                                            <td><span class="badge badge-warning">Proses</span></td>
                                        </tr>
                                        <tr>
                                            <td><small>{{ now()->subHour()->format('H:i') }}</small></td>
                                            <td>
                                                <i class="fas fa-user-plus text-info mr-1"></i>
                                                Pendaftaran santri baru - Fatimah Az-Zahra
                                            </td>
                                            <td>Admin</td>
                                            <td><span class="badge badge-info">Baru</span></td>
                                        </tr>
                                        <tr>
                                            <td><small>{{ now()->subHours(2)->format('H:i') }}</small></td>
                                            <td>
                                                <i class="fas fa-money-bill-wave text-primary mr-1"></i>
                                                Pembayaran SPP bulan {{ date('F') }}
                                            </td>
                                            <td>Bendahara</td>
                                            <td><span class="badge badge-primary">Lunas</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Auto refresh prayer times every hour
            setInterval(function() {
                // Prayer times could be fetched from API here
                console.log('Prayer times refreshed');
            }, 3600000);

            // Highlight current prayer time
            var currentHour = new Date().getHours();
            var currentMinute = new Date().getMinutes();
            var currentTime = currentHour * 60 + currentMinute;

            // Prayer times in minutes from midnight
            var prayerTimes = {
                'subuh': 5 * 60 + 15,
                'dzuhur': 12 * 60 + 10,
                'ashar': 15 * 60 + 25,
                'maghrib': 18 * 60 + 5,
                'isya': 19 * 60 + 30
            };

            // Find next prayer
            var nextPrayer = null;
            var minDiff = Infinity;

            for (var prayer in prayerTimes) {
                var diff = prayerTimes[prayer] - currentTime;
                if (diff > 0 && diff < minDiff) {
                    minDiff = diff;
                    nextPrayer = prayer;
                }
            }

            if (nextPrayer) {
                $('.prayer-time-item').each(function() {
                    var prayerName = $(this).find('h6').text().toLowerCase();
                    if (prayerName === nextPrayer) {
                        $(this).addClass('next-prayer');
                        $(this).css('background-color', '#e8f5e8');
                    }
                });
            }
        });
    </script>
@endpush
