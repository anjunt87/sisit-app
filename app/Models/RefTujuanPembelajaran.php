<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefTujuanPembelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'ref_tujuan_pembelajaran';

    protected $fillable = [
        'kode',
        'nama',
        'mapel_id',
        'fase',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== ENUM ==========
    public const FASE = ['A', 'B', 'C', 'D', 'E', 'F'];

    // ========== RELATIONS ==========
    public function mapel()
    {
        return $this->belongsTo(RefMataPelajaran::class, 'mapel_id');
    }

    // Opsional, jika Anda tambahkan relasi lingkup
    public function lingkupMateri()
    {
        return $this->belongsTo(RefLingkupMateri::class, 'lingkup_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFase($query, $fase)
    {
        return $query->where('fase', $fase);
    }

    public function scopeByMapel($query, $mapelId)
    {
        return $query->where('mapel_id', $mapelId);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->kode} - " . str($this->nama)->limit(50);
    }
}
