<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MemberInvites extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'member_invites';

    protected $fillable = [
        'user_id',
        'email',
        'name',
        'token',
        'is_visited',
        'body',
        'subject',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
