<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuRole extends Model
{
    use SoftDeletes;

    protected $table = 'menu_role';

    protected $fillable = [
        'role_id',
        'menu',
        'akses',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'akses' => 'array', // kolom akses disimpan dalam bentuk JSON
    ];

    // ========== RELATIONS ==========
    public function role()
    {
        return $this->belongsTo(Role::class);
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
    public function scopeByRole($query, $roleId)
    {
        return $query->where('role_id', $roleId);
    }

    public function scopeByMenu($query, $menu)
    {
        return $query->where('menu', $menu);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "Menu: {$this->menu}, Akses: " . implode(', ', $this->akses ?? []);
    }
}
