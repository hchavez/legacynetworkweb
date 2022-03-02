<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\TreeDetails;
use DB;

class TreeDetailsRepository extends Repository
{
    function model()
    {
        return TreeDetails::class;
    }

    public function getTreeByUserId($user_id)
    {
        $query = "
                select *
                from
                        (
                            select
                                users.id,
                                users.first_name,
                                users.last_name,
                                users.referrer_id,
                                users.placement,
                                users.avatar,
                                users.synergy_left_leg_cv,
                                users.synergy_prev_left_leg_cv,
                                users.synergy_right_leg_cv,
                                users.synergy_prev_right_leg_cv,
                                (IF(users.synergy_prev_left_leg_cv > users.synergy_prev_right_leg_cv, users.synergy_prev_right_leg_cv, users.synergy_prev_left_leg_cv)) as sort_value,
                                users.created_at
                            from users
                            where users.placement IS NOT NULL
                            and users.deleted_at is null
                            order by referrer_id, id
                        ) users_sorted,
                        (
                            select @pv := :user_id as _id_
                        ) initialisation

                where   find_in_set(referrer_id, @pv) > 0
                and     @pv := concat(@pv, ',', id);

        ";

        $res = DB::select($query, [
            'user_id' => $user_id
        ]);

        return $res;
    }

}