<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Unit;
use App\Models\Profil;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get users with pagination and relationships
            $users = User::with(['role', 'unit', 'profil'])
                ->select('id', 'username', 'email', 'role_id', 'unit_id', 'profil_id', 'tipe_user', 'is_active')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // Transform data to include role, unit, and profil names
            $transformedUsers = $users->getCollection()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role_id' => $user->role_id,
                    'unit_id' => $user->unit_id,
                    'profil_id' => $user->profil_id,
                    'tipe_user' => $user->tipe_user,
                    'is_active' => $user->is_active,
                    'role_name' => $user->role ? $user->role->nama : null,
                    'unit_name' => $user->unit ? $user->unit->nama : null,
                    'profil_name' => $user->profil ? $user->profil->nama_lengkap : null,
                ];
            });

            return response()->json([
                'data' => $transformedUsers,
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'per_page' => $users->perPage(),
                'total' => $users->total(),
                'next_page_url' => $users->nextPageUrl(),
                'prev_page_url' => $users->previousPageUrl(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memuat data pengguna',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getRolesAndUnits()
    {
        $roles = Role::select('id', 'nama')->get();
        $units = Unit::select('id', 'nama')->get();
        $profils = Profil::select('id', 'nama_lengkap')->get();

        return response()->json([
            'roles' => $roles,
            'units' => $units,
            'profils' => $profils,
        ]);
    }

    public function show($id)
    {
        try {
            $user = User::with(['role', 'unit', 'profil'])->findOrFail($id);

            return response()->json([
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role_id' => $user->role_id,
                    'unit_id' => $user->unit_id,
                    'profil_id' => $user->profil_id,
                    'tipe_user' => $user->tipe_user,
                    'is_active' => $user->is_active,
                    'role_name' => optional($user->role)->nama,
                    'unit_name' => optional($user->unit)->nama,
                    'profil_name' => optional($user->profil)->nama_lengkap,

                ]
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }
    }

    // public function store(Request $request)
    // {
    //     // Catat bahwa fungsi store terpanggil
    //     Log::info('Memasuki fungsi store user');

    //     try {
    //         // Catat payload masuk
    //         Log::debug('Request payload:', $request->all());

    //         // Validasi input
    //         $validated = $request->validate([
    //             'username' => 'required|string|max:255|unique:users',
    //             'email' => 'required|email|max:255|unique:users',
    //             'password' => 'required|string|min:6|confirmed',
    //             'role_id' => 'required|exists:roles,id',
    //             'unit_id' => 'required|exists:unit,id',
    //             'tipe_user' => 'required|in:admin,guru,staff,murid,wali_murid',
    //             'profil_id' => 'nullable|exists:profils,id',
    //             'is_active' => 'boolean',
    //         ]);

    //         $validated['password'] = Hash::make($validated['password']);
    //         $validated['is_active'] = $validated['is_active'] ?? true;

    //         // Simpan user
    //         $user = User::create($validated);

    //         Log::info('User berhasil dibuat', ['id' => $user->id]);

    //         $user->load(['role', 'unit', 'profil']);

    //         return response()->json([
    //             'message' => 'User berhasil ditambahkan',
    //             'data' => [
    //                 'id' => $user->id,
    //                 'username' => $user->username,
    //                 'email' => $user->email,
    //                 'role_id' => $user->role_id,
    //                 'unit_id' => $user->unit_id,
    //                 'profil_id' => $user->profil_id,
    //                 'tipe_user' => $user->tipe_user,
    //                 'is_active' => $user->is_active,
    //                 'role_name' => optional($user->role)->nama,
    //                 'unit_name' => optional($user->unit)->nama,
    //                 'profil_name' => optional($user->profil)->nama_lengkap,
    //             ]
    //         ], 201);
    //     } catch (ValidationException $e) {
    //         Log::warning('Validasi gagal saat membuat user', $e->errors());
    //         return response()->json([
    //             'message' => 'Data tidak valid',
    //             'errors' => $e->errors()
    //         ], 422);
    //     } catch (\Exception $e) {
    //         Log::error('Gagal menyimpan user', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
    //         return response()->json([
    //             'message' => 'Gagal menambahkan user',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function store(Request $request)
    {
        Log::info('Memasuki fungsi store user');

        try {
            Log::debug('Request payload:', $request->all());

            // Validasi input
            $validated = $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role_id' => 'required|exists:roles,id',
                'unit_id' => 'required|exists:unit,id',
                'tipe_user' => 'required|in:admin,guru,staff,murid,wali_murid',
                'is_active' => 'boolean',
                // Profil related
                'nama_lengkap' => 'required|string|max:255',
                'no_hp' => 'nullable|string|max:20',
            ]);

            // Buat profil terlebih dahulu
            $profil = \App\Models\Profil::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'no_hp' => $validated['no_hp'] ?? null,
                'email' => $validated['email'], // sinkron dengan email user
            ]);

            // Siapkan data user
            $userData = $validated;
            $userData['password'] = Hash::make($validated['password']);
            $userData['is_active'] = $validated['is_active'] ?? true;
            $userData['profil_id'] = $profil->id;

            // Simpan user
            $user = User::create($userData);

            Log::info('User berhasil dibuat', ['id' => $user->id]);

            $user->load(['role', 'unit', 'profil']);

            return response()->json([
                'message' => 'User berhasil ditambahkan',
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role_id' => $user->role_id,
                    'unit_id' => $user->unit_id,
                    'profil_id' => $user->profil_id,
                    'tipe_user' => $user->tipe_user,
                    'is_active' => $user->is_active,
                    'role_name' => optional($user->role)->nama,
                    'unit_name' => optional($user->unit)->nama,
                    'profil_name' => optional($user->profil)->nama_lengkap,
                ]
            ], 201);
        } catch (ValidationException $e) {
            Log::warning('Validasi gagal saat membuat user', $e->errors());
            return response()->json([
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan user', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json([
                'message' => 'Gagal menambahkan user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Validasi input
            $validated = $request->validate([
                'username' => 'required|string|max:50|unique:users,username,' . $id,
                'email' => 'required|email|max:100|unique:users,email,' . $id,
                'tipe_user' => 'required|in:admin,guru,staff,murid,wali_murid',
                'role_id' => 'required|exists:roles,id',
                'unit_id' => 'required|exists:unit,id',
                'is_active' => 'boolean',
                'password' => 'nullable|string|min:6|confirmed',

                // Profil
                'nama_lengkap' => 'required|string|max:255',
                'no_hp' => 'nullable|string|max:20',
            ]);

            // Hash password jika diisi
            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            // Update profil
            if ($user->profil) {
                $user->profil->update([
                    'nama_lengkap' => $validated['nama_lengkap'],
                    'no_hp' => $validated['no_hp'] ?? null,
                    'email' => $validated['email'], // sinkronisasi email
                ]);
            } else {
                // Buat profil baru jika belum ada
                $profil = \App\Models\Profil::create([
                    'nama_lengkap' => $validated['nama_lengkap'],
                    'no_hp' => $validated['no_hp'] ?? null,
                    'email' => $validated['email'],
                ]);
                $user->profil_id = $profil->id;
            }

            // Update user
            $user->update($validated);

            // Muat relasi
            $user->load(['role', 'unit', 'profil']);

            return response()->json([
                'message' => 'User berhasil diperbarui',
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'tipe_user' => $user->tipe_user,
                    'role_id' => $user->role_id,
                    'unit_id' => $user->unit_id,
                    'is_active' => $user->is_active,
                    'profil_id' => $user->profil_id,
                    'profil_name' => optional($user->profil)->nama_lengkap,
                    'profil_no_hp' => optional($user->profil)->no_hp,
                    'role_name' => optional($user->role)->nama,
                    'unit_name' => optional($user->unit)->nama,
                ]
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'message' => 'User berhasil dihapus'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
