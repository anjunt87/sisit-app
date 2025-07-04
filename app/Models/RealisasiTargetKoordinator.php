<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealisasiTargetKoordinator extends Model
{
    protected $table = 'realisasi_target_koordinator';

    protected $fillable = [
        'user_id',
        'periode_id',
        'target',
        'realisasi',
        'satuan',
        'bobot',
        'nilai_akhir',
        'keterangan',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'target' => 'float',
        'realisasi' => 'float',
        'bobot' => 'float',
        'nilai_akhir' => 'float',
    ];

    // ========== RELATIONS ==========
    public function user()
    {
        return $this->belongsTo(User::class);
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
    public function getLabelAttribute()
    {
        return "{$this->target} {$this->satuan} → {$this->realisasi} ({$this->nilai_akhir}%)";
    }

    // ========== SCOPES ==========
    public function scopePeriode($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }

    public function scopeUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
