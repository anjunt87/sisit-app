<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefStatusMurid extends Model
{
    use SoftDeletes;

    protected $table = 'ref_status_murid';

    protected $fillable = [
        'kode',
        'nama',
        'keterangan',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== RELATIONS ==========
    public function murid()
    {
        return $this->hasMany(Murid::class, 'status_id');
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

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return strtoupper($this->kode) . ' - ' . ucfirst($this->nama);
    }
}
