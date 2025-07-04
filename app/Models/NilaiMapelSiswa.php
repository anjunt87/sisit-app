<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiMapelSiswa extends Model
{
    protected $table = 'nilai_mapel_siswa';

    protected $fillable = [
        'murid_id',
        'mapel_id',
        'periode_id',
        'guru_id',
        'nilai_uh1',
        'nilai_uh2',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
        'nilai_pengetahuan',
        'nilai_keterampilan',
        'deskripsi_pengetahuan',
        'deskripsi_keterampilan',
        'catatan',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
        'nilai_uh1' => 'float',
        'nilai_uh2' => 'float',
        'nilai_uts' => 'float',
        'nilai_uas' => 'float',
        'nilai_akhir' => 'float',
        'nilai_pengetahuan' => 'float',
        'nilai_keterampilan' => 'float',
        'synced_at' => 'datetime',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
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
    public function getRerataUlanganAttribute(): ?float
    {
        $uh1 = $this->nilai_uh1 ?? 0;
        $uh2 = $this->nilai_uh2 ?? 0;
        return $uh1 || $uh2 ? round(($uh1 + $uh2) / 2, 2) : null;
    }

    public function getNilaiAkhirFormattedAttribute(): string
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
