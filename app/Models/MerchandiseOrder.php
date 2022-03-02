<?php

namespace App\Models;

use App\User;
use App\Models\MerchandiseOrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MerchandiseOrder extends Model
{

    protected $table = 'merchandise_orders';

    protected $fillable = [
          'user_id',
          'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
    {
        return $this->hasMany(MerchandiseOrderDetail::class, 'order_id', 'id');
    }

}
