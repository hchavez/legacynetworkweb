<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class EventsStatuses extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'event_statuses';

    protected $fillable = [
        'name',
        'description',
    ];

}
