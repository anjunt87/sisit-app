<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuPenugasan extends Model
{
    use SoftDeletes;

    protected $table = 'menu_penugasan';

    protected $fillable = [
        'user_id',
        'menu',
        'akses',
        'unit_id',
        'periode_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'akses' => 'array', // JSON field
    ];

    // ========== RELATIONS ==========
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
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
    public function scopeUserMenu($query, $userId, $menu)
    {
        return $query->where('user_id', $userId)->where('menu', $menu);
    }

    public function scopeUnitPeriode($query, $unitId, $periodeId)
    {
        return $query->where('unit_id', $unitId)->where('periode_id', $periodeId);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->menu} - akses: " . implode(', ', $this->akses ?? []);
    }
}
