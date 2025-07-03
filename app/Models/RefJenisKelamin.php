<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefJenisKelamin extends Model
{
    protected $table = 'ref_jenis_kelamin';

    protected $fillable = ['kode', 'nama'];

    public $timestamps = false;

    // ======================
    // RELATIONS
    // ======================

    public function guru()
    {
        return $this->hasMany(Guru::class, 'jenis_kelamin_id');
    }

    public function murid()
    {
        return $this->hasMany(Murid::class, 'jenis_kelamin_id');
    }

    public function wali()
    {
        return $this->hasMany(WaliMurid::class, 'jenis_kelamin_id');
    }

    // ======================
    // STATIC OPTIONS
    // ======================

    public static function options()
    {
        return [
            1 => 'Laki-laki',
            2 => 'Perempuan',
        ];
    }
}
