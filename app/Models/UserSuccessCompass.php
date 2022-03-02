<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class UserSuccessCompass extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'user_success_compass';

    protected $fillable = [
        'user_id',
        'success_compass_id',
        'label',
        'note',
        'date',
        'complete_date',
        'is_complete',
    ];

    protected $dates = ['date'];

    public function successCompass()
    {
        return $this->belongsTo(SuccessCompass::class, 'success_compass_id');
    }
}
