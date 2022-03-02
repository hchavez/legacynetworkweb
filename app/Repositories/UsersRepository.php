<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\User;
use Carbon\Carbon;
use DB;

class UsersRepository extends Repository
{
    function model()
    {
        return User::class;
    }

    public function getParentDistributor($distributor_id)
    {
        return $this->model
            ->select('parent.*')
            ->where('users.id', '=', $distributor_id)
            ->join('users as parent', function ($join) {
                $join->on('parent.id', '=', 'users.referrer_id');
            })
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->first();
    }

    public function getMembers($distributor_id)
    {
        return $this->model
            ->where('referrer_id', '=', $distributor_id)
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->get();
    }

    public function getUsersByAchievementLevels($levelArr)
    {
        return $this->model
            ->select('users.*')
            ->join('achievement_levels', 'achievement_levels.id', '=','users.achievement_level_id')
            ->whereIn('achievement_levels.level', $levelArr)
            ->where('users.is_subscribed', '=', 1)
            ->where('users.status', '=', 'ACTIVE')
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->get();
    }

    public function getByEmail($email) {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function getSiblings($user)
    {
        if ($user) {
            return $this->model
                ->where('referrer_id', '=', $user->referrer_id)
                ->where('id', '!=', $user->id)
                ->whereNotIn('users.password', [
                    'elite-challenge-pending',
                    'elite-challenge-active',
                ])
                ->get();
        }

        return null;
    }


    public function getMemberAndTheirCommitments(array $userId)
    {
        return $this->model
            ->select([
                'users.id',
                'users.first_name',
                'users.last_name',
                'completed.label as completed_label',
                DB::raw('DATE_FORMAT(completed.complete_date, "%m/%d/%Y") as completed_date'),
                'incomplete.label as incomplete_label',
                DB::raw('DATE_FORMAT(incomplete.date, "%m/%d/%Y") as incomplete_due_date')
            ])
            ->leftJoin('user_success_compass as completed', function($join) {
                $join->on('completed.user_id', '=', 'users.id')
                    ->where('completed.success_compass_id', '=', 1)
                    ->where('completed.is_complete', '=', 1)
                    ->whereNull('completed.deleted_at')
                ;
            })
            ->leftJoin('user_success_compass as incomplete', function($join) {
                $join->on('incomplete.user_id', '=', 'users.id')
                    ->where('incomplete.success_compass_id', '=', 1)
                    ->where('incomplete.is_complete', '=', 0)
                    ->whereNull('incomplete.deleted_at')
                ;
            })
            ->whereIn('users.id', $userId)
            ->whereNull('users.deleted_at')
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->get();
    }

    public function getMembersWithAuthSubscription($status)
    {
        $query = $this->model
            ->where('users.status', '=', $status)
            ->whereNotNull('users.auth_net_subscription_id')
            ->whereNull('users.deleted_at')
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->whereNotIn('users.email', [
                'candyscoops@gmail.com',
                'marketing@legacynetwork.com',
                'partners@legacynetwork.com',
                'isaac_manubag@yahoo.com',
                'earlamante@w3bkit.com',
                'andrew@fifthmissionmarketing.com',
            ])
            ;


        return $query->get();
    }

    public function getMembersWithExpiredCards()
    {
        $query = $this->model
            ->whereNotNull('users.auth_net_subscription_id')
            ->where('users.cc_exp_date', '<', Carbon::now()->format('Y-m-d'))
            ->whereNull('users.deleted_at')
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->whereNotIn('users.email', [
                'candyscoops@gmail.com',
                'marketing@legacynetwork.com',
                'partners@legacynetwork.com',
                'isaac_manubag@yahoo.com',
                'earlamante@w3bkit.com',
                'andrew@fifthmissionmarketing.com',
            ])
            ;


        return $query->get();
    }

    public function getInactiveUsersForMoreThanOneMonth()
    {
        $query = $this->model
            ->whereNotNull('users.auth_net_subscription_id')
            ->where('users.status', '=', 'INACTIVE')
            ->where('users.inactive_at', '<', Carbon::now()->subDays(30))
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->whereNull('users.deleted_at')
            ->whereNotIn('users.email', [
                'candyscoops@gmail.com',
                'marketing@legacynetwork.com',
                'partners@legacynetwork.com',
                'isaac_manubag@yahoo.com',
                'earlamante@w3bkit.com',
                'andrew@fifthmissionmarketing.com',
            ])
        ;


        return $query->get();
    }

    public function getUsersToReactivate()
    {
        return $this->model
            ->whereNull('users.deleted_at')
            ->where('users.status', '=', 'INACTIVE')
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->get();
    }

    public function getUsersToValidateSubscription()
    {
        return $this->model
            ->whereNull('users.deleted_at')
            ->whereNotNull('users.auth_net_subscription_id')
            ->where('users.status', '=', 'ACTIVE')
            ->whereNotIn('users.password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->whereNotIn('users.email', [
                'candyscoops@gmail.com',
                'marketing@legacynetwork.com',
                'partners@legacynetwork.com',
                'isaac_manubag@yahoo.com',
                'earlamante@w3bkit.com',
                'andrew@fifthmissionmarketing.com',
            ])
            ->get();
    }
}