<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'unit_id',
        'ref_mata_pelajaran_id',
        'kkm',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'kkm' => 'float',
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function ref()
    {
        return $this->belongsTo(RefMataPelajaran::class, 'ref_mata_pelajaran_id');
    }

    public function nilaiMapelSiswa()
    {
        return $this->hasMany(NilaiMapelSiswa::class, 'mapel_id');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalPelajaran::class, 'mapel_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByUnit($query, $unitId)
    {
        return $query->where('unit_id', $unitId);
    }

    // ========== ACCESSORS ==========
    public function getNamaLengkapAttribute()
    {
        return optional($this->ref)->nama . ' (KKM: ' . $this->kkm . ')';
    }
}
