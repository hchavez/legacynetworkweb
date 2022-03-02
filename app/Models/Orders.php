<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Orders extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'activation_pack_id',
        'activation_pack_name',
        'activation_pack_price',
        'activation_pack_desc',
        'auto_ship_id',
        'auto_ship_name',
        'auto_ship_price',
        'auto_ship_desc',
        'ln_fee_id',
        'ln_fee_name',
        'ln_fee_price',
        'ln_fee_desc',
        'product_id',
        'product_name',
        'product_price',
        'product_desc',
    ];

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

}
