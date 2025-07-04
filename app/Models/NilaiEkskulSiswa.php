<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiEkskulSiswa extends Model
{
    protected $table = 'nilai_ekskul_siswa';

    protected $fillable = [
        'murid_id',
        'periode_id',
        'ekskul_id',
        'nilai',
        'deskripsi',
        'catatan',
        'guru_id',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
        'nilai' => 'float',
        'synced_at' => 'datetime',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
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

    // ========== SCOPES ==========
    public function scopePeriode($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }

    public function scopeMurid($query, $muridId)
    {
        return $query->where('murid_id', $muridId);
    }

    public function scopeEkskul($query, $ekskulId)
    {
        return $query->where('ekskul_id', $ekskulId);
    }

    // ========== ACCESSORS ==========
    public function getLabelNilaiAttribute()
    {
        return number_format($this->nilai, 1) . ' - ' . ucfirst($this->deskripsi);
    }
}
