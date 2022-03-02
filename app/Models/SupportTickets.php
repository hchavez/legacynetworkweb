<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class SupportTickets extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'support_tickets';

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'status_id',
        'closed_date',
        'closed_by_id',
        'category_id',
        'attachment',
    ];

    protected $dates = ['closed_date'];

    public function status()
    {
        return $this->hasOne(SupportTicketStatuses::class, 'id', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function closedBy()
    {
        return $this->belongsTo(User::class, 'closed_by_id');
    }

    public function comments()
    {
        return $this->hasMany(SupportTicketComments::class, 'support_ticket_id')->with('user');
    }
}
