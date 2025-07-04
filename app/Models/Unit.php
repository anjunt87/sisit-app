<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Unit extends Model
{
    use SoftDeletes;

    protected $table = 'unit';

    protected $fillable = [
        'yayasan_id',
        'kode',
        'nama',
        'jenjang',
        'alamat_id',
        'email',
        'no_hp',
        'website',
        'kepala',
        'logo',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // =======================
    // RELATIONS
    // =======================

    public function users()
    {
        return $this->hasMany(User::class, 'unit_id');
    }

    public function yayasan()
    {
        return $this->belongsTo(Yayasan::class, 'yayasan_id');
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }

    public function kepalaUnit()
    {
        return $this->belongsTo(User::class, 'kepala');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // =======================
    // ACCESSORS & MUTATORS
    // =======================

    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/default-logo.png');
    }

    public function getNamaLengkapAttribute()
    {
        return "{$this->nama} ({$this->jenjang})";
    }

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = strtoupper($value);
    }

    // =======================
    // SCOPES
    // =======================

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeJenjang($query, $jenjang)
    {
        return $query->where('jenjang', $jenjang);
    }

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['jenjang'])) {
            $query->where('jenjang', $filters['jenjang']);
        }

        if (!empty($filters['aktif'])) {
            $query->where('is_active', true);
        }

        if (!empty($filters['keyword'])) {
            $query->where('nama', 'like', '%' . $filters['keyword'] . '%');
        }
    }

    // =======================
    // ENUM/OPTIONS
    // =======================

    public static function jenjangOptions()
    {
        return [
            'pg'    => 'Playgroup',
            'tk'    => 'TK',
            'sdit'  => 'SDIT',
            'smpit' => 'SMPIT',
            'smait' => 'SMAIT',
        ];
    }

    public static function jenjangIcons()
    {
        return [
            'pg'    => '🧒',
            'tk'    => '👶',
            'sdit'  => '📘',
            'smpit' => '📗',
            'smait' => '📕',
        ];
    }

    // =======================
    // EVENT HANDLERS
    // =======================

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode) && !empty($model->jenjang)) {
                $prefix = strtoupper($model->jenjang);
                $latest = self::where('jenjang', $model->jenjang)->count() + 1;
                $model->kode = $prefix . '-' . str_pad($latest, 2, '0', STR_PAD_LEFT);
            }

            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    // =======================
    // ROUTE BINDING (Optional)
    // =======================

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
