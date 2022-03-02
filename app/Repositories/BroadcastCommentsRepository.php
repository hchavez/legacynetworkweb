<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\BroadcastComments;
use App\Models\Meetings;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BroadcastCommentsRepository extends Repository
{
    function model()
    {
        return BroadcastComments::class;
    }

    public function getAllCommentsWithUsers()
    {
        return $this->model
            ->select([
                'users.id as user_id',
                'users.first_name',
                'users.last_name',
                'users.avatar',
                'broadcast_comments.comment',
                DB::raw('DATE_FORMAT(broadcast_comments.created_at, "%b %e, %Y @ %r") as date'),
                DB::raw('GROUP_CONCAT(roles.name) as roles')
            ])
            ->leftJoin('users', 'users.id', '=', 'broadcast_comments.user_id')
            ->leftJoin('model_has_roles','model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=','model_has_roles.role_id')
            ->orderBy('broadcast_comments.created_at', 'DESC')
            ->groupBy('broadcast_comments.id')
            ->get();
    }

    public function polling()
    {
        return $this->model
            ->select('broadcast_comments.*')
            ->addSelect([
                'users.avatar',
                DB::raw('DATE_FORMAT(broadcast_comments.created_at, "%b %e, %Y @ %r") as date'),
                DB::raw('CONCAT_WS(" ", users.first_name, users.last_name) as name'),
                DB::raw('GROUP_CONCAT(roles.name) as roles')
            ])
            ->leftJoin('users', function($join) {
                $join->on('users.id', '=', 'broadcast_comments.user_id')
                    ->whereNull('users.deleted_at');
            })
            ->leftJoin('model_has_roles','model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=','model_has_roles.role_id')
            ->where('broadcast_comments.created_at', '>=', Carbon::now()->subSeconds(10))
            ->orderBy('broadcast_comments.created_at', 'DESC')
            ->groupBy('broadcast_comments.id')
            ->get();
    }

    public function mass_delete(array $data)
    {
        return $this->model
            ->whereIn('id', $data['ids'])
            ->delete();
    }
}