<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\MenuService;

class CheckMenuAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $allowedMenus = MenuService::getMenus();
        $currentPath = $request->path();

        // Cek apakah user memiliki akses ke menu ini
        $hasAccess = $allowedMenus->contains(function ($menu) use ($currentPath) {
            return str_contains($currentPath, trim($menu->url, '/'));
        });

        if (!$hasAccess) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
