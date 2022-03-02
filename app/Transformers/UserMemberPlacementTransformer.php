<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserMemberPlacementTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'pendingPlacement',
        'challengeMembers',
    ];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [];
    }

    public function includePendingPlacement(User $user)
    {
        return $this->collection($user->pendingPlacementTeamMembers, new UserProfileTransformer());
    }

    public function includeChallengeMembers(User $user)
    {
        return $this->collection($user->pendingChallengeMembers, new UserProfileTransformer());
    }
}
