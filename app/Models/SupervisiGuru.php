<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupervisiGuru extends Model
{
    protected $table = 'supervisi_guru';

    protected $fillable = [
        'guru_id',
        'periode_id',
        'unit_id',
        'tanggal',
        'jenis',
        'kesimpulan',
        'tindak_lanjut',
        'catatan',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // ========== ENUM ==========
    public const JENIS = [
        'administratif',
        'kelas',
        'kepribadian',
        'komprehensif',
    ];

    // ========== RELATIONS ==========
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function detail()
    {
        return $this->hasMany(SupervisiGuruDetail::class, 'supervisi_id');
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
    public function scopePeriode($query, $periodeId)
    {
        return $query->where('periode_id', $periodeId);
    }

    public function scopeGuru($query, $guruId)
    {
        return $query->where('guru_id', $guruId);
    }

    public function scopeJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    // ========== ACCESSORS ==========
    public function getJenisLabelAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->jenis));
    }

    public function getRingkasanAttribute()
    {
        return optional($this->guru)->nama . ' - ' . $this->jenisLabel . ' (' . $this->tanggal->format('d M Y') . ')';
    }
}
