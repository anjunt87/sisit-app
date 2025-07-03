<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = 'kelas';

    protected $fillable = [
        'unit_id',
        'tingkat',
        'kode',
        'nama',
        'wali_kelas_id',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ======================
    // RELATIONS
    // ======================

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ======================
    // SCOPES
    // ======================

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCari($query, $keyword)
    {
        return $query->where('nama', 'like', "%{$keyword}%")
                     ->orWhere('kode', 'like', "%{$keyword}%");
    }

    // ======================
    // ACCESSORS
    // ======================

    public function getLabelAttribute()
    {
        return "{$this->tingkat} - {$this->nama}";
    }
}
