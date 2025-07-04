<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupervisiGuruDetail extends Model
{
    protected $table = 'supervisi_guru_detail';

    protected $fillable = [
        'supervisi_id',
        'aspek_id',
        'skor',
        'deskripsi',
    ];

    protected $casts = [
        'skor' => 'float',
    ];

    // ========== RELATIONS ==========
    public function supervisi()
    {
        return $this->belongsTo(SupervisiGuru::class, 'supervisi_id');
    }

    public function aspek()
    {
        return $this->belongsTo(RefAspekSupervisi::class, 'aspek_id');
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return optional($this->aspek)->nama . ' - Skor: ' . number_format($this->skor, 1);
    }

    // ========== SCOPES ==========
    public function scopeBySupervisi($query, $supervisiId)
    {
        return $query->where('supervisi_id', $supervisiId);
    }

    public function scopeByAspek($query, $aspekId)
    {
        return $query->where('aspek_id', $aspekId);
    }
}
