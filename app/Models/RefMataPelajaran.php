<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefMataPelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'ref_mata_pelajaran';

    protected $fillable = [
        'kode',
        'nama',
        'kelompok',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== ENUM ==========
    public const KELOMPOK = ['A', 'B', 'C'];

    // ========== RELATIONS ==========
    public function mapel()
    {
        return $this->hasMany(MataPelajaran::class, 'ref_mata_pelajaran_id');
    }

    public function tujuanPembelajaran()
    {
        return $this->hasMany(RefTujuanPembelajaran::class, 'mapel_id');
    }

    public function lingkupMateri()
    {
        return $this->hasMany(RefLingkupMateri::class, 'mapel_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeKelompok($query, $kelompok)
    {
        return $query->where('kelompok', $kelompok);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->nama} ({$this->kode})";
    }
}
