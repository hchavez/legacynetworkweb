<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHealthGoals extends Model
{
    use SoftDeletes;

    protected $table = 'user_health_goals';

    protected $fillable = [
        'user_id',
        'goal',
        'due_date',
        'category_id',
    ];

    protected $dates = [
        'due_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function healthItems()
    {
        return $this->hasMany(HealthGoalItems::class, 'health_goal_id', 'id');
    }

    public function setDueDateAttribute($date)
    {
        $this->attributes['due_date'] = $date;
        if (is_string($date))
            $this->attributes['due_date'] = Carbon::parse($date);
    }

}