<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefJenisAbsensi extends Model
{
    use SoftDeletes;

    protected $table = 'ref_jenis_absensi';

    protected $fillable = [
        'kode',
        'nama',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function absensiSiswa()
    {
        return $this->hasMany(AbsensiSiswa::class, 'jenis_absensi_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return strtoupper($this->kode) . ' - ' . ucfirst($this->nama);
    }
}
