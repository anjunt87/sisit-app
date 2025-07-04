<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportTahfidzTahsin extends Model
{
    protected $table = 'raport_tahfidz_tahsin';

    protected $fillable = [
        'murid_id',
        'periode_id',
        'unit_id',
        'jilid_terakhir_id',
        'halaman_terakhir',
        'catatan_tahfidz',
        'catatan_tahsin',
        'created_by',
        'updated_by',
        'synced_at',
    ];

    protected $casts = [
        'halaman_terakhir' => 'integer',
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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function jilidTerakhir()
    {
        return $this->belongsTo(RefJilidTahsin::class, 'jilid_terakhir_id');
    }

    public function detail()
    {
        return $this->hasMany(RaportTahfidzDetail::class, 'raport_id');
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

    public function scopeUnit($query, $unitId)
    {
        return $query->where('unit_id', $unitId);
    }

    // ========== ACCESSORS ==========
    public function getRingkasanAttribute()
    {
        return "Jilid: " . optional($this->jilidTerakhir)->nama . ", Hal: " . $this->halaman_terakhir;
    }
}
