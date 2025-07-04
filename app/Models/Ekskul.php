<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ekskul extends Model
{
    use SoftDeletes;

    protected $table = 'ekskul';

    protected $fillable = [
        'unit_id',
        'nama',
        'pembimbing_id',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function pembimbing()
    {
        return $this->belongsTo(Guru::class, 'pembimbing_id');
    }

    public function nilaiSiswa()
    {
        return $this->hasMany(NilaiEkskulSiswa::class, 'ekskul_id');
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

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->nama} - " . optional($this->pembimbing)->nama;
    }
}
