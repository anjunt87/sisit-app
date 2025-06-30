<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $table = 'app_setting';

    public $timestamps = false;

    protected $fillable = ['key', 'value'];
}
