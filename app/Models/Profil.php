<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{
    use SoftDeletes;

    protected $table = 'profil';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',        // enum: 'L', 'P'
        'status_keluarga',      // enum: 'ayah', 'ibu', 'wali', 'anak'
        'agama',
        'no_hp',
        'foto',
        'alamat_id',
        'kota',
        'latitude',
        'longitude',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'latitude'      => 'float',
        'longitude'     => 'float',
    ];

    // ======================
    // RELATIONS
    // ======================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function murid()
    {
        return $this->hasOne(Murid::class);
    }

    public function waliMurid()
    {
        return $this->hasOne(WaliMurid::class);
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ======================
    // ENUM OPTIONS
    // ======================

    public static function jenisKelaminOptions()
    {
        return [
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
        ];
    }

    public static function statusKeluargaOptions()
    {
        return [
            'ayah'  => 'Ayah',
            'ibu'   => 'Ibu',
            'wali'  => 'Wali',
            'anak'  => 'Anak',
        ];
    }

    // ======================
    // ACCESSORS
    // ======================

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset("storage/{$this->foto}") : asset("images/default-profile.png");
    }

    public function getJenisKelaminLabelAttribute()
    {
        return self::jenisKelaminOptions()[$this->jenis_kelamin] ?? '-';
    }

    public function getStatusKeluargaLabelAttribute()
    {
        return self::statusKeluargaOptions()[$this->status_keluarga] ?? '-';
    }
}
