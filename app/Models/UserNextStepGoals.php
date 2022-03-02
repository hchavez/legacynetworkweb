<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNextStepGoals extends Model
{
    use SoftDeletes;

    protected $table = 'user_next_step_goals';

    protected $fillable = [
        'user_id',
        'goal',
        'due_date',
        'category_id',
    ];

    protected $dates = [
        'due_date'
    ];

    public function setDueDateAttribute($date)
    {
        $this->attributes['due_date'] = $date;
        if (is_string($date))
            $this->attributes['due_date'] = Carbon::parse($date);
    }

}