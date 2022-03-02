<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSettings extends Model
{
    use SoftDeletes;

    protected $table = 'site_settings';

    protected $fillable = [
        'embed_code'
    ];
}