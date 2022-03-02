<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHealthActionItems extends Model
{
    use SoftDeletes;

    protected $table = 'user_health_action_items';

    protected $fillable = [
        'health_action_id',
        'title',
        'category_id',
    ];

    public function healthAction()
    {
        return $this->belongsTo(UserHealthActions::class, 'health_action_id', 'id');
    }

    public function days()
    {
        return $this->hasMany(UserHealthActionItemDays::class, 'uhai_id', 'id');
    }
}