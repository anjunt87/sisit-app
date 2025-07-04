<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefLingkupMateri extends Model
{
    use SoftDeletes;

    protected $table = 'ref_lingkup_materi';

    protected $fillable = [
        'nama',
        'mapel_id',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function mapel()
    {
        return $this->belongsTo(RefMataPelajaran::class, 'mapel_id');
    }

    public function tujuanPembelajaran()
    {
        return $this->hasMany(RefTujuanPembelajaran::class, 'lingkup_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByMapel($query, $mapelId)
    {
        return $query->where('mapel_id', $mapelId);
    }

    // ========== ACCESSORS ==========
    public function getNamaSingkatAttribute()
    {
        return str()->limit($this->nama, 40);
    }
}
