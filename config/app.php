<?php

return [

    // Nama aplikasi, diambil dari .env APP_NAME
    'name' => env('APP_NAME', 'Laravel'),

    // Lingkungan aplikasi: production / local / staging
    'env' => env('APP_ENV', 'production'),

    // Mode debug: true akan tampilkan error detail, false tampilkan error umum
    'debug' => (bool) env('APP_DEBUG', false),

    // URL dasar aplikasi, digunakan saat generate link
    'url' => env('APP_URL', 'http://localhost'),

    // URL aset statis (misal gambar, js, css), bisa kosong
    'asset_url' => env('ASSET_URL'),

    // Zona waktu default PHP & database
    'timezone' => 'UTC',

    // Bahasa default aplikasi
    'locale' => env('APP_LOCALE', 'en'),

    // Bahasa fallback jika tidak tersedia terjemahan
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    // Lokalisasi faker (untuk seeder)
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    // Kunci enkripsi aplikasi, harus 32 karakter
    'key' => env('APP_KEY'),

    // Algoritma enkripsi
    'cipher' => 'AES-256-CBC',

    // Kunci lama jika pernah ganti APP_KEY
    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    // Konfigurasi maintenance mode (driver: file atau cache)
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    // ⬇️ Daftar semua Service Provider yang akan di-load oleh Laravel
    'providers' => [

        /*
        |--------------------------------------------------------------------------
        | Laravel Framework Service Providers
        |--------------------------------------------------------------------------
        */

        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
        |--------------------------------------------------------------------------
        | Package Service Providers
        |--------------------------------------------------------------------------
        */
        // ⬅️ Tambahkan service provider dari package pihak ketiga di sini

        /*
        |--------------------------------------------------------------------------
        | Application Service Providers
        |--------------------------------------------------------------------------
        */
        // ⬇️ Provider buatan sendiri (otomatis disediakan Laravel)

        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class, // ✅ WAJIB untuk mengaktifkan route API/web
    ],

    // ⬇️ Alias untuk mempermudah penggunaan facade di seluruh Laravel app
    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'Date' => Illuminate\Support\Facades\Date::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'RateLimiter' => Illuminate\Support\Facades\RateLimiter::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
    ],

];
