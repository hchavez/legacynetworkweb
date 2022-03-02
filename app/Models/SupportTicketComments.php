<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class SupportTicketComments extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'support_ticket_comments';

    protected $fillable = [
        'user_id',
        'support_ticket_id',
        'comment',
    ];

    public function ticket()
    {
        return $this->belongsTo(SupportTickets::class, 'support_ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
