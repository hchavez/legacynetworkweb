<?php

namespace App\Transformers;

use App\Models\UserHealthGoals;
use League\Fractal\TransformerAbstract;

class SuccessCompassGoalsTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'purpose'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserHealthGoals $userHealthGoal)
    {
        return [
            "type" => $this->resolveCategoryId($userHealthGoal->category_id),
            "goal" => $userHealthGoal->goal,
            "due_date" => $userHealthGoal->due_date->format('F d, Y'),
        ];
    }

    public function includePurpose(UserHealthGoals $userHealthGoal)
    {
        return $this->collection($userHealthGoal->healthItems, new SuccessCompassGoalItemsTransformer);
    }

    private function resolveCategoryId($type)
    {
        switch ($type) {
            case 1: return "health";
            case 2: return "business";
            default: return "n/a";
        }
    }
}
