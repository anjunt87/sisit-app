<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Contoh: 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Tambahkan policy di sini jika ada
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Contoh Gate jika ingin mengatur hak akses per role
        Gate::define('akses-semua', function ($user) {
            return $user->role->kode === 'ADM'; // hanya admin
        });

        // Tambahkan Gate lain di sini sesuai kebutuhan
    }
}
