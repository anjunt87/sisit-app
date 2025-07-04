<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportNonAkademik extends Model
{
    protected $table = 'raport_non_akademik';

    protected $fillable = [
        'murid_id',
        'periode_id',
        'sikap_spiritual',
        'sikap_sosial',
        'ekskul',
        'projek',
        'catatan',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
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

    // ========== ACCESSORS ==========
    public function getRingkasanAttribute()
    {
        return "Spiritual: {$this->sikap_spiritual}, Sosial: {$this->sikap_sosial}";
    }
}
