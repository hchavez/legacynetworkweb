<?php

namespace App\Models;

use App\Interfaces\AchievementLevelInterface;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AchievementGroups extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'achievement_level_groups';

    protected $fillable = [
        'name',
        'description',
    ];

    public function achievementLevels()
    {
        return $this->hasMany(AchievementLevels::class, 'achievement_level_id');
    }
}
