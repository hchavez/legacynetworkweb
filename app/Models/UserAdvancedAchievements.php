<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class UserAdvancedAchievements extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'user_advanced_achievements';

    protected $fillable = [
        'user_id',
        'advanced_achievement_id',
    ];

}
