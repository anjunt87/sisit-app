<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KenaikanJilidAntrian extends Model
{
    use SoftDeletes;

    protected $table = 'kenaikan_jilid_antrian';

    protected $fillable = [
        'murid_id',
        'unit_id',
        'jilid_sekarang_id',
        'jilid_usulan_id',
        'status',
        'catatan',
        'diajukan_oleh',
        'ditindaklanjuti_oleh',
        'diterima_pada',
    ];

    protected $casts = [
        'diterima_pada' => 'datetime',
    ];

    // ========== ENUM ==========
    public const STATUS = [
        'menunggu',
        'disetujui',
        'ditolak',
        'diproses',
        'selesai',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function jilidSekarang()
    {
        return $this->belongsTo(RefJilidTahsin::class, 'jilid_sekarang_id');
    }

    public function jilidUsulan()
    {
        return $this->belongsTo(RefJilidTahsin::class, 'jilid_usulan_id');
    }

    public function pengaju()
    {
        return $this->belongsTo(User::class, 'diajukan_oleh');
    }

    public function penindaklanjut()
    {
        return $this->belongsTo(User::class, 'ditindaklanjuti_oleh');
    }

    // ========== SCOPES ==========
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeBelumDiproses($query)
    {
        return $query->whereNull('diterima_pada');
    }

    // ========== ACCESSORS ==========
    public function getStatusLabelAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }
}
