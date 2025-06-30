<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->truncate();
        DB::table('menu_role')->truncate();

        $menus = [
            [
                'id' => 1,
                'label' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'url' => '/dashboard',
                'parent_id' => null,
                'is_active' => 1,
                'urutan' => 1,
                'roles' => [1, 2, 3, 4], // admin, guru, murid, wali
            ],
            [
                'id' => 2,
                'label' => 'Data Master',
                'icon' => 'fas fa-database',
                'url' => '#',
                'parent_id' => null,
                'is_active' => 1,
                'urutan' => 2,
                'roles' => [1],
            ],
            [
                'id' => 3,
                'label' => 'Data Siswa',
                'icon' => 'far fa-circle',
                'url' => '/master/siswa',
                'parent_id' => 2,
                'is_active' => 1,
                'urutan' => 1,
                'roles' => [1],
            ],
            [
                'id' => 4,
                'label' => 'Data Guru',
                'icon' => 'far fa-circle',
                'url' => '/master/guru',
                'parent_id' => 2,
                'is_active' => 1,
                'urutan' => 2,
                'roles' => [1],
            ],
            [
                'id' => 5,
                'label' => 'Tahfidz & Tahsin',
                'icon' => 'fas fa-quran',
                'url' => '#',
                'parent_id' => null,
                'is_active' => 1,
                'urutan' => 3,
                'roles' => [1, 2],
            ],
            [
                'id' => 6,
                'label' => 'Setoran Hafalan',
                'icon' => 'far fa-circle',
                'url' => '/tahfidz/setoran',
                'parent_id' => 5,
                'is_active' => 1,
                'urutan' => 1,
                'roles' => [1, 2],
            ],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert([
                'id' => $menu['id'],
                'label' => $menu['label'],
                'icon' => $menu['icon'],
                'url' => $menu['url'],
                'parent_id' => $menu['parent_id'],
                'is_active' => $menu['is_active'],
                'urutan' => $menu['urutan'],
                'created_at' => now(),
            ]);

            foreach ($menu['roles'] as $role_id) {
                DB::table('menu_role')->insert([
                    'menu_id' => $menu['id'],
                    'role_id' => $role_id,
                ]);
            }
        }
    }
}
