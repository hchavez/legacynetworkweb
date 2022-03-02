<?php

namespace App\Models;

use App\Interfaces\AchievementLevelInterface;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AdvancedAchievements extends Model implements AchievementLevelInterface, Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'advanced_achievements';

    protected $fillable = [
        'name',
        'qualification',
        'reward',
    ];

    public function userPendingApproval()
    {
        return $this->hasMany(AchievementApprovals::class, 'advanced_achievement_level_id')
            ->whereIn('status', ['pending'])
            ->where('user_id', '=', user()->id);
    }

}
