<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'murid_id',
        'tahun_lulus',
        'melanjutkan_ke',
        'kontak',
        'pekerjaan_sekarang',
    ];

    protected $casts = [
        'tahun_lulus' => 'integer',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    // ========== ACCESSORS ==========
    public function getTahunLulusFormattedAttribute()
    {
        return (string) $this->tahun_lulus;
    }

    // ========== SCOPES ==========
    public function scopeTahun($query, $tahun)
    {
        return $query->where('tahun_lulus', $tahun);
    }

    public function scopeCariKontak($query, $keyword)
    {
        return $query->where('kontak', 'like', "%$keyword%");
    }
}
