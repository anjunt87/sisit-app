<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefDimensiProjek extends Model
{
    use SoftDeletes;

    protected $table = 'ref_dimensi_projek';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function subElemen()
    {
        return $this->hasMany(RefSubElemenProjek::class, 'dimensi_id');
    }

    public function nilaiProjek()
    {
        return $this->hasMany(NilaiProjekSiswa::class, 'dimensi_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->kode} - {$this->nama}";
    }
}
