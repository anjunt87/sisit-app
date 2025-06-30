<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';

    protected $fillable = [
        'kode',
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    protected $dates = ['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at', 'deleted_at'];

    public function periode()
    {
        return $this->hasMany(Periode::class, 'tahun_ajaran_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('is_active', 1);
    }
}
