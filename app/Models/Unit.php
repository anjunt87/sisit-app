<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $table = 'unit';

    protected $fillable = [
        'yayasan_id',
        'kode',
        'nama',
        'jenjang',
        'alamat_id',
        'email',
        'no_hp',
        'website',
        'kepala',
        'logo',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi jika kamu ingin menyambungkan ke user
    public function users()
    {
        return $this->hasMany(User::class, 'unit_id');
    }

    // Optional: scope unit aktif
    public function scopeAktif($query)
    {
        return $query->where('is_active', 1);
    }

    // Optional: enum jenjang helper
    public static function jenjangOptions()
    {
        return [
            'pg' => 'Playgroup',
            'tk' => 'TK',
            'sdit' => 'SDIT',
            'smpit' => 'SMPIT',
            'smait' => 'SMAIT',
        ];
    }
}
