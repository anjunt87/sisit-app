<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get roles with pagination
            $roles = Role::select('id', 'kode', 'nama', 'deskripsi', 'permissions', 'is_active', 'created_at')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // Transform data to ensure proper format
            $transformedRoles = $roles->getCollection()->map(function ($role) {
                return [
                    'id' => $role->id,
                    'kode' => $role->kode,
                    'nama' => $role->nama,
                    'deskripsi' => $role->deskripsi,
                    'permissions' => $role->permissions ?? [],
                    'is_active' => $role->is_active,
                    'created_at' => $role->created_at,
                ];
            });

            return response()->json([
                'data' => $transformedRoles,
                'current_page' => $roles->currentPage(),
                'last_page' => $roles->lastPage(),
                'per_page' => $roles->perPage(),
                'total' => $roles->total(),
                'next_page_url' => $roles->nextPageUrl(),
                'prev_page_url' => $roles->previousPageUrl(),
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat data roles', ['message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memuat data roles',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $role = Role::findOrFail($id);

            return response()->json([
                'data' => [
                    'id' => $role->id,
                    'kode' => $role->kode,
                    'nama' => $role->nama,
                    'deskripsi' => $role->deskripsi,
                    'permissions' => $role->permissions ?? [],
                    'is_active' => $role->is_active,
                    'created_at' => $role->created_at,
                ]
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Role tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Gagal memuat detail role', ['id' => $id, 'message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memuat detail role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        Log::info('Memasuki fungsi store role');

        try {
            Log::debug('Request payload:', $request->all());

            // Validasi input
            $validated = $request->validate([
                'kode' => 'required|string|max:10|unique:roles',
                'nama' => 'required|string|max:255',
                'deskripsi' => 'nullable|string|max:1000',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string|in:create,read,update,delete,manage_users,manage_roles,view_reports,system_config',
                'is_active' => 'boolean',
            ]);

            // Set default values
            $validated['is_active'] = $validated['is_active'] ?? true;
            $validated['permissions'] = $validated['permissions'] ?? [];

            // Simpan role
            $role = Role::create($validated);

            Log::info('Role berhasil dibuat', ['id' => $role->id]);

            return response()->json([
                'message' => 'Role berhasil ditambahkan',
                'data' => [
                    'id' => $role->id,
                    'kode' => $role->kode,
                    'nama' => $role->nama,
                    'deskripsi' => $role->deskripsi,
                    'permissions' => $role->permissions,
                    'is_active' => $role->is_active,
                ]
            ], 201);
        } catch (ValidationException $e) {
            Log::warning('Validasi gagal saat membuat role', $e->errors());
            return response()->json([
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan role', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json([
                'message' => 'Gagal menambahkan role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        Log::info('Memasuki fungsi update role', ['id' => $id]);

        try {
            $role = Role::findOrFail($id);

            Log::debug('Request payload:', $request->all());

            // Validasi input
            $validated = $request->validate([
                'kode' => 'required|string|max:10|unique:roles,kode,' . $id,
                'nama' => 'required|string|max:255',
                'deskripsi' => 'nullable|string|max:1000',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string|in:create,read,update,delete,manage_users,manage_roles,view_reports,system_config',
                'is_active' => 'boolean',
            ]);

            // Set default values
            $validated['permissions'] = $validated['permissions'] ?? [];

            // Update role
            $role->update($validated);

            Log::info('Role berhasil diperbarui', ['id' => $role->id]);

            return response()->json([
                'message' => 'Role berhasil diperbarui',
                'data' => [
                    'id' => $role->id,
                    'kode' => $role->kode,
                    'nama' => $role->nama,
                    'deskripsi' => $role->deskripsi,
                    'permissions' => $role->permissions,
                    'is_active' => $role->is_active,
                ]
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Role tidak ditemukan'
            ], 404);
        } catch (ValidationException $e) {
            Log::warning('Validasi gagal saat memperbarui role', $e->errors());
            return response()->json([
                'message' => 'Data tidak valid',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui role', ['id' => $id, 'message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memperbarui role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        Log::info('Memasuki fungsi destroy role', ['id' => $id]);

        try {
            $role = Role::findOrFail($id);

            // Check if role is being used by any users
            $usersCount = $role->users()->count();
            if ($usersCount > 0) {
                return response()->json([
                    'message' => "Role tidak dapat dihapus karena masih digunakan oleh {$usersCount} pengguna"
                ], 400);
            }

            $role->delete();

            Log::info('Role berhasil dihapus', ['id' => $id]);

            return response()->json([
                'message' => 'Role berhasil dihapus'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Role tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Gagal menghapus role', ['id' => $id, 'message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal menghapus role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available permissions list
     */
    public function getPermissions()
    {
        try {
            $permissions = [
                'create' => 'Create',
                'read' => 'Read',
                'update' => 'Update',
                'delete' => 'Delete',
                'manage_users' => 'Manage Users',
                'manage_roles' => 'Manage Roles',
                'view_reports' => 'View Reports',
                'system_config' => 'System Config',
            ];

            return response()->json([
                'data' => $permissions
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat permissions', ['message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memuat permissions',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get roles for dropdown/select purposes
     */
    public function getRolesForDropdown()
    {
        try {
            $roles = Role::select('id', 'kode', 'nama')
                ->where('is_active', true)
                ->orderBy('nama')
                ->get();

            return response()->json([
                'data' => $roles
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat roles untuk dropdown', ['message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memuat roles untuk dropdown',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}