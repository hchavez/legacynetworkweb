<?php

namespace App\Http\Controllers;

use App\Models\AchievementApprovals;
use App\Models\ActivationPacks;
use App\Models\AutoShips;
use App\Models\BroadcastComments;
use App\Models\Events;
use App\Models\NotificationMessages;
use App\Models\Faq;
use App\Models\FaqCategories;
use App\Models\LnFees;
use App\Models\Products;
use App\Models\PublicCalendarEvents;
use App\Models\SupportTicketCategories;
use App\Models\SupportTickets;
use App\Models\BusinessCards;
use App\Models\Merchandise;
use App\User;
use Carbon\Carbon;
use DataTables;
use DB;
use function GuzzleHttp\default_ca_bundle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminDataTableController extends Controller
{

    public function getDistributors(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = User::select([
            'users.id',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'users.email',
            'users.password',
            'users.referrer_id',
            'users.is_training_done',
            'users.placement',
            'users.purl',
            'achievement_levels.level as achievement_level',
            'users.synergy_id',
//            'users.status',
            'users.is_training_done',
            DB::raw('IF(users.placement IS NULL, "NOT PLACED", users.status) as status'),
            DB::raw('DATE_FORMAT(users.created_at, "%Y-%m-%d") as registered'),
            DB::raw('(SELECT count(u.id) from users as u WHERE u.referrer_id = users.id AND u.password IN ("elite-challenge-pending", "elite-challenge-active") ) as customers')
        ])
            ->leftJoin('achievement_levels', 'achievement_levels.id', '=', 'users.achievement_level_id')
            ->with(['sponsor']);

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */
                $searchValue = $request->input('search')['value'];
                if ($searchValue) {
                    $query->where('users.synergy_id', 'LIKE', "%$searchValue%")
                        ->orWhere('users.last_name', 'LIKE', "%$searchValue%")
                        ->orWhere('users.first_name', 'LIKE', "%$searchValue%")
                        ->orwhere('users.synergy_id', 'LIKE', "%$searchValue%")
                        ->orWhere('users.email', 'LIKE', "%$searchValue%");
                };
                
                if (!empty($request->input('status'))) {
                    $query->where('status', '=', strtoupper($request->input('status')));
                }

                if (!empty($request->input('is_training_done'))) {
                    $query->where('is_training_done', '=', $request->input('is_training_done'));
                }

                if (!empty($request->input('is_customer'))) {
                    $query->whereIn('users.password', [
                        'elite-challenge-pending',
                        'elite-challenge-active',
                    ]);
                } else {
                    $query->whereNotIn('users.password', [
                        'elite-challenge-pending',
                        'elite-challenge-active',
                    ]);
                }



            }, true)
            ->toJson();
    }

    public function getEvents(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = Events::query();

        return DataTables::eloquent($model)
            ->addColumn('listed_participants', function ($event) {
                return $event->participants->count();
            })
            ->addColumn('participants_attending', function ($event) {
                return $event->participantsAttending->count();
            })
            ->addColumn('participants_attended', function ($event) {
                return $event->participantsAttended->count();
            })
            ->addColumn('participants_not_attended', function ($event) {
                return $event->participantsDidNotAttended->count();
            })
            ->filter(function ($query) use ($request) {
                if (!empty($request->input('name'))) {
                    $query->where('name', '=', $request->input('name'));
                }
            }, true)
            ->toJson();
    }



    public function getAdditionalAwardsRequests(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = AchievementApprovals::select([
            'achievement_approvals.id as achievement_approval_id',
            'achievement_approvals.status as status',
            'achievement_approvals.created_at as created_at',
            'achievement_approvals.achievement_level_id as achievement_level_id',
            'achievement_approvals.advanced_achievement_level_id as advanced_achievement_level_id',
            DB::raw('CONCAT_WS(" ", users.first_name, users.last_name) as name'),
            'users.email as email',
            'users.id as user_id',
            'users.synergy_id as synergy_id',
            'advanced_achievements.name as award',
        ])->join('users', function ($join) {
            $join->on('users.id', '=', 'achievement_approvals.user_id')
                ->whereNull('users.deleted_at');
        })->join('advanced_achievements', function ($join) {
            $join->on('advanced_achievements.id', '=', 'achievement_approvals.advanced_achievement_level_id');
        })->with(['advancedAchievementLevel']);

        return DataTables::eloquent($model)
            ->addColumn('achievement', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->name;
                } else {
                    return $achievementApproval->advancedAchievementLevel->name;
                }
            })
            ->addColumn('qualification', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->qualification;
                } else {
                    return $achievementApproval->advancedAchievementLevel->qualification;
                }
            })
            ->addColumn('reward', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->reward;
                } else {
                    return $achievementApproval->advancedAchievementLevel->reward;
                }
            })
            ->filter(function ($query) use ($request) {
                /** @var Builder $query */
                $searchValue = $request->input('search')['value'];
                if ($searchValue) {
                    $query->where('users.first_name', 'LIKE', "%$searchValue%")
                        ->orWhere('users.last_name', 'LIKE', "%$searchValue%");
                };
                if (!empty($request->input('status'))) {
                    $query->where('achievement_approvals.status', '=', $request->input('status'));
                }
            }, true)
            ->toJson();
    }

    public function getAchievementRequests2(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = AchievementApprovals::query();

        return DataTables::eloquent($model)
            ->addColumn('achievement_approval_id', function ($achievementApproval) {
                return $achievementApproval->id;
            })
            ->addColumn('name', function ($achievementApproval) {
                return $achievementApproval->user->full_name;
            })
            ->addColumn('email', function ($achievementApproval) {
                return $achievementApproval->user->email;
            })
            ->addColumn('synergy_id', function ($achievementApproval) {
                return $achievementApproval->user->synergy_id;
            })
            ->addColumn('achievement_level', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->level;
                } else {
                    return 'Additional Rewards';
                }
            })
            ->addColumn('achievement', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->name;
                } else {
                    return $achievementApproval->advancedAchievementLevel->name;
                }
            })
            ->addColumn('qualification', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->qualification;
                } else {
                    return $achievementApproval->advancedAchievementLevel->qualification;
                }
            })
            ->addColumn('reward', function ($achievementApproval) {
                if ($achievementApproval->achievementLevel) {
                    return $achievementApproval->achievementLevel->reward;
                } else {
                    return $achievementApproval->advancedAchievementLevel->reward;
                }
            })
            ->filter(function ($query) use ($request) {
                if (!empty($request->input('status'))) {
                    $query->where('status', '=', $request->input('status'));
                }
            }, true)
            ->toJson();
    }

    public function getBonusPathRequests(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = AchievementApprovals::select([
            'achievement_approvals.id as achievement_approval_id',
            'achievement_approvals.status as status',
            'achievement_approvals.created_at as created_at',
            'achievement_approvals.bonus_path_id as bonus_path_id',
            DB::raw('CONCAT_WS(" ", users.first_name, users.last_name) as name'),
            'users.email as email',
            'users.id as user_id',
            'users.synergy_id as synergy_id',
            'bonus_paths.id as bonus_path_id',
            'bonus_paths.name as bonus_path_name',
            'bonus_paths.qualification as bonus_path_qualification',
            'bonus_paths.reward as bonus_path_reward',
        ])->join('users', function ($join) {
            $join->on('users.id', '=', 'achievement_approvals.user_id')
                ->whereNull('users.deleted_at');
        })->leftJoin('bonus_paths', function ($join) {
            $join->on('bonus_paths.id', '=', 'achievement_approvals.bonus_path_id');
        })->whereNotNull('achievement_approvals.bonus_path_id')->with(['bonusPaths']);

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var Builder $query */
                $searchValue = $request->input('search')['value'];
                if ($searchValue) {
                    $query->where('users.first_name', 'LIKE', "%$searchValue%")
                        ->orWhere('users.last_name', 'LIKE', "%$searchValue%");
                };
                if (!empty($request->input('status'))) {
                    $query->where('achievement_approvals.status', '=', $request->input('status'));
                }
            }, true)
            ->toJson();
    }

    public function getEnrollment(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = User::select(
            [
                'users.id',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.email',
                'users.password',
                'users.referrer_id',
                'users.is_training_done',
                'users.placement',
                'users.purl',
                'users.synergy_id',
                'users.status',
                'users.is_training_done',
            ])
            ->with('sponsor');

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */

                $query->whereNotNull('placement');

                if (!empty($request->input('status'))) {
                    switch ($request->input('status')) {
                        case 'ACTIVE':
                            $query->where('status', 'ACTIVE');
                            break;

                        case 'PENDING':
                            $query->where('status', 'PENDING');
                            break;

                        default: break;
                    }
                }

            }, true)
            ->toJson();
    }

    public function getEliteChallengeSignups(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = User::select(
            [
                'users.id',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.email',
                'users.password',
                'users.referrer_id',
                'users.is_training_done',
                'users.placement',
                'users.purl',
                'users.synergy_id',
                'users.status',
                'users.is_training_done',
            ])
            ->with('sponsor');

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */

                if (!empty($request->input('status'))) {
                    switch ($request->input('status')) {

                        case 'ACTIVE':
                            $query->where('password', 'elite-challenge-active');
                            break;

                        case 'PENDING':
                            $query->where('password', 'elite-challenge-pending');
                            break;

                        default:
                            break;
                    }
                } else {
                    $query->where('password', 'elite-challenge-pending')
                        ->orWhere('password', 'elite-challenge-active');
                }

            }, true)
            ->toJson();
    }

    public function getSupportTickets(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }


        $model = SupportTickets::query()
            ->select([
                'support_tickets.*',
                'support_ticket_statuses.name',
                'support_ticket_statuses.description',
            ])
            ->join('support_ticket_statuses', 'support_ticket_statuses.id', '=', 'support_tickets.status_id')
            ->with(['status', 'comments', 'user']);

        return DataTables::eloquent($model)
            ->addColumn('user_full_name', function ($ticket) {
                return ($ticket->user) ? $ticket->user->full_name : null;
            })
            ->addColumn('status', function ($ticket) {
                return $ticket->status->description;
            })
            ->addColumn('comment_count', function ($ticket) {
                return $ticket->comments->count();
            })
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */

                if (!empty($request->input('status'))) {
                    $query->where('support_ticket_statuses.name', '=', $request->input('status'));
                }

            }, true)
            ->toJson();
    }

    public function getSupportTicketCategories(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = SupportTicketCategories::query()
            ->select([
                'support_ticket_categories.*',
            ]);

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getBroadcastComments(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = BroadcastComments::query()
            ->select([
                'broadcast_comments.*',
            ])
            ->with(['user']);


        return DataTables::eloquent($model)
            ->addColumn('user_full_name', function ($comment) {
                return ($comment->user) ? $comment->user->full_name : "Anonymous";
            })
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */

                if (!empty($request->input('deleted'))) {
                    $query->withTrashed()
                        ->whereNotNull('broadcast_comments.deleted_at');
                }

            }, true)
            ->toJson();
    }


   

    public function getFaqCategories(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = FaqCategories::query();


        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getFaq(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = Faq::query();

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getProducts(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = Products::query();

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getPublicCalendarEvents(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = PublicCalendarEvents::query();

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getActivationPacks(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = ActivationPacks::query();

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getAutoShips(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = AutoShips::query();

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getLnFees(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = LnFees::query();

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function getBusinessCards(Request $request)
    {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = BusinessCards::query();


        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */

                if (!empty($request->input('status'))) {
                    switch ($request->input('status')) {
                        case 'processing':
                            $query->where('status', 'processing');
                            break;

                        case 'delivered':
                            $query->where('status', 'delivered');
                            break;

                        default: break;
                    }
                }

            }, true)
            ->toJson();

    }

    public function getMerchandise(Request $request)
        {
        if (empty(request()->all())) {
            return redirect('/');
        }

        $model = Merchandise::query();

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */

                if (!empty($request->input('status'))) {
                    switch ($request->input('status')) {
                        case 'active':
                            $query->where('status', 'active');
                            break;

                        case 'inactive':
                            $query->where('status', 'inactive');
                            break;

                        default: break;
                    }
                }

            }, true)
            ->toJson();

    }

    public function getMailAchievement(Request $request)
        {
         if (empty(request()->all())) {
            return redirect('/');
        }

        $model = User::select([
            'users.id',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'users.email',
            'users.password',
            'users.referrer_id',
            'users.placement',
            'users.purl',
            'achievement_levels.level as achievement_level',
            'users.synergy_id',
//            'users.status',
            'users.is_training_done',
            DB::raw('IF(users.placement IS NULL, "NOT PLACED", users.status) as status'),
            DB::raw('DATE_FORMAT(users.created_at, "%Y-%m-%d") as registered'),
            DB::raw('(SELECT count(u.id) from users as u WHERE u.referrer_id = users.id AND u.password IN ("elite-challenge-pending", "elite-challenge-active") ) as customers')
        ])
            ->leftJoin('achievement_levels', 'achievement_levels.id', '=', 'users.achievement_level_id')
            ->with(['sponsor']);

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
                /** @var $query Builder */
                $searchValue = $request->input('search')['value'];
                if ($searchValue) {
                    $query->where('users.synergy_id', 'LIKE', "%$searchValue%")
                        ->orWhere('users.last_name', 'LIKE', "%$searchValue%")
                        ->orWhere('users.first_name', 'LIKE', "%$searchValue%")
                        ->orWhere('users.email', 'LIKE', "%$searchValue%");
                };
                
            
                $query->where('mail_achievement', '=', '1');
                

            }, true)
            ->toJson();

    }

    public function getMailChallenge(Request $request)
        {
            if (empty(request()->all())) {
                return redirect('/');
            }

          

        $model = User::select([
            'users.id',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'users.email',
            'users.password',
            'users.referrer_id',
            'users.placement',
            'users.purl',
            'users.synergy_id',
//            'users.status',
            'users.is_training_done',
            DB::raw('IF(users.placement IS NULL, "NOT PLACED", users.status) as status'),
            DB::raw('DATE_FORMAT(users.created_at, "%Y-%m-%d") as registered'),
            DB::raw('(SELECT count(u.id) from users as u WHERE u.referrer_id = users.id AND u.password IN ("elite-challenge-pending", "elite-challenge-active") ) as customers')
        ])
            //->leftJoin('user_challenges', 'user_challenges.user_id', '=', 'users.id')
            ->with(['sponsor']);

        return DataTables::eloquent($model)
            ->filter(function ($query) use ($request) {
              

              $query->whereDate('users.date_challenge','=', Carbon::today()->toDateString());

            }, true)
            ->toJson();

    }

}
