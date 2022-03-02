<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class SupportTicketStatuses extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'support_ticket_statuses';

    protected $fillable = [
        'name',
        'description',
    ];

}
