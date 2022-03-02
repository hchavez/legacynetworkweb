<?php

namespace App\Transformers;

use App\Models\HealthGoalItems;
use App\Models\UserHealthGoals;
use League\Fractal\TransformerAbstract;

class SuccessCompassGoalItemsTransformer extends TransformerAbstract
{



    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HealthGoalItems $healthGoalItem)
    {
        return [
            "description" => $healthGoalItem->description,
        ];
    }

}
