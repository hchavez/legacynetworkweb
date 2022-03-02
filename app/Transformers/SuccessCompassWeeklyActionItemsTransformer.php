<?php

namespace App\Transformers;

use App\Models\UserHealthActionItems;
use League\Fractal\TransformerAbstract;

class SuccessCompassWeeklyActionItemsTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'days'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserHealthActionItems $healthActionItem)
    {
        return [
            'id' => $healthActionItem->id,
            'weekly_action_id' => $healthActionItem->health_action_id,
            'title' => $healthActionItem->title
        ];
    }

    public function includeDays(UserHealthActionItems $healthActionItem)
    {
        return $this->collection($healthActionItem->days, new SuccessCompassWeeklyActionItemDaysTransformer);
    }
}
