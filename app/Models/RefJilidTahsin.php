<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefJilidTahsin extends Model
{
    use SoftDeletes;

    protected $table = 'ref_jilid_tahsin';

    protected $fillable = [
        'kode',
        'nama',
        'urutan',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function kenaikanJilidUsulan()
    {
        return $this->hasMany(KenaikanJilidAntrian::class, 'jilid_usulan_id');
    }

    public function kenaikanJilidSekarang()
    {
        return $this->hasMany(KenaikanJilidAntrian::class, 'jilid_sekarang_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUrutanNaik($query, $urutanSekarang)
    {
        return $query->where('urutan', '>', $urutanSekarang)->orderBy('urutan');
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->kode} - {$this->nama}";
    }
}
