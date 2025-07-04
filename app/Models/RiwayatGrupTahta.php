<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatGrupTahta extends Model
{
    protected $table = 'riwayat_grup_tahta';

    protected $fillable = [
        'murid_id',
        'grup_id',
        'periode_id',
        'dari_tanggal',
        'sampai_tanggal',
        'catatan',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'dari_tanggal' => 'date',
        'sampai_tanggal' => 'date',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function grup()
    {
        return $this->belongsTo(TahtaGrup::class, 'grup_id');
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

    public function scopeGrup($query, $grupId)
    {
        return $query->where('grup_id', $grupId);
    }

    // ========== ACCESSORS ==========
    public function getRentangTanggalAttribute()
    {
        $dari = optional($this->dari_tanggal)->format('d M Y');
        $sampai = optional($this->sampai_tanggal)->format('d M Y');
        return "{$dari} s.d {$sampai}";
    }
}
