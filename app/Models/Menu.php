<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $timestamps = false;

    protected $fillable = [
        'label',
        'icon',
        'url',
        'parent_id',
        'is_active',
        'urutan'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'menu_role');
    }
}
