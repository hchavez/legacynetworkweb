<?php

namespace App\Transformers;

use App\Models\UserHealthActions;
use League\Fractal\TransformerAbstract;

class SuccessCompassWeeklyActionsTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'weekly_items'
    ];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserHealthActions $userHealthAction)
    {
        return [
            "id" => $userHealthAction->id,
            "type" => $this->resolveCategoryId($userHealthAction->category_id),
            "week" => $userHealthAction->week->toIso8601String(),
        ];
    }

    public function includeWeeklyItems(UserHealthActions $userHealthAction)
    {
        return $this->collection($userHealthAction->items, new SuccessCompassWeeklyActionItemsTransformer);
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
