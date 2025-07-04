<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefAspekSupervisi extends Model
{
    use SoftDeletes;

    protected $table = 'ref_aspek_supervisi';

    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== ENUM (opsional) ==========
    public const KATEGORI = [
        'administrasi',
        'perencanaan',
        'pelaksanaan',
        'penilaian',
        'kepribadian',
        'sosial',
    ];

    // ========== RELATIONS ==========
    public function detailSupervisi()
    {
        return $this->hasMany(SupervisiGuruDetail::class, 'aspek_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return strtoupper($this->kode) . ' - ' . ucfirst($this->nama);
    }
}
