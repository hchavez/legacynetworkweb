<?php

namespace App\Transformers;

use App\Models\BonusPaths;
use League\Fractal\TransformerAbstract;

class BonusPathsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(BonusPaths $bonusPaths)
    {
        return [
            "name" => $bonusPaths->name,
            "qualification" => $bonusPaths->qualification,
            "reward" => $bonusPaths->reward,
            "income" => $bonusPaths->income,
            "claim_message" => $bonusPaths->claim_message,
        ];
    }
}