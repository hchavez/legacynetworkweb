<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class UserEvents extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'user_events';

    protected $fillable = [
        'user_id',
        'event_id',
        'status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(EventsStatuses::class);
    }

}
