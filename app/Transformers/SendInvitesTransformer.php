<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserProfileTransformer extends TransformerAbstract
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
            "achievement_level_id" => $user->achievement_level_id,
            "achievement_level_name" => $user->achievementLevel->name,
            "achievement_level" => $user->achievementLevel->level,
             "is_training_done"=>$user->is_training_done,
            "placement"=>$user->placement,
            "purl"=>$user->purl,
            "team_member_placement_id"=>$user->team_member_placement_id,
            "determine_placement"=>$user->determine_placement,
            "status"=>$user->status,
            "mailing_address_1"=>$user->mailing_address_1,
            "mailing_address_2"=>$user->mailing_address_2,
            "mailing_city"=>$user->mailing_city,
            "mailing_state"=>$user->mailing_state,
            "mailing_postal_code"=>$user->mailing_postal_code,
            "mailing_country"=>$user->mailing_country,
            "physical_address_1"=>$user->physical_address_1,
            "physical_address_2"=>$user->physical_address_2,
            "physical_city"=>$user->physical_city,
            "physical_state"=>$user->physical_state,
            "physical_postal_code"=>$user->physical_postal_code,
            "physical_country"=>$user->physical_country,
            "mobile"=>$user->mobile,
            "tin_ssn"=>$user->tin_ssn,
            "signature"=>$user->signature,
            "avatar"=>$user->avatar,
            "remember_token"=>$user->remember_token,
            "synergy_account_number"=>$user->synergy_account_number,
            "synergy_tracking_center_1"=>$user->synergy_tracking_center_1,
            "synergy_tracking_center_2"=>$user->synergy_tracking_center_2,
            "synergy_tracking_center_3"=>$user->synergy_tracking_center_3,
            "synergy_left_leg_cv"=>$user->synergy_left_leg_cv,
            "synergy_prev_left_leg_cv"=>$user->synergy_prev_left_leg_cv,
            "synergy_right_leg_cv"=>$user->synergy_right_leg_cv,
            "synergy_prev_right_leg_cv"=>$user->synergy_prev_right_leg_cv,
            "synergy_personally_sponsored_count"=>$user->synergy_personally_sponsored_count,
            "synergy_team_member_count"=>$user->synergy_team_member_count,
            "synergy_preferred_customer_count"=>$user->synergy_preferred_customer_count,
            "synergy_highest_title_id"=>$user->synergy_highest_title_id,
            "synergy_highest_title_desc"=>$user->synergy_highest_title_desc,
            "synergy_current_title_id"=>$user->synergy_current_title_id,
            "synergy_current_title_desc"=>$user->synergy_current_title_desc,
            "synergy_next_title_id"=>$user->synergy_next_title_id,
            "synergy_next_title_desc"=>$user->synergy_next_title_desc,
            "synergy_next_highest_title_id"=>$user->synergy_next_highest_title_id,
            "synergy_next_highest_title_desc"=>$user->synergy_next_highest_title_desc,
            "synergy_actual_value"=>$user->synergy_actual_value,
            "synergy_prev_value"=>$user->synergy_prev_value,
            "created_at"=>$user->created_at,
            "updated_at"=>$user->updated_at,
            "deleted_at"=>$user->deleted_at,
            "inactive_at"=>$user->inactive_at,
            "auth_net_subscription_id"=>$user->auth_net_subscription_id,
            "auth_net_profile_id"=>$user->auth_net_profile_id,
            "auth_net_payment_profile_id"=>$user->auth_net_payment_profile_id,
            "auth_net_address_id"=>$user->auth_net_address_id,
            "is_subscribed"=>$user->is_subscribed,
            "bonus_path_id"=>$user->bonus_path_id,
        ];
    }
}




