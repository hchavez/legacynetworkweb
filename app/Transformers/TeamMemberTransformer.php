<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class TeamMemberTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            "id" => $user->id,
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "middle_name" => $user->middle_name,
            "email" => $user->email,
            "purl" => $user->purl,
            "synergy_id" => $user->synergy_id,
            "date_of_birth" => $user->date_of_birth->format('m-d-Y'),
            "gender" => $user->gender,
            "mobile" => $user->mobile,
            "achievement_level_id" => $user->achievement_level_id,
        ];
    }
}
