<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Merchandise extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    //
    protected $table = 'merchandise';

    protected $fillable = [
        'product_name', 'product_description','size','color', 'price', 'stock', 'status'
    ];

}
