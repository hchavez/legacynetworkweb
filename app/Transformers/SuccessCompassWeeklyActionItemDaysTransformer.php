<?php

namespace App\Transformers;

use App\Models\UserHealthActionItemDays;
use League\Fractal\TransformerAbstract;

class SuccessCompassWeeklyActionItemDaysTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserHealthActionItemDays $userHealthActionItemDay)
    {
        return [
            'id' => $userHealthActionItemDay->id,
            'day' => $userHealthActionItemDay->day,
            'completed' => (boolean) $userHealthActionItemDay->is_complete
        ];
    }
}
