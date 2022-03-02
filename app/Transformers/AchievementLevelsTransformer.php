<?php

namespace App\Transformers;

use App\Models\AchievementLevels;
use League\Fractal\TransformerAbstract;

class AchievementLevelsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(AchievementLevels $achievementLevels)
    {
        return [
            "id" => $achievementLevels->id,
            "name" => $achievementLevels->name,
            "description" => $achievementLevels->description,
            "qualification" => $achievementLevels->qualification,
            "reward" => $achievementLevels->reward,
            "income" => $achievementLevels->income,
            "level" => $achievementLevels->level,
            "claim_message" => $achievementLevels->claim_message,
        ];
    }
}