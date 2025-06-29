<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'permissions',
        'is_active'
    ];

    protected $casts = [
        'permissions' => 'array',
        'created_at'  => 'datetime',
        'is_active'   => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
