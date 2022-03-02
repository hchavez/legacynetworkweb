<?php

namespace App\Transformers;

use App\Models\UserGoalResults;
use League\Fractal\TransformerAbstract;

class SuccessCompassResultsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserGoalResults $userHealthGoal)
    {
        return [
            "type" => $this->resolveCategoryId($userHealthGoal->category_id),
            "result" => $userHealthGoal->result,

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
