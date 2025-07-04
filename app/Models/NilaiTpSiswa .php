<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiTpSiswa extends Model
{
    protected $table = 'nilai_tp_siswa';

    protected $fillable = [
        'murid_id',
        'periode_id',
        'mapel_id',
        'tp_id',
        'lingkup_id',
        'opsi_nilai',
        'deskripsi',
        'catatan',
        'guru_id',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
        'synced_at' => 'datetime',
    ];

    // ========== ENUM OPSIONAL ==========
    public const OPSI_NILAI = [
        'belum berkembang',
        'mulai berkembang',
        'berkembang sesuai harapan',
        'sangat baik',
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

    public function tp()
    {
        return $this->belongsTo(RefTujuanPembelajaran::class, 'tp_id');
    }

    public function lingkup()
    {
        return $this->belongsTo(RefLingkupMateri::class, 'lingkup_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
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
    public function getOpsiNilaiFormattedAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->opsi_nilai));
    }

    public function getLabelAttribute()
    {
        return "TP: {$this->tp->kode} - {$this->opsi_nilai_formatted}";
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

    public function scopeTp($query, $tpId)
    {
        return $query->where('tp_id', $tpId);
    }
}
