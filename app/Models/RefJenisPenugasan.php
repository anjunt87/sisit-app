<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefJenisPenugasan extends Model
{
    protected $table = 'ref_jenis_penugasan';

    protected $fillable = ['kode', 'nama', 'is_kepemimpinan', 'is_active'];
}
