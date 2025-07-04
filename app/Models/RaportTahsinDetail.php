<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportTahsinDetail extends Model
{
    protected $table = 'raport_tahsin_detail';

    protected $fillable = [
        'raport_id',
        'jilid_id',
        'halaman_terakhir',
        'opsi_nilai',
        'deskripsi',
    ];

    protected $casts = [
        'halaman_terakhir' => 'integer',
    ];

    // ========== ENUM OPSI NILAI ==========
    public const OPSI_NILAI = [
        'belum lancar',
        'cukup lancar',
        'lancar',
        'mutqin',
    ];

    // ========== RELATIONS ==========
    public function raport()
    {
        return $this->belongsTo(RaportTahfidzTahsin::class, 'raport_id');
    }

    public function jilid()
    {
        return $this->belongsTo(RefJilidTahsin::class, 'jilid_id');
    }

    // ========== ACCESSORS ==========
    public function getOpsiNilaiFormattedAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->opsi_nilai));
    }

    public function getLabelAttribute()
    {
        return optional($this->jilid)->nama . ' - ' . $this->opsi_nilai_formatted . ' (Hal. ' . $this->halaman_terakhir . ')';
    }

    // ========== SCOPES ==========
    public function scopeByRaport($query, $raportId)
    {
        return $query->where('raport_id', $raportId);
    }

    public function scopeByJilid($query, $jilidId)
    {
        return $query->where('jilid_id', $jilidId);
    }
}
