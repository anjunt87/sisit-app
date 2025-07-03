<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Yayasan extends Model
{
    use SoftDeletes;

    protected $table = 'yayasan';

    protected $fillable = [
        'nama',
        'pimpinan',
        'operator',
        'telp',
        'fax',
        'email',
        'kode_pos',
        'alamat_id',
        'no_pendirian',
        'tgl_pendirian',
        'no_pengesahan',
        'no_sk_menkumham',
        'tgl_sk_menkumham',
        'logo',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tgl_pendirian' => 'date',
        'tgl_sk_menkumham' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // =======================
    // RELATIONS
    // =======================

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'yayasan_id');
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

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['keyword'])) {
            $query->where('nama', 'like', '%' . $filters['keyword'] . '%');
        }
    }

    // =======================
    // EVENT HANDLERS
    // =======================

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode)) {
                $latest = self::count() + 1;
                $model->kode = 'YYS-' . str_pad($latest, 2, '0', STR_PAD_LEFT);
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
}
