<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';

    protected $fillable = [
        'nama_jalan',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    // ========== ACCESSOR: Alamat Lengkap ==========
    public function getAlamatLengkapAttribute()
    {
        $bagian = [
            $this->nama_jalan,
            ($this->rt && $this->rw) ? "RT {$this->rt}/RW {$this->rw}" : null,
            $this->kelurahan,
            $this->kecamatan,
            $this->kota,
            $this->provinsi,
            $this->kode_pos,
        ];

        return implode(', ', array_filter($bagian));
    }

    // ========== RELATIONS ==========
    public function unit()
    {
        return $this->hasOne(Unit::class, 'alamat_id');
    }

    public function guru()
    {
        return $this->hasOne(Guru::class, 'alamat_id');
    }

    public function murid()
    {
        return $this->hasOne(Murid::class, 'alamat_id');
    }

    public function waliMurid()
    {
        return $this->hasOne(WaliMurid::class, 'alamat_id');
    }

    // ========== SCOPE (Opsional) ==========
    public function scopeKota($query, $kota)
    {
        return $query->where('kota', $kota);
    }

    public function scopeProvinsi($query, $provinsi)
    {
        return $query->where('provinsi', $provinsi);
    }
}
