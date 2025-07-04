<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $table = 'jadwal_pelajaran';

    protected $fillable = [
        'kelas_id',
        'mapel_id',
        'guru_id',
        'hari',
        'jam_ke',
        'waktu_mulai',
        'waktu_selesai',
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime:H:i',
        'waktu_selesai' => 'datetime:H:i',
    ];

    // ========== ENUM ==========
    public const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    // ========== RELATIONS ==========
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // ========== SCOPES ==========
    public function scopeHari($query, $hari)
    {
        return $query->where('hari', $hari);
    }

    public function scopeKelasHari($query, $kelasId, $hari)
    {
        return $query->where('kelas_id', $kelasId)->where('hari', $hari);
    }

    // ========== ACCESSORS ==========
    public function getJamLabelAttribute()
    {
        return "Jam ke-{$this->jam_ke} ({$this->waktu_mulai} - {$this->waktu_selesai})";
    }
}
