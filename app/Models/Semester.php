<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function periode()
    {
        return $this->hasMany(Periode::class, 'semester_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('is_active', 1);
    }
}
