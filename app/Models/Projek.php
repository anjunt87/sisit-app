<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projek extends Model
{
    use SoftDeletes;

    protected $table = 'projek';

    protected $fillable = [
        'unit_id',
        'periode_id',
        'nama',
        'tema',
        'tujuan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function nilai()
    {
        return $this->hasMany(NilaiProjekSiswa::class, 'projek_id');
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
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByUnit($query, $unitId)
    {
        return $query->where('unit_id', $unitId);
    }

    public function scopeByPeriode($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->nama} ({$this->tema})";
    }
}
