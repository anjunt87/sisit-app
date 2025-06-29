<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if request expects JSON (AJAX request)
            if ($request->expectsJson()) {
                return $this->authenticatedJson($request, Auth::user());
            }

            return $this->authenticated($request, Auth::user());
        }

        // Handle failed login
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Login gagal. Periksa kembali email/username dan password.',
                'errors' => [
                    'login' => ['Login gagal. Periksa kembali email/username dan password.']
                ]
            ], 422);
        }

        return back()->withErrors([
            'login' => 'Login gagal. Periksa kembali email/username dan password.',
        ])->onlyInput('login');
    }

    protected function authenticated(Request $request, $user)
    {
        switch ($user->role->kode) {
            case 'ADM':
                return redirect('/admin/dashboard');
            case 'GURU':
                return redirect('/guru/dashboard');
            case 'MURID':
                return redirect('/murid/dashboard');
            case 'WALI':
                return redirect('/wali/dashboard');
            default:
                return redirect('/dashboard');
        }
    }

    protected function authenticatedJson(Request $request, $user)
    {
        $redirectUrl = $this->getRedirectUrl($user);

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role->kode,
                'role_name' => $user->role->nama ?? $user->role->kode
            ],
            'redirect_url' => $redirectUrl
        ]);
    }

    private function getRedirectUrl($user)
    {
        switch ($user->role->kode) {
            case 'ADM':
                return '/admin/dashboard';
            case 'GURU':
                return '/guru/dashboard';
            case 'MURID':
                return '/murid/dashboard';
            case 'WALI':
                return '/wali/dashboard';
            default:
                return '/dashboard';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Anda telah logout.'
            ]);
        }

        return redirect('/login')->with('status', 'Anda telah logout.');
    }
}
