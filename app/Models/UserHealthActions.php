<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHealthActions extends Model
{
    use SoftDeletes;

    protected $table = 'user_health_actions';

    protected $fillable = [
        'user_id',
        'week',
        'category_id',
    ];

    protected $dates = ['week'];

    public function items()
    {
        return $this->hasMany(UserHealthActionItems::class, 'health_action_id', 'id');
    }
}