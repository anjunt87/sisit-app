<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Menu;
use App\Models\PenugasanGuru;

class MenuService
{
    /**
     * Ambil semua menu yang diizinkan untuk user saat ini
     */
    public static function getMenus()
    {
        $user = Auth::user();

        $menus = Menu::where('is_active', 1)
            ->whereHas('roles', fn($q) => $q->where('id', $user->role_id))
            ->orderBy('urutan')
            ->get()
            ->filter(function ($menu) {
                return is_null($menu->permission_name) || Gate::allows($menu->permission_name);
            });

        // Tambahkan menu berdasarkan tugas guru
        if ($user->tipe_user === 'guru') {
            $tugas = PenugasanGuru::where('guru_id', $user->profil_id)
                ->where('periode_id', self::getAktifPeriodeId())
                ->get();

            $isWaliKelas = $tugas->where('jenis_penugasan_id', self::getJenisPenugasanId('wali_kelas'))->isNotEmpty();

            if ($isWaliKelas) {
                $menus->push((object)[
                    'id' => 999,
                    'label' => 'Manajemen Kelas Saya',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'url' => '/guru/kelas-saya',
                    'parent_id' => null,
                ]);
            }
        }

        return $menus;
    }

    /**
     * Ambil menu yang sudah dikelompokkan berdasarkan parent-child
     */
    public static function getMenusGrouped()
    {
        $flatMenus = self::getMenus();
        $grouped = [];

        foreach ($flatMenus as $menu) {
            if ($menu->parent_id) {
                $grouped[$menu->parent_id]['children'][] = $menu;
            } else {
                $grouped[$menu->id]['menu'] = $menu;
                $grouped[$menu->id]['children'] = [];
            }
        }

        return $grouped;
    }

    protected static function getAktifPeriodeId()
    {
        return optional(\App\Models\Periode::where('is_active', 1)->first())->id;
    }

    protected static function getJenisPenugasanId($kode)
    {
        return optional(\App\Models\RefJenisPenugasan::where('kode', $kode)->first())->id;
    }
}
