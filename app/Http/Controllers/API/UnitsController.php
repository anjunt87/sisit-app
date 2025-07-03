<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Yayasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UnitsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $units = Unit::with('yayasan:id,nama')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            $data = $units->getCollection()->map(function ($unit) {
                return [
                    'id' => $unit->id,
                    'yayasan' => $unit->yayasan->nama ?? null,
                    'kode' => $unit->kode,
                    'nama' => $unit->nama,
                    'jenjang' => $unit->jenjang,
                    'email' => $unit->email,
                    'no_hp' => $unit->no_hp,
                    'website' => $unit->website,
                    'kepala' => $unit->kepala,
                    'is_active' => $unit->is_active,
                    'created_at' => $unit->created_at,
                ];
            });

            return response()->json([
                'data' => $data,
                'current_page' => $units->currentPage(),
                'last_page' => $units->lastPage(),
                'per_page' => $units->perPage(),
                'total' => $units->total(),
                'next_page_url' => $units->nextPageUrl(),
                'prev_page_url' => $units->previousPageUrl(),
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat data unit', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memuat data unit'], 500);
        }
    }

    public function show($id)
    {
        try {
            $unit = Unit::with('yayasan', 'alamat')->findOrFail($id);

            return response()->json([
                'data' => [
                    'id' => $unit->id,
                    'yayasan_id' => $unit->yayasan_id,
                    'kode' => $unit->kode,
                    'nama' => $unit->nama,
                    'jenjang' => $unit->jenjang,
                    'alamat_id' => $unit->alamat_id,
                    'email' => $unit->email,
                    'no_hp' => $unit->no_hp,
                    'website' => $unit->website,
                    'kepala' => $unit->kepala,
                    'logo' => $unit->logo,
                    'is_active' => $unit->is_active,
                    'created_at' => $unit->created_at,
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat detail unit', ['id' => $id, 'message' => $e->getMessage()]);
            return response()->json(['message' => 'Unit tidak ditemukan'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'yayasan_id' => 'required|exists:yayasan,id',
                'kode' => 'required|string|max:20|unique:unit',
                'nama' => 'required|string|max:255',
                'jenjang' => 'required|in:pg,tk,sdit,smpit,smait',
                'alamat_id' => 'nullable|exists:alamat,id',
                'email' => 'nullable|email|max:100',
                'no_hp' => 'nullable|string|max:20',
                'website' => 'nullable|string|max:255',
                'kepala' => 'nullable|string|max:100',
                'logo' => 'nullable|string|max:255',
                'is_active' => 'boolean',
            ]);

            $unit = Unit::create($validated);

            return response()->json([
                'message' => 'Unit berhasil ditambahkan',
                'data' => $unit
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan unit', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menambahkan unit'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $unit = Unit::findOrFail($id);

            $validated = $request->validate([
                'yayasan_id' => 'required|exists:yayasan,id',
                'kode' => 'required|string|max:20|unique:unit,kode,' . $id,
                'nama' => 'required|string|max:255',
                'jenjang' => 'required|in:pg,tk,sdit,smpit,smait',
                'alamat_id' => 'nullable|exists:alamat,id',
                'email' => 'nullable|email|max:100',
                'no_hp' => 'nullable|string|max:20',
                'website' => 'nullable|string|max:255',
                'kepala' => 'nullable|string|max:100',
                'logo' => 'nullable|string|max:255',
                'is_active' => 'boolean',
            ]);

            $unit->update($validated);

            return response()->json([
                'message' => 'Unit berhasil diperbarui',
                'data' => $unit
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui unit', ['id' => $id, 'message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memperbarui unit'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $unit = Unit::findOrFail($id);

            if ($unit->users()->count() > 0) {
                return response()->json([
                    'message' => 'Unit tidak dapat dihapus karena masih digunakan oleh pengguna'
                ], 400);
            }

            $unit->delete();

            return response()->json(['message' => 'Unit berhasil dihapus']);
        } catch (\Exception $e) {
            Log::error('Gagal menghapus unit', ['id' => $id, 'message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menghapus unit'], 500);
        }
    }

    /**
     * Ambil unit aktif untuk dropdown
     */
    public function getUnitsForDropdown()
    {
        try {
            $units = Unit::select('id', 'nama')
                ->aktif()
                ->orderBy('nama')
                ->get();

            return response()->json(['data' => $units]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat units untuk dropdown', ['message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memuat unit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getYayasanForDropdown()
    {
        try {
            $yayasan = Yayasan::select('id', 'nama')
                ->orderBy('nama')
                ->get();

            return response()->json(['data' => $yayasan]);
        } catch (\Exception $e) {
            Log::error('Gagal mengambil yayasan untuk dropdown', ['message' => $e->getMessage()]);
            return response()->json([
                'message' => 'Gagal memuat daftar yayasan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
