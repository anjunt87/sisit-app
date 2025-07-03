<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $table = 'guru';

    protected $fillable = [
        'user_id',
        'unit_id',
        'alamat_id',
        'nip',
        'nik',
        'nuptk',
        'gelar_depan',
        'gelar_belakang',
        'nama',
        'jenis_kelamin_id',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_hp',
        'email',
        'foto',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tanggal_lahir' => 'date',
    ];

    // =====================
    // RELATIONS
    // =====================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function jenisKelamin()
    {
        return $this->belongsTo(RefJenisKelamin::class, 'jenis_kelamin_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // =====================
    // ACCESSORS
    // =====================

    public function getNamaLengkapAttribute()
    {
        return trim("{$this->gelar_depan} {$this->nama} {$this->gelar_belakang}");
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset("storage/{$this->foto}") : asset("images/default-profile.png");
    }

    // =====================
    // SCOPES
    // =====================

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCari($query, $keyword)
    {
        return $query->where('nama', 'like', "%{$keyword}%")
                     ->orWhere('nip', 'like', "%{$keyword}%")
                     ->orWhere('nik', 'like', "%{$keyword}%");
    }
}
