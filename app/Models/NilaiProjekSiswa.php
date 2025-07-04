<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiProjekSiswa extends Model
{
    protected $table = 'nilai_projek_siswa';

    protected $fillable = [
        'murid_id',
        'periode_id',
        'projek_id',
        'dimensi_id',
        'sub_elemen_id',
        'opsi_nilai',
        'deskripsi',
        'catatan',
        'guru_id',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
        'synced_at' => 'datetime',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function projek()
    {
        return $this->belongsTo(Projek::class);
    }

    public function dimensi()
    {
        return $this->belongsTo(RefDimensiProjek::class, 'dimensi_id');
    }

    public function subElemen()
    {
        return $this->belongsTo(RefSubElemenProjek::class, 'sub_elemen_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ========== ENUM (opsional nilai) ==========
    public const OPSI_NILAI = ['belum berkembang', 'mulai berkembang', 'berkembang sesuai harapan', 'sangat baik'];

    // ========== ACCESSORS ==========
    public function getOpsiNilaiFormattedAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->opsi_nilai));
    }

    // ========== SCOPES ==========
    public function scopePeriode($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }

    public function scopeProjek($query, $projekId)
    {
        return $query->where('projek_id', $projekId);
    }

    public function scopeMurid($query, $muridId)
    {
        return $query->where('murid_id', $muridId);
    }
}
