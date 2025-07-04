<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    protected $table = 'absensi_siswa';

    protected $fillable = [
        'murid_id',
        'kelas_id',
        'periode_id',
        'tanggal',
        'jenis_absensi_id',
        'jam_masuk',
        'jam_pulang',
        'keterangan',
        'dicatat_oleh',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam_masuk' => 'datetime:H:i',
        'jam_pulang' => 'datetime:H:i',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function jenisAbsensi()
    {
        return $this->belongsTo(RefJenisAbsensi::class, 'jenis_absensi_id');
    }

    public function pencatat()
    {
        return $this->belongsTo(User::class, 'dicatat_oleh');
    }

    // ========== SCOPES ==========
    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }

    public function scopePeriodeAktif($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }
}
