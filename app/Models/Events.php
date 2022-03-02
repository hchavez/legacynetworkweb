<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Events extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'events';

    protected $fillable = [
        'user_id',
        'name',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'max_participants'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function participants()
    {
        return $this->hasMany(UserEvents::class,'event_id')->with(['user', 'status']);
    }

    public function participantsAttending()
    {
        return $this->hasMany(UserEvents::class, 'event_id')->where('status_id', '=', 1);
    }

    public function participantsAttended()
    {
        return $this->hasMany(UserEvents::class, 'event_id')->where('status_id', '=', 3);
    }

    public function participantsDidNotAttended()
    {
        return $this->hasMany(UserEvents::class, 'event_id')->where('status_id', '=', 4);
    }

}
