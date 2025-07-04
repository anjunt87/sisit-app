<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefJuzTahfidz extends Model
{
    use SoftDeletes;

    protected $table = 'ref_juz_tahfidz';

    protected $fillable = [
        'nomor',
        'nama',
        'jumlah_halaman',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'nomor' => 'integer',
        'jumlah_halaman' => 'integer',
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function raportTahfidzDetail()
    {
        return $this->hasMany(RaportTahfidzDetail::class, 'juz_id');
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

    public function scopeUrutAsc($query)
    {
        return $query->orderBy('nomor');
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "Juz {$this->nomor} - {$this->nama}";
    }
}
