<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class UserMeetings extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'user_meetings';

    protected $fillable = [
        'user_id',
        'meeting_id',
        'status',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meetings::class, 'meeting_id');
    }

}
