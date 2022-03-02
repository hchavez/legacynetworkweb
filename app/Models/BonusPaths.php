<?php

namespace App\Models;

use App\Interfaces\AchievementLevelInterface;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class BonusPaths extends Model implements AchievementLevelInterface, Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bonus_paths';

    protected $fillable = [
        'name',
        'qualification',
        'reward',
        'income',
        'claim_message',
    ];

    public function userPendingApproval()
    {
        return $this->hasMany(AchievementApprovals::class, 'bonus_path_id')
            ->where('status', '=', 'pending')
            ->where('user_id', '=', user()->id);
    }

}
