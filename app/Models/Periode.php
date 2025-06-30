<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';

    protected $fillable = [
        'kode',
        'tahun_ajaran_id',
        'semester_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    protected $dates = ['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at', 'deleted_at'];

    // Relasi jika kamu butuh nanti
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('is_active', 1);
    }
}
