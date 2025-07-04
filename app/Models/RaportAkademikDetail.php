<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportAkademikDetail extends Model
{
    protected $table = 'raport_akademik_detail';

    protected $fillable = [
        'raport_id',
        'tp_id',
        'opsi_nilai',
        'deskripsi',
    ];

    protected $casts = [
        // jika Anda ingin menambahkan enum opsional nilai, bisa cast ke string
        'opsi_nilai' => 'string',
    ];

    // ========== ENUM OPSIONAL ==========
    public const OPSI_NILAI = [
        'belum berkembang',
        'mulai berkembang',
        'berkembang sesuai harapan',
        'sangat baik',
    ];

    // ========== RELATIONS ==========
    public function raport()
    {
        return $this->belongsTo(RaportAkademik::class, 'raport_id');
    }

    public function tp()
    {
        return $this->belongsTo(RefTujuanPembelajaran::class, 'tp_id');
    }

    // ========== ACCESSORS ==========
    public function getOpsiNilaiFormattedAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->opsi_nilai));
    }

    public function getLabelAttribute()
    {
        return "{$this->tp->kode} - {$this->opsi_nilai_formatted}";
    }

    // ========== SCOPES ==========
    public function scopeByRaport($query, $raportId)
    {
        return $query->where('raport_id', $raportId);
    }

    public function scopeByTp($query, $tpId)
    {
        return $query->where('tp_id', $tpId);
    }
}
