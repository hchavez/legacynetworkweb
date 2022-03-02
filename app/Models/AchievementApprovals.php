<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AchievementApprovals extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'achievement_approvals';

    protected $fillable = [
        'user_id',
        'achievement_level_id',
        'bonus_path_id',
        'advanced_achievement_level_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function achievementLevel()
    {
        return $this->belongsTo(AchievementLevels::class, 'achievement_level_id');
    }

    public function bonusPaths()
    {
        return $this->belongsTo(BonusPaths::class, 'bonus_path_id');
    }

    public function advancedAchievementLevel()
    {
        return $this->belongsTo(AdvancedAchievements::class, 'advanced_achievement_level_id');
    }
}
