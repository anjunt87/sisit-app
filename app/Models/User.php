<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\PenugasanGuru;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'email',
        'username',
        'password',
        'tipe_user',
        'profil_id',
        'role_id',
        'unit_id',
        'is_active',
        'email_verified_at',
        'last_login_at',
        'password_changed_at',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at'    => 'datetime',
        'last_login_at'        => 'datetime',
        'password_changed_at'  => 'datetime',
        'created_at'           => 'datetime',
        'updated_at'           => 'datetime',
        'deleted_at'           => 'datetime',
        'is_active'            => 'boolean',
    ];

    // Relasi ke Role
    public function role()
    {
        // return $this->belongsTo(Role::class);
        // or if you use different foreign key:
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function penugasan()
    {
        return $this->hasMany(PenugasanGuru::class, 'guru_id', 'profil_id');
    }

    // app/Models/User.php

    // Model User.php
    // Model User.php
    public function profil()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
        // atau jika model Anda bernama Profils:
        // return $this->belongsTo(Profils::class, 'profil_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
