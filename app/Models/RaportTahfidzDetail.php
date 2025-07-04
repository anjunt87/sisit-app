<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportTahfidzDetail extends Model
{
    protected $table = 'raport_tahfidz_detail';

    protected $fillable = [
        'raport_id',
        'juz_id',
        'opsi_nilai',
        'deskripsi',
    ];

    // ========== ENUM OPSI_NILAI (opsional jika digunakan sistem predikat) ==========
    public const OPSI_NILAI = [
        'belum hafal',
        'mulai hafal',
        'hafal lancar',
        'hafal mutqin',
    ];

    // ========== RELATIONS ==========
    public function raport()
    {
        return $this->belongsTo(RaportTahfidzTahsin::class, 'raport_id');
    }

    public function juz()
    {
        return $this->belongsTo(RefJuzTahfidz::class, 'juz_id');
    }

    // ========== ACCESSORS ==========
    public function getOpsiNilaiFormattedAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->opsi_nilai));
    }

    public function getLabelAttribute()
    {
        return "Juz {$this->juz->nomor} - {$this->opsi_nilai_formatted}";
    }

    // ========== SCOPES ==========
    public function scopeByRaport($query, $raportId)
    {
        return $query->where('raport_id', $raportId);
    }

    public function scopeByJuz($query, $juzId)
    {
        return $query->where('juz_id', $juzId);
    }
}
