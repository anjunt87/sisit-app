<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{

    protected $table = 'profils'; // atau 'profiles' jika pakai plural English

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'email',
        'alamat',
        'agama',
        'status_keluarga',
    ];

    protected $dates = ['tanggal_lahir', 'deleted_at'];

    // Relasi: satu profil dimiliki oleh satu user (optional)
    public function user()
    {
        return $this->hasOne(User::class, 'profil_id');
    }
}
