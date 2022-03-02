<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class SupportTicketCategories extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'support_ticket_categories';

    protected $fillable = [
        'name',
        'description',
    ];
}
