<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MerchandiseOrderDetail extends Model
{

    protected $table = 'merchandise_order_details';

    protected $fillable = [
          'order_id',
          'product_id',
          'quantity',
          'status',
    ];


}
