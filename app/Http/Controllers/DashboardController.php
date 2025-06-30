<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roleKode = $user?->role?->kode;

        return match ($roleKode) {
            'ADM'   => redirect()->route('admin.dashboard'),
            'GURU'  => redirect()->route('guru.dashboard'),
            'MURID' => redirect()->route('murid.dashboard'),
            'WALI'  => redirect()->route('wali.dashboard'),
            default => abort(403, 'Role tidak dikenali atau tidak memiliki akses.'),
        };
    }
}
