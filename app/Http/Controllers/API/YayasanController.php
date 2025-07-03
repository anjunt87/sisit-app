<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Yayasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class YayasanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $yayasans = Yayasan::with(['alamat', 'editor'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            $transformed = $yayasans->getCollection()->map(function ($y) {
                return [
                    'id' => $y->id,
                    'nama' => $y->nama,
                    'pimpinan' => $y->pimpinan,
                    'operator' => $y->operator,
                    'telp' => $y->telp,
                    'email' => $y->email,
                    'no_sk_menkumham' => $y->no_sk_menkumham,
                    'tgl_sk_menkumham' => formatTanggalIndonesia($y->tgl_sk_menkumham),
                    'alamat' => optional($y->alamat)->nama_jalan,
                    'is_active' => $y->is_active,
                    'logo_url' => $y->logo_url,
                    'created_at' => $y->created_at,
                    'updated_by' => optional($y->editor)->name,
                ];
            });

            return response()->json([
                'data' => $transformed,
                'current_page' => $yayasans->currentPage(),
                'last_page' => $yayasans->lastPage(),
                'per_page' => $yayasans->perPage(),
                'total' => $yayasans->total(),
                'next_page_url' => $yayasans->nextPageUrl(),
                'prev_page_url' => $yayasans->previousPageUrl(),
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat data yayasan', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memuat data yayasan'], 500);
        }
    }

    public function show($id)
    {
        try {
            $yayasan = Yayasan::with('alamat')->findOrFail($id);

            return response()->json(['data' => $yayasan]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Yayasan tidak ditemukan'], 404);
        } catch (\Exception $e) {
            Log::error('Gagal memuat detail yayasan', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memuat detail yayasan'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'pimpinan' => 'nullable|string|max:100',
                'operator' => 'nullable|string|max:100',
                'telp' => 'nullable|string|max:20',
                'fax' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:100',
                'website' => 'nullable|string|max:255',
                'alamat_id' => 'nullable|exists:alamat,id',
                'no_pendirian' => 'nullable|string|max:50',
                'tgl_pendirian' => 'nullable|date',
                'no_pengesahan' => 'nullable|string|max:100',
                'no_sk_menkumham' => 'nullable|string|max:100',
                'tgl_sk_menkumham' => 'nullable|date',
                'logo' => 'nullable|string|max:255',
                'is_active' => 'boolean',
            ]);

            $yayasan = Yayasan::create($validated);

            return response()->json([
                'message' => 'Yayasan berhasil ditambahkan',
                'data' => $yayasan
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan yayasan', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menambahkan yayasan'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $yayasan = Yayasan::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'pimpinan' => 'nullable|string|max:100',
                'operator' => 'nullable|string|max:100',
                'telp' => 'nullable|string|max:20',
                'fax' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:100',
                'website' => 'nullable|string|max:255',
                'alamat_id' => 'nullable|exists:alamat,id',
                'no_pendirian' => 'nullable|string|max:50',
                'tgl_pendirian' => 'nullable|date',
                'no_pengesahan' => 'nullable|string|max:100',
                'no_sk_menkumham' => 'nullable',
                'tgl_sk_menkumham' => 'nullable',
                'logo' => 'nullable|string|max:255',
                'is_active' => 'boolean',
            ]);

            $yayasan->update($validated);

            return response()->json([
                'message' => 'Yayasan berhasil diperbarui',
                'data' => $yayasan
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Yayasan tidak ditemukan'], 404);
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui yayasan', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memperbarui yayasan'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $yayasan = Yayasan::findOrFail($id);

            if ($yayasan->units()->exists()) {
                return response()->json([
                    'message' => 'Yayasan tidak dapat dihapus karena memiliki unit terkait'
                ], 400);
            }

            $yayasan->delete();

            return response()->json(['message' => 'Yayasan berhasil dihapus']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Yayasan tidak ditemukan'], 404);
        } catch (\Exception $e) {
            Log::error('Gagal menghapus yayasan', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menghapus yayasan'], 500);
        }
    }

    public function getDropdown()
    {
        try {
            $data = Yayasan::select('id', 'nama')
                ->where('is_active', true)
                ->orderBy('nama')
                ->get();

            return response()->json(['data' => $data]);
        } catch (\Exception $e) {
            Log::error('Gagal memuat daftar yayasan', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memuat data yayasan'], 500);
        }
    }
}
