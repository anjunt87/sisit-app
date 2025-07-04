<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefSubElemenProjek extends Model
{
    use SoftDeletes;

    protected $table = 'ref_sub_elemen_projek';

    protected $fillable = [
        'dimensi_id',
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
    public function dimensi()
    {
        return $this->belongsTo(RefDimensiProjek::class, 'dimensi_id');
    }

    public function nilaiProjek()
    {
        return $this->hasMany(NilaiProjekSiswa::class, 'sub_elemen_id');
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

    public function scopeByDimensi($query, $dimensiId)
    {
        return $query->where('dimensi_id', $dimensiId);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->kode} - {$this->nama}";
    }
}
