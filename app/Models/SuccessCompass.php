<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SuccessCompass extends Model implements Auditable
{
    protected $table = 'success_compass';
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'category_name',
        'title',
        'default_label',
    ];


}
