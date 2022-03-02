<?php

namespace App\Transformers;

use App\Models\UserNextStepGoals;
use League\Fractal\TransformerAbstract;

class SuccessCompassNextStepGoalsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserNextStepGoals $userHealthGoal)
    {
        return [
            "type" => $this->resolveCategoryId($userHealthGoal->category_id),
            "goal" => $userHealthGoal->goal,
            "due_date" => $userHealthGoal->due_date->format('F d, Y'),
        ];
    }

    private function resolveCategoryId($type)
    {
        switch ($type) {
            case 1:
                return "health";
            case 2:
                return "business";
            default:
                return "n/a";
        }
    }
}
