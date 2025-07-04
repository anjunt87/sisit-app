<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notifikasi extends Model
{
    use SoftDeletes;

    protected $table = 'notifikasi';

    protected $fillable = [
        'judul',
        'pesan',
        'tipe',
        'target_tipe',     // contoh: 'user', 'role', 'unit', 'semua'
        'target_id',       // nullable, tergantung target_tipe
        'link',            // opsional URL tujuan
        'is_read',
        'dibaca_pada',
        'created_by',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'dibaca_pada' => 'datetime',
    ];

    // ========== ENUM ==========
    public const TIPE = ['info', 'peringatan', 'penting'];
    public const TARGET_TIPE = ['user', 'role', 'unit', 'semua'];

    // ========== RELATIONS ==========
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_id')->where('target_tipe', 'user');
    }

    public function targetRole()
    {
        return $this->belongsTo(Role::class, 'target_id')->where('target_tipe', 'role');
    }

    public function targetUnit()
    {
        return $this->belongsTo(Unit::class, 'target_id')->where('target_tipe', 'unit');
    }

    // ========== SCOPES ==========
    public function scopeBelumDibaca($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeUntukUser($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->where('target_tipe', 'user')->where('target_id', $userId)
              ->orWhere('target_tipe', 'semua');
        });
    }

    // ========== ACCESSORS ==========
    public function getTipeLabelAttribute()
    {
        return ucfirst($this->tipe);
    }

    public function getWaktuFormatAttribute()
    {
        return optional($this->created_at)->format('d M Y H:i');
    }
}
