<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbsensiGuru extends Model
{
    protected $table = 'absensi_guru';

    protected $fillable = [
        'guru_id',
        'unit_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'durasi_kerja',
        'status',
        'keterangan',
        'latitude_masuk',
        'longitude_masuk',
        'latitude_pulang',
        'longitude_pulang',
        'foto_masuk',
        'foto_pulang',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam_masuk' => 'datetime:H:i',
        'jam_pulang' => 'datetime:H:i',
        'latitude_masuk' => 'float',
        'longitude_masuk' => 'float',
        'latitude_pulang' => 'float',
        'longitude_pulang' => 'float',
    ];

    // ========== ENUM ==========
    public const STATUS = [
        'hadir',
        'sakit',
        'izin',
        'alpha',
        'terlambat',
        'pulang_cepat',
    ];

    // ========== RELATIONS ==========
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // ========== ACCESSORS ==========
    public function getStatusLabelAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }

    // ========== SCOPES ==========
    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }

    public function scopeBulanTahun($query, $bulan, $tahun)
    {
        return $query->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
    }
}
