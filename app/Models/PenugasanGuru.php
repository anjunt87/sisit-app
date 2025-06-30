<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenugasanGuru extends Model
{
    protected $table = 'penugasan_guru';

    protected $fillable = [
        'unit_id',
        'guru_id',
        'periode_id',
        'jenis_penugasan_id',
        'kelas_id',
        'mapel_id',
        'grup_tahta_id',
        'is_koordinator'
    ];
}
