<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHealthActionItemDays extends Model
{
    use SoftDeletes;

    protected $table = 'user_health_action_item_days';

    protected $fillable = [
        'uhai_id',
        'day',
        'is_complete',
    ];
}