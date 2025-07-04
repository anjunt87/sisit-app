<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportAkademik extends Model
{
    protected $table = 'raport_akademik';

    protected $fillable = [
        'murid_id',
        'periode_id',
        'mapel_id',
        'nilai_akhir',
        'nilai_pengetahuan',
        'nilai_keterampilan',
        'deskripsi_pengetahuan',
        'deskripsi_keterampilan',
        'predikat',
        'kkm',
        'catatan',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
        'nilai_akhir' => 'float',
        'nilai_pengetahuan' => 'float',
        'nilai_keterampilan' => 'float',
        'kkm' => 'float',
        'synced_at' => 'datetime',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ========== ACCESSORS ==========
    public function getPredikatLabelAttribute()
    {
        return strtoupper($this->predikat ?? '-');
    }

    public function getNilaiAkhirFormattedAttribute()
    {
        return number_format($this->nilai_akhir ?? 0, 1);
    }

    // ========== SCOPES ==========
    public function scopePeriode($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }

    public function scopeMurid($query, $muridId)
    {
        return $query->where('murid_id', $muridId);
    }

    public function scopeMapel($query, $mapelId)
    {
        return $query->where('mapel_id', $mapelId);
    }
}
