<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Meetings extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'meetings';

    protected $fillable = [
        'user_id',
        'meeting_date',
        'meeting_time',
        'meeting_outline',
        'conference_number',
        'pin',
        'is_entrepreneurship_meeting',
    ];

    protected $dates = ['meeting_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invitedUsers()
    {
        return $this->belongsToMany(User::class, 'user_meetings', 'meeting_id', 'user_id');
    }


}
