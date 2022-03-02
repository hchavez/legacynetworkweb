<?php

namespace App\Models;

use App\Interfaces\AchievementLevelInterface;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AchievementLevels extends Model implements AchievementLevelInterface, Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'achievement_levels';

    protected $fillable = [
        'name',
        'description',
        'qualification',
        'reward',
        'income',
        'level',
        'claim_message',
    ];

    public function userPendingApproval()
    {
        return $this->hasMany(AchievementApprovals::class, 'achievement_level_id')
            ->where('status', '=', 'pending')
            ->where('user_id', '=', user()->id);
    }

    public function group()
    {
        return $this->belongsTo(AchievementGroups::class, 'group_id');
    }
}
