<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefProjekP5 extends Model
{
    use SoftDeletes;

    protected $table = 'ref_projek_p5';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'fase',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========== ENUM FASE (opsional kurikulum merdeka) ==========
    public const FASE = ['A', 'B', 'C', 'D', 'E', 'F'];

    // ========== RELATIONS ==========
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function projek()
    {
        return $this->hasMany(Projek::class, 'ref_projek_id');
    }

    // ========== SCOPES ==========
    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFase($query, $fase)
    {
        return $query->where('fase', $fase);
    }

    // ========== ACCESSORS ==========
    public function getLabelAttribute()
    {
        return "{$this->kode} - {$this->nama}";
    }
}
