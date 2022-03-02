<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthGoalItems extends Model
{
    use SoftDeletes;

    protected $table = 'health_goal_items';

    protected $fillable = [
        'health_goal_id',
        'description',
    ];
}