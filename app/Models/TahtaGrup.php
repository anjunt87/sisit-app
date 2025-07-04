<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahtaGrup extends Model
{
    use SoftDeletes;

    protected $table = 'tahta_grup';

    protected $fillable = [
        'unit_id',
        'periode_id',
        'nama',
        'kode',
        'pengampu_id',      // biasanya guru tahfidz/tahsin
        'jenis',            // tahfidz / tahsin
        'catatan',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== ENUM JENIS ==========
    public const JENIS = ['tahfidz', 'tahsin'];

    // ========== RELATIONS ==========
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function pengampu()
    {
        return $this->belongsTo(Guru::class, 'pengampu_id');
    }

    public function riwayat()
    {
        return $this->hasMany(RiwayatGrupTahta::class, 'grup_id');
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

    public function scopeJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    public function scopeByUnitPeriode($query, $unitId, $periodeId)
    {
        return $query->where('unit_id', $unitId)->where('periode_id', $periodeId);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->kode} - {$this->nama}";
    }
}
