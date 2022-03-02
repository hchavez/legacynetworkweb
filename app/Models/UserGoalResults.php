<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGoalResults extends Model
{
    use SoftDeletes;

    protected $table = 'user_goal_results';

    protected $fillable = [
        'user_id',
        'result',
        'category_id',
    ];
}