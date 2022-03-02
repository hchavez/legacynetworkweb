<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHealthGoalCategories extends Model
{
    use SoftDeletes;

    protected $table = 'user_health_goal_categories';

    protected $fillable = [
        'name',
        'description',
    ];
}