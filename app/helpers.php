<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Periode;
use App\Models\AppSetting;
use App\Models\User;


// /**
//  * Redirect ke dashboard sesuai role user.
//  *
//  * @return string
//  */
// function redirectToRoleDashboard(): string
// {
//     $role = Auth::user()?->role?->kode;

//     return match ($role) {
//         'ADM'   => '/admin/dashboard',
//         'GURU'  => '/guru/dashboard',
//         'MURID' => '/murid/dashboard',
//         'WALI'  => '/wali/dashboard',
//         default => '/403',
//     };
// }


/**
 * Ambil ID Periode yang aktif.
 *
 * @return int|null
 */
function aktifPeriodeId(): ?int
{
    return Periode::where('is_active', 1)->value('id');
}

/**
 * Cek apakah user saat ini memiliki role tertentu.
 *
 * @param string $kodeRole
 * @return bool
 */
function isRole(string $kodeRole): bool
{
    return Auth::check() && Auth::user()->role->kode === $kodeRole;
}

/**
 * Cek apakah user adalah tipe tertentu.
 *
 * @param string $tipeUser (misalnya: 'guru', 'murid')
 * @return bool
 */
function isTipeUser(string $tipeUser): bool
{
    return Auth::check() && Auth::user()->tipe_user === $tipeUser;
}

/**
 * Format tanggal dalam format Indonesia.
 *
 * @param string|\Carbon\Carbon|null $tanggal
 * @param bool $tampilkanHari
 * @return string|null
 */
function formatTanggalIndonesia($tanggal, bool $tampilkanHari = false): ?string
{
    if (!$tanggal) return null;

    $tanggal = \Carbon\Carbon::parse($tanggal);

    $namaHari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];

    $namaBulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $hari = $tampilkanHari ? $namaHari[$tanggal->format('l')] . ', ' : '';
    $tanggalStr = $hari . $tanggal->format('d') . ' ' . $namaBulan[(int)$tanggal->format('m')] . ' ' . $tanggal->format('Y');

    return $tanggalStr;
}

/**
 * Ambil nilai setting berdasarkan key.
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function getSetting(string $key, $default = null): mixed
{
    return Cache::remember("setting:$key", 60, function () use ($key, $default) {
        return optional(AppSetting::where('key', $key)->first())->value ?? $default;
    });
}

/**
 * Cek apakah user punya permission tertentu (dengan null safety).
 *
 * @param string $permission
 * @return bool
 */
// function checkPermission(string $permission): bool
// {
//     $user = auth()->user();

//     if (!$user) {
//         return false;
//     }

//     return Gate::forUser($user)->allows($permission);
// }
