<?php

namespace App\Transformers;

use App\Models\AdvancedAchievements;
use League\Fractal\TransformerAbstract;

class AdvancedAchievementsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(AdvancedAchievements $advancedAchievements)
    {
        return [
            "name" => $advancedAchievements->name,
            "qualification" => $advancedAchievements->qualification,
            "reward" => $advancedAchievements->reward,
        ];
    }
}