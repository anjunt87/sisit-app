-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jun 2025 pada 04.05
-- Versi server: 8.0.30
-- Versi PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisit_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_guru`
--

CREATE TABLE `absensi_guru` (
  `id` bigint NOT NULL,
  `guru_id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `durasi_kerja` int DEFAULT NULL,
  `status` enum('hadir','sakit','izin','alpha','terlambat','pulang_cepat') DEFAULT 'hadir',
  `keterangan` text,
  `latitude_masuk` decimal(10,8) DEFAULT NULL,
  `longitude_masuk` decimal(11,8) DEFAULT NULL,
  `latitude_pulang` decimal(10,8) DEFAULT NULL,
  `longitude_pulang` decimal(11,8) DEFAULT NULL,
  `foto_masuk` varchar(255) DEFAULT NULL,
  `foto_pulang` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `kelas_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_absensi_id` bigint NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan` text,
  `dicatat_oleh` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_siswa_archive`
--

CREATE TABLE `absensi_siswa_archive` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `kelas_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_absensi_id` bigint NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan` text,
  `dicatat_oleh` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Arsip absensi siswa tahunan. Data dipindahkan dari absensi_siswa jika lebih dari 2 tahun.';

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` bigint NOT NULL,
  `jalan` text,
  `rt_rw` varchar(10) DEFAULT NULL,
  `desa_kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `tahun_lulus` year NOT NULL,
  `melanjutkan_ke` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `pekerjaan_sekarang` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL,
  `tipe` enum('string','int','float','boolean','json','text') DEFAULT 'string',
  `keterangan` text,
  `is_editable` tinyint(1) DEFAULT '1',
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_kelamin_id` bigint NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_id` bigint DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'avatar_default.jpg',
  `status_kepegawaian` enum('pns','honorer','kontrak','tetap_yayasan') DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id` bigint NOT NULL,
  `kelas_id` bigint NOT NULL,
  `mapel_id` bigint NOT NULL,
  `guru_id` bigint NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_ke` int NOT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `level` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kapasitas_maksimal` int DEFAULT '30',
  `wali_kelas_id` bigint DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kenaikan_jilid_antrian`
--

CREATE TABLE `kenaikan_jilid_antrian` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `jenis` enum('tahfidz','tahsin') NOT NULL,
  `level_saat_ini` int NOT NULL,
  `level_dituju` int NOT NULL,
  `diajukan_oleh` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `status` enum('menunggu','sedang_ujian','lulus','tidak_lulus','dibatalkan') DEFAULT 'menunggu',
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_ujian` date DEFAULT NULL,
  `penguji_id` bigint DEFAULT NULL,
  `nilai_akhir` float DEFAULT NULL,
  `catatan_ujian` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_sinkronisasi`
--

CREATE TABLE `log_sinkronisasi` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `modul` varchar(100) NOT NULL,
  `aksi` enum('sinkronisasi_masuk','sinkronisasi_keluar') NOT NULL,
  `status` enum('berhasil','gagal') DEFAULT 'berhasil',
  `pesan` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `device_id` varchar(100) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `synced_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `ref_mata_pelajaran_id` bigint NOT NULL,
  `kkm` decimal(5,2) DEFAULT '75.00',
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint NOT NULL,
  `label` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `parent_id` bigint DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_role`
--

CREATE TABLE `menu_role` (
  `menu_id` bigint NOT NULL,
  `role_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_26_132007_create_personal_access_tokens_table', 2),
(5, '2025_06_26_132058_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas_id` bigint NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin_id` bigint NOT NULL,
  `alamat_id` bigint DEFAULT NULL,
  `agama` varchar(20) DEFAULT 'Islam',
  `anak_ke` int DEFAULT NULL,
  `jumlah_saudara` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'avatar_default.jpg',
  `tanggal_masuk` date DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ekskul_siswa`
--

CREATE TABLE `nilai_ekskul_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `ekskul_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `nilai` enum('A','B','C','D') DEFAULT 'B',
  `kehadiran_persen` decimal(5,2) DEFAULT NULL COMMENT '0-100',
  `partisipasi_aktif` enum('rendah','cukup','tinggi') DEFAULT 'cukup',
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mapel_siswa`
--

CREATE TABLE `nilai_mapel_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `mapel_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `guru_id` bigint DEFAULT NULL,
  `nilai_uh1` float DEFAULT NULL COMMENT '0-100',
  `nilai_uh2` float DEFAULT NULL COMMENT '0-100',
  `nilai_uts` float DEFAULT NULL COMMENT '0-100',
  `nilai_uas` float DEFAULT NULL COMMENT '0-100',
  `nilai_akhir` float DEFAULT NULL COMMENT '0-100',
  `nilai_pengetahuan` float DEFAULT NULL COMMENT '0-100',
  `nilai_keterampilan` float DEFAULT NULL COMMENT '0-100',
  `deskripsi_pengetahuan` text,
  `deskripsi_keterampilan` text,
  `catatan` text,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `synced_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_projek_siswa`
--

CREATE TABLE `nilai_projek_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `projek_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `aspek_kreativitas` int DEFAULT NULL COMMENT '0-100',
  `aspek_kerja_sama` int DEFAULT NULL COMMENT '0-100',
  `aspek_tanggung_jawab` int DEFAULT NULL COMMENT '0-100',
  `deskripsi` text,
  `predikat` varchar(10) DEFAULT NULL,
  `pembimbing_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tp_siswa`
--

CREATE TABLE `nilai_tp_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `mapel_id` bigint NOT NULL,
  `tp_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `nilai` float DEFAULT NULL COMMENT '0-100',
  `catatan` text,
  `updated_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tipe` enum('info','peringatan','pengumuman','tugas') DEFAULT 'info',
  `link_aksi` varchar(255) DEFAULT NULL,
  `dibaca` tinyint(1) DEFAULT '0',
  `user_id` bigint NOT NULL,
  `dikirim_oleh` bigint DEFAULT NULL,
  `dikirim_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dibaca_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan_guru`
--

CREATE TABLE `penugasan_guru` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `guru_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `jenis_penugasan_id` bigint NOT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `mapel_id` bigint DEFAULT NULL,
  `grup_tahta_id` bigint DEFAULT NULL,
  `is_koordinator` tinyint(1) DEFAULT '0',
  `spesialisasi` varchar(100) DEFAULT NULL,
  `no_sertifikat` varchar(50) DEFAULT NULL,
  `tanggal_sertifikat` date DEFAULT NULL,
  `file_sertifikat` varchar(255) DEFAULT NULL,
  `beban_jam_mengajar` int DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tahun_ajaran_id` bigint NOT NULL,
  `semester_id` bigint NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('belum_mulai','berjalan','selesai') DEFAULT 'belum_mulai',
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api-token', '8ed51d73c1c20a54c4e2b521cf26df03b9834a70c5cf486b493e07788d320016', '[\"*\"]', NULL, NULL, '2025-06-28 23:32:28', '2025-06-28 23:32:28'),
(2, 'App\\Models\\User', 1, 'api-token', '0ee7480fe7f78bdcd59ebfa746851b6caa2d64f4a18d4765879f13d3fad1376c', '[\"*\"]', NULL, NULL, '2025-06-28 23:37:05', '2025-06-28 23:37:05'),
(3, 'App\\Models\\User', 2, 'api-token', '6fc83f051703ce30aabe9cae017571b4c957be5dc2bdff88652ba9292d50f06a', '[\"*\"]', NULL, NULL, '2025-06-28 23:42:44', '2025-06-28 23:42:44'),
(4, 'App\\Models\\User', 12, 'api-token', 'b9c6ee1aa42e75593f2c0348c33c43734143831855d5d11e2f3b9a51d7828c3e', '[\"*\"]', NULL, NULL, '2025-06-28 23:46:42', '2025-06-28 23:46:42'),
(5, 'App\\Models\\User', 1, 'api-token', 'ab4e01f4669ce2c9d8d8aadee6b1018db50bf0f5eeffb1ddddd99e79c774a5dc', '[\"*\"]', NULL, NULL, '2025-06-28 23:49:02', '2025-06-28 23:49:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_akademik`
--

CREATE TABLE `raport_akademik` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `catatan_wali_kelas` text,
  `catatan_kepala_sekolah` text,
  `status_validasi` enum('belum_diperiksa','sudah_diperiksa','ditolak') DEFAULT 'belum_diperiksa',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_akademik_detail`
--

CREATE TABLE `raport_akademik_detail` (
  `id` bigint NOT NULL,
  `raport_id` bigint NOT NULL,
  `mapel_id` bigint DEFAULT NULL,
  `nilai_akhir` float DEFAULT NULL COMMENT '0-100',
  `predikat` varchar(10) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `synced_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_non_akademik`
--

CREATE TABLE `raport_non_akademik` (
  `id` bigint NOT NULL,
  `murid_id` bigint DEFAULT NULL,
  `periode_id` bigint DEFAULT NULL,
  `projek_p5_id` bigint DEFAULT NULL,
  `sikap_id` bigint DEFAULT NULL,
  `catatan_umum` text,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_tahfidz_detail`
--

CREATE TABLE `raport_tahfidz_detail` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `ref_juz_id` bigint NOT NULL,
  `penguji_id` bigint DEFAULT NULL,
  `surat_terakhir` varchar(100) DEFAULT NULL,
  `ayat_terakhir` int DEFAULT NULL,
  `nilai_kelancaran` int DEFAULT NULL,
  `nilai_tajwid` int DEFAULT NULL,
  `nilai_adab` int DEFAULT NULL,
  `nilai_murojaah` int DEFAULT NULL,
  `catatan` text,
  `is_lulus` enum('ya','tidak') DEFAULT 'tidak',
  `tanggal_ujian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='CHECK nilai_kelancaran, nilai_tajwid, nilai_adab, nilai_murojaah BETWEEN 0 AND 100';

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_tahfidz_tahsin`
--

CREATE TABLE `raport_tahfidz_tahsin` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `pengampu_id` bigint DEFAULT NULL,
  `periode_id` bigint NOT NULL,
  `capaian_tahfidz` text,
  `capaian_tahsin` text,
  `nilai_tahfidz` int DEFAULT NULL,
  `nilai_tahsin` int DEFAULT NULL,
  `status_validasi` enum('belum_diperiksa','sudah_diperiksa','ditolak') DEFAULT 'belum_diperiksa',
  `catatan_pembina` text,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_tahsin_detail`
--

CREATE TABLE `raport_tahsin_detail` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `jilid_id` bigint DEFAULT NULL,
  `penguji_id` bigint DEFAULT NULL,
  `halaman_awal` int DEFAULT NULL,
  `halaman_terakhir` int DEFAULT NULL,
  `nilai_makharijul_huruf` int DEFAULT NULL,
  `nilai_tajwid` int DEFAULT NULL,
  `nilai_adab` int DEFAULT NULL,
  `catatan` text,
  `is_lulus` enum('ya','tidak') DEFAULT 'tidak',
  `tanggal_ujian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='CHECK nilai_makharijul_huruf, nilai_tajwid, nilai_adab BETWEEN 0 AND 100';

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi_target_koordinator`
--

CREATE TABLE `realisasi_target_koordinator` (
  `id` bigint NOT NULL,
  `target_id` bigint NOT NULL,
  `koordinator_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `realisasi_kunjungan` int DEFAULT '0',
  `realisasi_siswa_naik_jilid` int DEFAULT '0',
  `realisasi_siswa_naik_juz` int DEFAULT '0',
  `realisasi_feedback_guru` int DEFAULT '0',
  `persentase_capaian` decimal(5,2) DEFAULT '0.00',
  `evaluasi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_aspek_supervisi`
--

CREATE TABLE `ref_aspek_supervisi` (
  `id` bigint NOT NULL,
  `kategori` enum('tahfidz','tahsin','mata_pelajaran','wali_kelas','tahta','umum') NOT NULL,
  `kode` varchar(20) NOT NULL,
  `aspek` varchar(100) NOT NULL,
  `indikator` text,
  `bobot` int DEFAULT '1',
  `urutan` int DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_ekstrakurikuler`
--

CREATE TABLE `ref_ekstrakurikuler` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` enum('olahraga','seni','akademik','keagamaan','lainnya') DEFAULT NULL,
  `penanggung_jawab_id` bigint DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenis_absensi`
--

CREATE TABLE `ref_jenis_absensi` (
  `id` bigint NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenis_kelamin`
--

CREATE TABLE `ref_jenis_kelamin` (
  `id` bigint NOT NULL,
  `kode` char(1) NOT NULL,
  `label` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenis_penugasan`
--

CREATE TABLE `ref_jenis_penugasan` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `is_kepemimpinan` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jilid_tahsin`
--

CREATE TABLE `ref_jilid_tahsin` (
  `id` bigint NOT NULL,
  `jilid_ke` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `total_halaman` int NOT NULL,
  `urutan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_juz_tahfidz`
--

CREATE TABLE `ref_juz_tahfidz` (
  `id` bigint NOT NULL,
  `juz_ke` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_surat` int NOT NULL,
  `surat_awal` varchar(100) NOT NULL,
  `surat_akhir` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_lingkup_materi`
--

CREATE TABLE `ref_lingkup_materi` (
  `id` bigint NOT NULL,
  `nama` varchar(150) NOT NULL,
  `mapel_id` bigint DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_mata_pelajaran`
--

CREATE TABLE `ref_mata_pelajaran` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelompok` enum('A','B','C') DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_projek_p5`
--

CREATE TABLE `ref_projek_p5` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `judul_projek` varchar(255) NOT NULL,
  `deskripsi` text,
  `dimensi_p5` varchar(100) NOT NULL,
  `fase` enum('A','B','C','D','E','F') NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_status_murid`
--

CREATE TABLE `ref_status_murid` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_tujuan_pembelajaran`
--

CREATE TABLE `ref_tujuan_pembelajaran` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `mapel_id` bigint DEFAULT NULL,
  `fase` enum('A','B','C','D','E','F') NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_grup_tahta`
--

CREATE TABLE `riwayat_grup_tahta` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `grup_sebelumnya_id` bigint DEFAULT NULL,
  `grup_baru_id` bigint DEFAULT NULL,
  `alasan_pindah` text,
  `tanggal_pindah` date DEFAULT NULL,
  `dicatat_oleh` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_murid`
--

CREATE TABLE `riwayat_murid` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `periode_id` bigint NOT NULL,
  `status_id` bigint NOT NULL,
  `keterangan` text,
  `tanggal_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `synced_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penugasan`
--

CREATE TABLE `riwayat_penugasan` (
  `id` bigint NOT NULL,
  `penugasan_id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `guru_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `jenis_penugasan_id` bigint NOT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `mapel_id` bigint DEFAULT NULL,
  `grup_tahta_id` bigint DEFAULT NULL,
  `is_koordinator` tinyint(1) DEFAULT '0',
  `spesialisasi` varchar(100) DEFAULT NULL,
  `no_sertifikat` varchar(50) DEFAULT NULL,
  `tanggal_sertifikat` date DEFAULT NULL,
  `file_sertifikat` varchar(255) DEFAULT NULL,
  `beban_jam_mengajar` int DEFAULT '0',
  `alasan_perubahan` text,
  `status_perubahan` enum('dipindahkan','diberhentikan','pensiun','mengundurkan_diri') DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `dipindahkan_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_tahsin`
--

CREATE TABLE `riwayat_tahsin` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `jilid_sebelumnya_id` bigint DEFAULT NULL,
  `jilid_baru_id` bigint DEFAULT NULL,
  `tanggal_pindah` date DEFAULT NULL,
  `catatan` text,
  `penguji_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text,
  `permissions` json DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `kode`, `nama`, `deskripsi`, `permissions`, `is_active`, `created_at`) VALUES
(1, 'ADM', 'admin', 'Administrator sistem', '[\"akses_semua\"]', 1, '2025-06-26 17:42:58'),
(2, 'GURU', 'guru', 'Guru pengajar', NULL, 1, '2025-06-26 17:42:58'),
(3, 'MURID', 'murid', 'Siswa aktif', NULL, 1, '2025-06-26 17:42:58'),
(4, 'WALI', 'wali_murid', 'Orang tua atau wali murid', NULL, 1, '2025-06-26 17:42:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `nss` varchar(20) DEFAULT NULL,
  `akreditasi` enum('A','B','C','tidak_terakreditasi') DEFAULT NULL,
  `tahun_berdiri` year DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` bigint NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` text,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VDOhvWp0VnShhFP8Ri4twAJXvDrHhKDXxJBciL4A', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWGRLZm81MXJJZWpiZW5wQ0VFZUlWM21Za2dwdm1FTVEwbFZXWXVmSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1751256111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sikap_siswa`
--

CREATE TABLE `sikap_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `spiritual` enum('SB','B','C','K') DEFAULT 'B',
  `sosial` enum('SB','B','C','K') DEFAULT 'B',
  `deskripsi_spiritual` text,
  `deskripsi_sosial` text,
  `wali_kelas_id` bigint DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supervisi_guru`
--

CREATE TABLE `supervisi_guru` (
  `id` bigint NOT NULL,
  `supervisor_id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `mapel_id` bigint DEFAULT NULL,
  `periode_id` bigint NOT NULL,
  `tanggal_supervisi` date NOT NULL,
  `jenis` enum('Tahfidz','Tahsin','Mapel','Wali Kelas','Tahta','Umum') NOT NULL,
  `metode` enum('Observasi','Wawancara','Dokumen','Kunjungan') NOT NULL,
  `kesimpulan_umum` text,
  `rekomendasi_perbaikan` text,
  `status` enum('Belum Dinilai','Sudah Dinilai') DEFAULT 'Sudah Dinilai',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supervisi_guru_detail`
--

CREATE TABLE `supervisi_guru_detail` (
  `id` bigint NOT NULL,
  `supervisi_id` bigint NOT NULL,
  `ref_aspek_id` bigint NOT NULL,
  `skor` int NOT NULL COMMENT '0-100',
  `komentar` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supervisi_rekap_guru`
--

CREATE TABLE `supervisi_rekap_guru` (
  `id` bigint NOT NULL,
  `guru_id` bigint NOT NULL,
  `tahun_ajaran_id` bigint NOT NULL,
  `total_supervisi` int DEFAULT NULL,
  `rerata_skor` float DEFAULT NULL COMMENT '0-100',
  `evaluasi_akhir` text,
  `rekomendasi_pembinaan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahfidz_siswa`
--

CREATE TABLE `tahfidz_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `surat` varchar(100) NOT NULL,
  `ayat_mulai` int DEFAULT NULL,
  `ayat_selesai` int DEFAULT NULL,
  `nilai_tahfidz` int DEFAULT NULL COMMENT '0-100',
  `catatan` text,
  `tanggal_setor` date NOT NULL,
  `periode_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahsin_siswa`
--

CREATE TABLE `tahsin_siswa` (
  `id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `jilid_id` bigint DEFAULT NULL,
  `halaman_mulai` int DEFAULT NULL,
  `halaman_selesai` int DEFAULT NULL,
  `nilai_tahsin` int DEFAULT NULL COMMENT '0-100',
  `catatan` text,
  `tanggal_setor` date NOT NULL,
  `periode_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahta_grup`
--

CREATE TABLE `tahta_grup` (
  `id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pengampu_id` bigint NOT NULL,
  `level` int NOT NULL,
  `jenis` enum('tahfidz','tahsin','tilawah') NOT NULL,
  `kapasitas_maksimal` int DEFAULT '15',
  `periode_id` bigint NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahta_pertemuan`
--

CREATE TABLE `tahta_pertemuan` (
  `id` bigint NOT NULL,
  `tahta_grup_id` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `pertemuan_ke` int NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `materi` text,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahta_setoran`
--

CREATE TABLE `tahta_setoran` (
  `id` bigint NOT NULL,
  `pertemuan_id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `jenis_setoran` enum('tahfidz','tahsin','tilawah') NOT NULL,
  `juz_id` bigint DEFAULT NULL,
  `surat` varchar(100) DEFAULT NULL,
  `ayat_mulai` int DEFAULT NULL,
  `ayat_selesai` int DEFAULT NULL,
  `jilid_ke` int DEFAULT NULL,
  `halaman_mulai` int DEFAULT NULL,
  `halaman_selesai` int DEFAULT NULL,
  `nilai_kelancaran` int DEFAULT NULL COMMENT '1-4',
  `nilai_tajwid` int DEFAULT NULL COMMENT '1-4',
  `nilai_adab` int DEFAULT NULL COMMENT '1-4',
  `catatan` text,
  `status` enum('lulus','mengulang','belum_ujian') DEFAULT 'belum_ujian',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_koordinator_tahta`
--

CREATE TABLE `target_koordinator_tahta` (
  `id` bigint NOT NULL,
  `koordinator_id` bigint NOT NULL,
  `periode_id` bigint NOT NULL,
  `target_kunjungan` int DEFAULT '0',
  `target_siswa_naik_jilid` int DEFAULT '0',
  `target_siswa_naik_juz` int DEFAULT '0',
  `target_feedback_guru` int DEFAULT '0',
  `catatan` text,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id` bigint NOT NULL,
  `yayasan_id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenjang` enum('pg','tk','sdit','smpit','smait') NOT NULL,
  `alamat_id` bigint DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `kepala` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tipe_user` enum('guru','murid','wali_murid','admin') NOT NULL,
  `profil_id` bigint NOT NULL,
  `role_id` bigint NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `tipe_user`, `profil_id`, `role_id`, `is_active`, `email_verified_at`, `last_login_at`, `password_changed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@example.com', 'admin01', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'admin', 0, 1, 1, NULL, NULL, NULL, '2025-06-26 10:42:59', '2025-06-26 10:42:59', NULL),
(2, 'guru1@example.com', 'guru01', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'guru', 0, 2, 1, NULL, NULL, NULL, '2025-06-29 06:39:55', NULL, NULL),
(3, 'wali1@example.com', 'wali01', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'wali_murid', 0, 4, 1, NULL, NULL, NULL, '2025-06-29 06:39:55', NULL, NULL),
(10, 'admin2@example.com', 'admin02', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'admin', 0, 1, 1, NULL, NULL, NULL, '2025-06-29 06:45:01', NULL, NULL),
(11, 'guru2@example.com', 'guru02', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'guru', 0, 2, 1, NULL, NULL, NULL, '2025-06-29 06:45:01', NULL, NULL),
(12, 'wali2@example.com', 'wali02', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'wali_murid', 0, 4, 1, NULL, NULL, NULL, '2025-06-29 06:45:01', NULL, NULL),
(13, 'murid2@example.com', 'murid02', '$2y$12$GqOPqZlLNrlzTD7jq90Hx.mn7ZPaM/Sj7PTNDDRCoRnQ0jXP9cYla', 'murid', 0, 3, 1, NULL, NULL, NULL, '2025-06-29 06:45:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_activity_log`
--

CREATE TABLE `user_activity_log` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `platform` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Direkomendasikan untuk partisi berdasarkan kolom created_at (per tahun/bulan)';

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_murid`
--

CREATE TABLE `wali_murid` (
  `id` bigint NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_kelamin_id` bigint NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_id` bigint DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL,
  `penghasilan_bulanan` bigint DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_murid_murid`
--

CREATE TABLE `wali_murid_murid` (
  `id` bigint NOT NULL,
  `wali_murid_id` bigint NOT NULL,
  `murid_id` bigint NOT NULL,
  `hubungan` enum('ayah','ibu','kakek','nenek','paman','bibi','wali') NOT NULL,
  `is_utama` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan`
--

CREATE TABLE `yayasan` (
  `id` bigint NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat_id` bigint DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `kepala` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_guru`
--
ALTER TABLE `absensi_guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_absensi_guru_unik` (`guru_id`,`tanggal`),
  ADD KEY `idx_absensi_guru_unit_tanggal_status` (`unit_id`,`tanggal`,`status`);

--
-- Indeks untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_absensi_murid_periode_tanggal` (`murid_id`,`periode_id`,`tanggal`),
  ADD KEY `idx_absensi_kelas_tanggal` (`kelas_id`,`tanggal`),
  ADD KEY `idx_absensi_periode_tanggal` (`periode_id`,`tanggal`),
  ADD KEY `idx_absensi_kelas_tanggal_jenis` (`kelas_id`,`tanggal`,`jenis_absensi_id`),
  ADD KEY `jenis_absensi_id` (`jenis_absensi_id`),
  ADD KEY `dicatat_oleh` (`dicatat_oleh`);

--
-- Indeks untuk tabel `absensi_siswa_archive`
--
ALTER TABLE `absensi_siswa_archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_absensi_siswa_archive` (`kelas_id`,`tanggal`,`jenis_absensi_id`),
  ADD KEY `murid_id` (`murid_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `jenis_absensi_id` (`jenis_absensi_id`),
  ADD KEY `dicatat_oleh` (`dicatat_oleh`);

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_alumni_murid` (`murid_id`);

--
-- Indeks untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`),
  ADD KEY `idx_app_settings_key` (`key`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idx_guru_nip` (`nip`),
  ADD UNIQUE KEY `idx_guru_nik` (`nik`),
  ADD UNIQUE KEY `idx_guru_email` (`email`),
  ADD KEY `idx_guru_unit_status` (`unit_id`,`is_active`),
  ADD KEY `idx_guru_nama_unit` (`unit_id`,`nama`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `alamat_id` (`alamat_id`),
  ADD KEY `jenis_kelamin_id` (`jenis_kelamin_id`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_jadwal_kelas_hari_jam` (`kelas_id`,`hari`,`jam_ke`),
  ADD KEY `idx_jadwal_guru_hari_jam` (`guru_id`,`hari`,`jam_ke`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_kelas_unit_kode` (`unit_id`,`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `wali_kelas_id` (`wali_kelas_id`);

--
-- Indeks untuk tabel `kenaikan_jilid_antrian`
--
ALTER TABLE `kenaikan_jilid_antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_kenaikan_murid_status` (`murid_id`,`status`),
  ADD KEY `idx_kenaikan_periode_status` (`periode_id`,`status`),
  ADD KEY `diajukan_oleh` (`diajukan_oleh`),
  ADD KEY `penguji_id` (`penguji_id`);

--
-- Indeks untuk tabel `log_sinkronisasi`
--
ALTER TABLE `log_sinkronisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_mapel_unit_ref` (`unit_id`,`ref_mata_pelajaran_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `ref_mata_pelajaran_id` (`ref_mata_pelajaran_id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`menu_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `idx_murid_nis` (`nis`),
  ADD UNIQUE KEY `idx_murid_nisn` (`nisn`),
  ADD KEY `idx_murid_unit_kelas_aktif` (`unit_id`,`kelas_id`,`is_active`),
  ADD KEY `idx_murid_kelas_nama` (`kelas_id`,`nama`),
  ADD KEY `jenis_kelamin_id` (`jenis_kelamin_id`),
  ADD KEY `alamat_id` (`alamat_id`);

--
-- Indeks untuk tabel `nilai_ekskul_siswa`
--
ALTER TABLE `nilai_ekskul_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ekskul_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `ekskul_id` (`ekskul_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `nilai_mapel_siswa`
--
ALTER TABLE `nilai_mapel_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nilai_mapel_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `idx_nilai_mapel_mapel_periode` (`mapel_id`,`periode_id`),
  ADD KEY `idx_nilai_mapel_full` (`murid_id`,`periode_id`,`mapel_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `nilai_projek_siswa`
--
ALTER TABLE `nilai_projek_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_projek_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `projek_id` (`projek_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `pembimbing_id` (`pembimbing_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `nilai_tp_siswa`
--
ALTER TABLE `nilai_tp_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nilai_tp_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `tp_id` (`tp_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_notifikasi_user_dibaca` (`user_id`,`dibaca`),
  ADD KEY `idx_notifikasi_tipe` (`tipe`),
  ADD KEY `idx_notifikasi_user_status` (`user_id`,`dibaca`,`dikirim_pada`),
  ADD KEY `dikirim_oleh` (`dikirim_oleh`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_penugasan_guru_periode_aktif` (`guru_id`,`periode_id`,`is_active`),
  ADD KEY `idx_penugasan_kelas_mapel_periode` (`kelas_id`,`mapel_id`,`periode_id`),
  ADD KEY `idx_penugasan_unit_periode` (`unit_id`,`periode_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `jenis_penugasan_id` (`jenis_penugasan_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `grup_tahta_id` (`grup_tahta_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `raport_akademik`
--
ALTER TABLE `raport_akademik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_raport_akademik_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `raport_akademik_detail`
--
ALTER TABLE `raport_akademik_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raport_id` (`raport_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `raport_non_akademik`
--
ALTER TABLE `raport_non_akademik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_raport_nonakademik_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `projek_p5_id` (`projek_p5_id`),
  ADD KEY `sikap_id` (`sikap_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `raport_tahfidz_detail`
--
ALTER TABLE `raport_tahfidz_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_raport_tahfidz_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `idx_raport_tahfidz_juz` (`ref_juz_id`),
  ADD KEY `idx_raport_tahfidz_lulus` (`is_lulus`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `penguji_id` (`penguji_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `raport_tahfidz_tahsin`
--
ALTER TABLE `raport_tahfidz_tahsin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_raport_tt_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `idx_raport_tt_status` (`status_validasi`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `pengampu_id` (`pengampu_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `raport_tahsin_detail`
--
ALTER TABLE `raport_tahsin_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_raport_tahsin_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `idx_raport_tahsin_jilid` (`jilid_id`),
  ADD KEY `idx_raport_tahsin_lulus` (`is_lulus`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `penguji_id` (`penguji_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `realisasi_target_koordinator`
--
ALTER TABLE `realisasi_target_koordinator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_realisasi_koordinator` (`koordinator_id`,`periode_id`),
  ADD KEY `target_id` (`target_id`),
  ADD KEY `periode_id` (`periode_id`);

--
-- Indeks untuk tabel `ref_aspek_supervisi`
--
ALTER TABLE `ref_aspek_supervisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_ekstrakurikuler`
--
ALTER TABLE `ref_ekstrakurikuler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `penanggung_jawab_id` (`penanggung_jawab_id`);

--
-- Indeks untuk tabel `ref_jenis_absensi`
--
ALTER TABLE `ref_jenis_absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `ref_jenis_kelamin`
--
ALTER TABLE `ref_jenis_kelamin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `ref_jenis_penugasan`
--
ALTER TABLE `ref_jenis_penugasan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `ref_jilid_tahsin`
--
ALTER TABLE `ref_jilid_tahsin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jilid_ke` (`jilid_ke`);

--
-- Indeks untuk tabel `ref_juz_tahfidz`
--
ALTER TABLE `ref_juz_tahfidz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `juz_ke` (`juz_ke`);

--
-- Indeks untuk tabel `ref_lingkup_materi`
--
ALTER TABLE `ref_lingkup_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `ref_mata_pelajaran`
--
ALTER TABLE `ref_mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `ref_projek_p5`
--
ALTER TABLE `ref_projek_p5`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `ref_status_murid`
--
ALTER TABLE `ref_status_murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `ref_tujuan_pembelajaran`
--
ALTER TABLE `ref_tujuan_pembelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `riwayat_grup_tahta`
--
ALTER TABLE `riwayat_grup_tahta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_riwayat_grup_tahta_tanggal` (`murid_id`,`tanggal_pindah`),
  ADD KEY `grup_sebelumnya_id` (`grup_sebelumnya_id`),
  ADD KEY `grup_baru_id` (`grup_baru_id`),
  ADD KEY `dicatat_oleh` (`dicatat_oleh`);

--
-- Indeks untuk tabel `riwayat_murid`
--
ALTER TABLE `riwayat_murid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_riwayat_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indeks untuk tabel `riwayat_penugasan`
--
ALTER TABLE `riwayat_penugasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_riwayat_guru_periode` (`guru_id`,`periode_id`),
  ADD KEY `idx_riwayat_penugasan_id` (`penugasan_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `jenis_penugasan_id` (`jenis_penugasan_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `grup_tahta_id` (`grup_tahta_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `riwayat_tahsin`
--
ALTER TABLE `riwayat_tahsin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_riwayat_tahsin_tanggal` (`murid_id`,`tanggal_pindah`),
  ADD KEY `jilid_sebelumnya_id` (`jilid_sebelumnya_id`),
  ADD KEY `jilid_baru_id` (`jilid_baru_id`),
  ADD KEY `penguji_id` (`penguji_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npsn` (`npsn`),
  ADD UNIQUE KEY `nss` (`nss`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sikap_siswa`
--
ALTER TABLE `sikap_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sikap_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `wali_kelas_id` (`wali_kelas_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `supervisi_guru`
--
ALTER TABLE `supervisi_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_supervisi_supervisor_periode` (`supervisor_id`,`periode_id`),
  ADD KEY `idx_supervisi_periode_supervisor_tanggal` (`periode_id`,`supervisor_id`,`tanggal_supervisi`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `supervisi_guru_detail`
--
ALTER TABLE `supervisi_guru_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_supervisi_detail` (`supervisi_id`),
  ADD KEY `ref_aspek_id` (`ref_aspek_id`);

--
-- Indeks untuk tabel `supervisi_rekap_guru`
--
ALTER TABLE `supervisi_rekap_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_supervisi_rekap` (`guru_id`,`tahun_ajaran_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `tahfidz_siswa`
--
ALTER TABLE `tahfidz_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tahfidz_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `tahsin_siswa`
--
ALTER TABLE `tahsin_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tahsin_murid_periode` (`murid_id`,`periode_id`),
  ADD KEY `jilid_id` (`jilid_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `tahta_grup`
--
ALTER TABLE `tahta_grup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_tahta_grup_unit_kode_periode` (`unit_id`,`kode`,`periode_id`),
  ADD KEY `idx_tahta_grup_pengampu_periode` (`pengampu_id`,`periode_id`),
  ADD KEY `periode_id` (`periode_id`);

--
-- Indeks untuk tabel `tahta_pertemuan`
--
ALTER TABLE `tahta_pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tahta_pertemuan_grup_tanggal` (`tahta_grup_id`,`tanggal`);

--
-- Indeks untuk tabel `tahta_setoran`
--
ALTER TABLE `tahta_setoran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tahta_setoran_murid_jenis` (`murid_id`,`jenis_setoran`),
  ADD KEY `idx_tahta_setoran_pertemuan` (`pertemuan_id`),
  ADD KEY `idx_tahta_setoran_juz` (`juz_id`),
  ADD KEY `idx_tahta_setoran_murid_jenis_created` (`murid_id`,`jenis_setoran`,`created_at`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `target_koordinator_tahta`
--
ALTER TABLE `target_koordinator_tahta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_target_koordinator` (`koordinator_id`,`periode_id`),
  ADD KEY `periode_id` (`periode_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `alamat_id` (`alamat_id`),
  ADD KEY `yayasan_id` (`yayasan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idx_users_email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `idx_users_username` (`username`),
  ADD KEY `idx_users_type_profile` (`tipe_user`,`profil_id`),
  ADD KEY `idx_users_role` (`role_id`);

--
-- Indeks untuk tabel `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idx_wali_nik` (`nik`),
  ADD UNIQUE KEY `idx_wali_email` (`email`),
  ADD KEY `jenis_kelamin_id` (`jenis_kelamin_id`),
  ADD KEY `alamat_id` (`alamat_id`);

--
-- Indeks untuk tabel `wali_murid_murid`
--
ALTER TABLE `wali_murid_murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_wali_murid_unique` (`wali_murid_id`,`murid_id`),
  ADD KEY `idx_wali_murid_utama` (`murid_id`,`is_utama`);

--
-- Indeks untuk tabel `yayasan`
--
ALTER TABLE `yayasan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `alamat_id` (`alamat_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_guru`
--
ALTER TABLE `absensi_guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_siswa_archive`
--
ALTER TABLE `absensi_siswa_archive`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kenaikan_jilid_antrian`
--
ALTER TABLE `kenaikan_jilid_antrian`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_sinkronisasi`
--
ALTER TABLE `log_sinkronisasi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `murid`
--
ALTER TABLE `murid`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_ekskul_siswa`
--
ALTER TABLE `nilai_ekskul_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_mapel_siswa`
--
ALTER TABLE `nilai_mapel_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_projek_siswa`
--
ALTER TABLE `nilai_projek_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_tp_siswa`
--
ALTER TABLE `nilai_tp_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `raport_akademik`
--
ALTER TABLE `raport_akademik`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raport_akademik_detail`
--
ALTER TABLE `raport_akademik_detail`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raport_non_akademik`
--
ALTER TABLE `raport_non_akademik`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raport_tahfidz_detail`
--
ALTER TABLE `raport_tahfidz_detail`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raport_tahfidz_tahsin`
--
ALTER TABLE `raport_tahfidz_tahsin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raport_tahsin_detail`
--
ALTER TABLE `raport_tahsin_detail`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `realisasi_target_koordinator`
--
ALTER TABLE `realisasi_target_koordinator`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_aspek_supervisi`
--
ALTER TABLE `ref_aspek_supervisi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_ekstrakurikuler`
--
ALTER TABLE `ref_ekstrakurikuler`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_jenis_absensi`
--
ALTER TABLE `ref_jenis_absensi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_jenis_kelamin`
--
ALTER TABLE `ref_jenis_kelamin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_jenis_penugasan`
--
ALTER TABLE `ref_jenis_penugasan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_jilid_tahsin`
--
ALTER TABLE `ref_jilid_tahsin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_juz_tahfidz`
--
ALTER TABLE `ref_juz_tahfidz`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_lingkup_materi`
--
ALTER TABLE `ref_lingkup_materi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_mata_pelajaran`
--
ALTER TABLE `ref_mata_pelajaran`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_projek_p5`
--
ALTER TABLE `ref_projek_p5`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_status_murid`
--
ALTER TABLE `ref_status_murid`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_tujuan_pembelajaran`
--
ALTER TABLE `ref_tujuan_pembelajaran`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_grup_tahta`
--
ALTER TABLE `riwayat_grup_tahta`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_murid`
--
ALTER TABLE `riwayat_murid`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_penugasan`
--
ALTER TABLE `riwayat_penugasan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_tahsin`
--
ALTER TABLE `riwayat_tahsin`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sikap_siswa`
--
ALTER TABLE `sikap_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supervisi_guru`
--
ALTER TABLE `supervisi_guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supervisi_guru_detail`
--
ALTER TABLE `supervisi_guru_detail`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supervisi_rekap_guru`
--
ALTER TABLE `supervisi_rekap_guru`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahfidz_siswa`
--
ALTER TABLE `tahfidz_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahsin_siswa`
--
ALTER TABLE `tahsin_siswa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahta_grup`
--
ALTER TABLE `tahta_grup`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahta_pertemuan`
--
ALTER TABLE `tahta_pertemuan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahta_setoran`
--
ALTER TABLE `tahta_setoran`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `target_koordinator_tahta`
--
ALTER TABLE `target_koordinator_tahta`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_activity_log`
--
ALTER TABLE `user_activity_log`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wali_murid`
--
ALTER TABLE `wali_murid`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wali_murid_murid`
--
ALTER TABLE `wali_murid_murid`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `yayasan`
--
ALTER TABLE `yayasan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_guru`
--
ALTER TABLE `absensi_guru`
  ADD CONSTRAINT `absensi_guru_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `absensi_guru_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

--
-- Ketidakleluasaan untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD CONSTRAINT `absensi_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `absensi_siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `absensi_siswa_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `absensi_siswa_ibfk_4` FOREIGN KEY (`jenis_absensi_id`) REFERENCES `ref_jenis_absensi` (`id`),
  ADD CONSTRAINT `absensi_siswa_ibfk_5` FOREIGN KEY (`dicatat_oleh`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `absensi_siswa_archive`
--
ALTER TABLE `absensi_siswa_archive`
  ADD CONSTRAINT `absensi_siswa_archive_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `absensi_siswa_archive_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `absensi_siswa_archive_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `absensi_siswa_archive_ibfk_4` FOREIGN KEY (`jenis_absensi_id`) REFERENCES `ref_jenis_absensi` (`id`),
  ADD CONSTRAINT `absensi_siswa_archive_ibfk_5` FOREIGN KEY (`dicatat_oleh`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`);

--
-- Ketidakleluasaan untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  ADD CONSTRAINT `app_settings_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guru_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `guru_ibfk_4` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`),
  ADD CONSTRAINT `guru_ibfk_5` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `ref_jenis_kelamin` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_3` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `kelas_ibfk_4` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id`);

--
-- Ketidakleluasaan untuk tabel `kenaikan_jilid_antrian`
--
ALTER TABLE `kenaikan_jilid_antrian`
  ADD CONSTRAINT `kenaikan_jilid_antrian_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `kenaikan_jilid_antrian_ibfk_2` FOREIGN KEY (`diajukan_oleh`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `kenaikan_jilid_antrian_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `kenaikan_jilid_antrian_ibfk_4` FOREIGN KEY (`penguji_id`) REFERENCES `guru` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_sinkronisasi`
--
ALTER TABLE `log_sinkronisasi`
  ADD CONSTRAINT `log_sinkronisasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mata_pelajaran_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mata_pelajaran_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `mata_pelajaran_ibfk_4` FOREIGN KEY (`ref_mata_pelajaran_id`) REFERENCES `ref_mata_pelajaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `murid_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `murid_ibfk_3` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `ref_jenis_kelamin` (`id`),
  ADD CONSTRAINT `murid_ibfk_4` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_ekskul_siswa`
--
ALTER TABLE `nilai_ekskul_siswa`
  ADD CONSTRAINT `nilai_ekskul_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `nilai_ekskul_siswa_ibfk_2` FOREIGN KEY (`ekskul_id`) REFERENCES `ref_ekstrakurikuler` (`id`),
  ADD CONSTRAINT `nilai_ekskul_siswa_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `nilai_ekskul_siswa_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_mapel_siswa`
--
ALTER TABLE `nilai_mapel_siswa`
  ADD CONSTRAINT `nilai_mapel_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `nilai_mapel_siswa_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`),
  ADD CONSTRAINT `nilai_mapel_siswa_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `nilai_mapel_siswa_ibfk_4` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `nilai_mapel_siswa_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nilai_mapel_siswa_ibfk_6` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_projek_siswa`
--
ALTER TABLE `nilai_projek_siswa`
  ADD CONSTRAINT `nilai_projek_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `nilai_projek_siswa_ibfk_2` FOREIGN KEY (`projek_id`) REFERENCES `ref_projek_p5` (`id`),
  ADD CONSTRAINT `nilai_projek_siswa_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `nilai_projek_siswa_ibfk_4` FOREIGN KEY (`pembimbing_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `nilai_projek_siswa_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_tp_siswa`
--
ALTER TABLE `nilai_tp_siswa`
  ADD CONSTRAINT `nilai_tp_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `nilai_tp_siswa_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`),
  ADD CONSTRAINT `nilai_tp_siswa_ibfk_3` FOREIGN KEY (`tp_id`) REFERENCES `ref_tujuan_pembelajaran` (`id`),
  ADD CONSTRAINT `nilai_tp_siswa_ibfk_4` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `nilai_tp_siswa_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`dikirim_oleh`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  ADD CONSTRAINT `penugasan_guru_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_3` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_4` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_5` FOREIGN KEY (`jenis_penugasan_id`) REFERENCES `ref_jenis_penugasan` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_6` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_7` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_8` FOREIGN KEY (`grup_tahta_id`) REFERENCES `tahta_grup` (`id`),
  ADD CONSTRAINT `penugasan_guru_ibfk_9` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `periode_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`),
  ADD CONSTRAINT `periode_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `periode_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `periode_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `periode_ibfk_5` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`),
  ADD CONSTRAINT `periode_ibfk_6` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Ketidakleluasaan untuk tabel `raport_akademik`
--
ALTER TABLE `raport_akademik`
  ADD CONSTRAINT `raport_akademik_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `raport_akademik_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `raport_akademik_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `raport_akademik_detail`
--
ALTER TABLE `raport_akademik_detail`
  ADD CONSTRAINT `raport_akademik_detail_ibfk_1` FOREIGN KEY (`raport_id`) REFERENCES `raport_akademik` (`id`),
  ADD CONSTRAINT `raport_akademik_detail_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `raport_non_akademik`
--
ALTER TABLE `raport_non_akademik`
  ADD CONSTRAINT `raport_non_akademik_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `raport_non_akademik_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `raport_non_akademik_ibfk_3` FOREIGN KEY (`projek_p5_id`) REFERENCES `nilai_projek_siswa` (`id`),
  ADD CONSTRAINT `raport_non_akademik_ibfk_4` FOREIGN KEY (`sikap_id`) REFERENCES `sikap_siswa` (`id`),
  ADD CONSTRAINT `raport_non_akademik_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `raport_tahfidz_detail`
--
ALTER TABLE `raport_tahfidz_detail`
  ADD CONSTRAINT `raport_tahfidz_detail_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `raport_tahfidz_detail_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `raport_tahfidz_detail_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `raport_tahfidz_detail_ibfk_4` FOREIGN KEY (`ref_juz_id`) REFERENCES `ref_juz_tahfidz` (`id`),
  ADD CONSTRAINT `raport_tahfidz_detail_ibfk_5` FOREIGN KEY (`penguji_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `raport_tahfidz_detail_ibfk_6` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `raport_tahfidz_tahsin`
--
ALTER TABLE `raport_tahfidz_tahsin`
  ADD CONSTRAINT `raport_tahfidz_tahsin_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `raport_tahfidz_tahsin_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `raport_tahfidz_tahsin_ibfk_3` FOREIGN KEY (`pengampu_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `raport_tahfidz_tahsin_ibfk_4` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `raport_tahfidz_tahsin_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `raport_tahfidz_tahsin_ibfk_6` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `raport_tahsin_detail`
--
ALTER TABLE `raport_tahsin_detail`
  ADD CONSTRAINT `raport_tahsin_detail_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `raport_tahsin_detail_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `raport_tahsin_detail_ibfk_3` FOREIGN KEY (`jilid_id`) REFERENCES `ref_jilid_tahsin` (`id`),
  ADD CONSTRAINT `raport_tahsin_detail_ibfk_4` FOREIGN KEY (`penguji_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `raport_tahsin_detail_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `realisasi_target_koordinator`
--
ALTER TABLE `realisasi_target_koordinator`
  ADD CONSTRAINT `realisasi_target_koordinator_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `target_koordinator_tahta` (`id`),
  ADD CONSTRAINT `realisasi_target_koordinator_ibfk_2` FOREIGN KEY (`koordinator_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `realisasi_target_koordinator_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_ekstrakurikuler`
--
ALTER TABLE `ref_ekstrakurikuler`
  ADD CONSTRAINT `ref_ekstrakurikuler_ibfk_1` FOREIGN KEY (`penanggung_jawab_id`) REFERENCES `guru` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_jenis_absensi`
--
ALTER TABLE `ref_jenis_absensi`
  ADD CONSTRAINT `ref_jenis_absensi_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_jenis_absensi_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_jenis_penugasan`
--
ALTER TABLE `ref_jenis_penugasan`
  ADD CONSTRAINT `ref_jenis_penugasan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_jenis_penugasan_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_lingkup_materi`
--
ALTER TABLE `ref_lingkup_materi`
  ADD CONSTRAINT `ref_lingkup_materi_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_lingkup_materi_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_lingkup_materi_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_mata_pelajaran`
--
ALTER TABLE `ref_mata_pelajaran`
  ADD CONSTRAINT `ref_mata_pelajaran_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_mata_pelajaran_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `ref_tujuan_pembelajaran`
--
ALTER TABLE `ref_tujuan_pembelajaran`
  ADD CONSTRAINT `ref_tujuan_pembelajaran_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_tujuan_pembelajaran_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ref_tujuan_pembelajaran_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_grup_tahta`
--
ALTER TABLE `riwayat_grup_tahta`
  ADD CONSTRAINT `riwayat_grup_tahta_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `riwayat_grup_tahta_ibfk_2` FOREIGN KEY (`grup_sebelumnya_id`) REFERENCES `tahta_grup` (`id`),
  ADD CONSTRAINT `riwayat_grup_tahta_ibfk_3` FOREIGN KEY (`grup_baru_id`) REFERENCES `tahta_grup` (`id`),
  ADD CONSTRAINT `riwayat_grup_tahta_ibfk_4` FOREIGN KEY (`dicatat_oleh`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_murid`
--
ALTER TABLE `riwayat_murid`
  ADD CONSTRAINT `riwayat_murid_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `riwayat_murid_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `riwayat_murid_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `riwayat_murid_ibfk_4` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `riwayat_murid_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `ref_status_murid` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_penugasan`
--
ALTER TABLE `riwayat_penugasan`
  ADD CONSTRAINT `riwayat_penugasan_ibfk_1` FOREIGN KEY (`penugasan_id`) REFERENCES `penugasan_guru` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_3` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_4` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_5` FOREIGN KEY (`jenis_penugasan_id`) REFERENCES `ref_jenis_penugasan` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_6` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_7` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_8` FOREIGN KEY (`grup_tahta_id`) REFERENCES `tahta_grup` (`id`),
  ADD CONSTRAINT `riwayat_penugasan_ibfk_9` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_tahsin`
--
ALTER TABLE `riwayat_tahsin`
  ADD CONSTRAINT `riwayat_tahsin_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `riwayat_tahsin_ibfk_2` FOREIGN KEY (`jilid_sebelumnya_id`) REFERENCES `ref_jilid_tahsin` (`id`),
  ADD CONSTRAINT `riwayat_tahsin_ibfk_3` FOREIGN KEY (`jilid_baru_id`) REFERENCES `ref_jilid_tahsin` (`id`),
  ADD CONSTRAINT `riwayat_tahsin_ibfk_4` FOREIGN KEY (`penguji_id`) REFERENCES `guru` (`id`);

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `sekolah_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

--
-- Ketidakleluasaan untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `semester_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `sikap_siswa`
--
ALTER TABLE `sikap_siswa`
  ADD CONSTRAINT `sikap_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `sikap_siswa_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `sikap_siswa_ibfk_3` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `sikap_siswa_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `supervisi_guru`
--
ALTER TABLE `supervisi_guru`
  ADD CONSTRAINT `supervisi_guru_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `supervisi_guru_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `supervisi_guru_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `supervisi_guru_ibfk_4` FOREIGN KEY (`mapel_id`) REFERENCES `ref_mata_pelajaran` (`id`),
  ADD CONSTRAINT `supervisi_guru_ibfk_5` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `supervisi_guru_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `supervisi_guru_detail`
--
ALTER TABLE `supervisi_guru_detail`
  ADD CONSTRAINT `supervisi_guru_detail_ibfk_1` FOREIGN KEY (`supervisi_id`) REFERENCES `supervisi_guru` (`id`),
  ADD CONSTRAINT `supervisi_guru_detail_ibfk_2` FOREIGN KEY (`ref_aspek_id`) REFERENCES `ref_aspek_supervisi` (`id`);

--
-- Ketidakleluasaan untuk tabel `supervisi_rekap_guru`
--
ALTER TABLE `supervisi_rekap_guru`
  ADD CONSTRAINT `supervisi_rekap_guru_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `supervisi_rekap_guru_ibfk_2` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `tahfidz_siswa`
--
ALTER TABLE `tahfidz_siswa`
  ADD CONSTRAINT `tahfidz_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `tahfidz_siswa_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `tahfidz_siswa_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tahsin_siswa`
--
ALTER TABLE `tahsin_siswa`
  ADD CONSTRAINT `tahsin_siswa_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `tahsin_siswa_ibfk_2` FOREIGN KEY (`jilid_id`) REFERENCES `ref_jilid_tahsin` (`id`),
  ADD CONSTRAINT `tahsin_siswa_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `tahsin_siswa_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tahta_grup`
--
ALTER TABLE `tahta_grup`
  ADD CONSTRAINT `tahta_grup_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `tahta_grup_ibfk_2` FOREIGN KEY (`pengampu_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `tahta_grup_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`);

--
-- Ketidakleluasaan untuk tabel `tahta_pertemuan`
--
ALTER TABLE `tahta_pertemuan`
  ADD CONSTRAINT `tahta_pertemuan_ibfk_1` FOREIGN KEY (`tahta_grup_id`) REFERENCES `tahta_grup` (`id`);

--
-- Ketidakleluasaan untuk tabel `tahta_setoran`
--
ALTER TABLE `tahta_setoran`
  ADD CONSTRAINT `tahta_setoran_ibfk_1` FOREIGN KEY (`pertemuan_id`) REFERENCES `tahta_pertemuan` (`id`),
  ADD CONSTRAINT `tahta_setoran_ibfk_2` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `tahta_setoran_ibfk_3` FOREIGN KEY (`juz_id`) REFERENCES `ref_juz_tahfidz` (`id`),
  ADD CONSTRAINT `tahta_setoran_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD CONSTRAINT `tahun_ajaran_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tahun_ajaran_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `target_koordinator_tahta`
--
ALTER TABLE `target_koordinator_tahta`
  ADD CONSTRAINT `target_koordinator_tahta_ibfk_1` FOREIGN KEY (`koordinator_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `target_koordinator_tahta_ibfk_2` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `target_koordinator_tahta_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`yayasan_id`) REFERENCES `yayasan` (`id`),
  ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`),
  ADD CONSTRAINT `unit_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `unit_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `unit_ibfk_5` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`),
  ADD CONSTRAINT `unit_ibfk_6` FOREIGN KEY (`yayasan_id`) REFERENCES `yayasan` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD CONSTRAINT `user_activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD CONSTRAINT `wali_murid_ibfk_1` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `ref_jenis_kelamin` (`id`),
  ADD CONSTRAINT `wali_murid_ibfk_2` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`);

--
-- Ketidakleluasaan untuk tabel `wali_murid_murid`
--
ALTER TABLE `wali_murid_murid`
  ADD CONSTRAINT `wali_murid_murid_ibfk_1` FOREIGN KEY (`wali_murid_id`) REFERENCES `wali_murid` (`id`),
  ADD CONSTRAINT `wali_murid_murid_ibfk_2` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`),
  ADD CONSTRAINT `wali_murid_murid_ibfk_3` FOREIGN KEY (`wali_murid_id`) REFERENCES `wali_murid` (`id`),
  ADD CONSTRAINT `wali_murid_murid_ibfk_4` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`);

--
-- Ketidakleluasaan untuk tabel `yayasan`
--
ALTER TABLE `yayasan`
  ADD CONSTRAINT `yayasan_ibfk_1` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`),
  ADD CONSTRAINT `yayasan_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `yayasan_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `yayasan_ibfk_4` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
