<?php

namespace App;

use App\Models\BonusPaths;
use App\Models\UserGoalResults;
use App\Models\UserHealthActions;
use App\Models\UserHealthGoals;
use App\Models\UserNextStepGoals;
use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use App\Models\AchievementLevels;
use App\Models\Meetings;
use App\Models\Orders;
use App\Models\UserSuccessCompass;
use App\Models\EntrepreneurshipTrainingProgress;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;
        
class User extends Authenticatable implements Auditable
{
    use HasRoles, HasApiTokens, Notifiable, SoftDeletes, SearchableTrait;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'referrer_id',
        'is_training_done',
        'placement',
        'purl',
        'synergy_id',
        'synergy_sponsor_id',
        'team_member_placement_id',
        'determine_placement',
        'status',
        'date_of_birth',
        'gender',
        'mailing_address_1',
        'mailing_address_2',
        'mailing_city',
        'mailing_state',
        'mailing_postal_code',
        'mailing_country',
        'physical_address_1',
        'physical_address_2',
        'physical_city',
        'physical_state',
        'physical_postal_code',
        'physical_country',
        'mobile',
        'tin_ssn',
        'signature',
        'avatar',
        'cc_name',
        'cc_number',
        'cc_cvv',
        'cc_exp_date',
        'remember_token',
        'auth_net_subscription_id',
        'auth_net_profile_id',
        'auth_net_payment_profile_id',
        'auth_net_address_id',
        'is_subscribed',
        'synergy_account_number',
        'synergy_tracking_center_1',
        'synergy_tracking_center_2',
        'synergy_tracking_center_3',
        'synergy_left_leg_cv',
        'synergy_prev_left_leg_cv',
        'synergy_right_leg_cv',
        'synergy_prev_right_leg_cv',
        'synergy_personally_sponsored_count',
        'synergy_team_member_count',
        'synergy_preferred_customer_count',
        'synergy_highest_title_id',
        'synergy_highest_title_desc',
        'synergy_current_title_id',
        'synergy_current_title_desc',
        'synergy_next_title_id',
        'synergy_next_title_desc',
        'synergy_next_highest_title_id',
        'synergy_next_highest_title_desc',
        'synergy_actual_value',
        'synergy_prev_value',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'date_of_birth',
        'cc_exp_date',
        'inactive_at',
    ];

    protected $searchable = [
        'columns' => [
            'users.first_name' => 10,
            'users.last_name' => 10,
        ],
    ];

    /**
     * RELATIONSHIPS
     */
    public  function sponsor()
    {
        return $this->hasOne(User::class, 'id', 'referrer_id');
    }

    public  function teamMembers()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereNotIn('password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->where('is_training_done', '=', 1);
    }

    public function createdMeetings()
    {
        return $this->hasMany(Meetings::class, 'user_id');
    }

    public function invitedToMeetings()
    {
        return $this->belongsToMany(Meetings::class, 'user_meetings', 'user_id', 'meeting_id');
    }

    public function achievementLevel()
    {
        return $this->hasOne(AchievementLevels::class, 'id', 'achievement_level_id');
    }



    public function bonusPath()
    {
        return $this->hasOne(BonusPaths::class, 'id', 'bonus_path_id');
    }

    public function pendingPlacementTeamMembers()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereNotIn('password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->whereNull('placement');
    }

    public function pendingTrainingTeamMembers()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereNotNull('placement')
            ->whereNotIn('password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->where('is_training_done', '=', 0);
    }

    public function pendingChallengeMembers()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereIn('password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ->where('is_training_done', '=', 0);
    }

    public function cardioCustomer()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereIn('password', [
                'cardio-customer',
            ])
            ;
    }

    public function immuneSupportCustomer()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereIn('password', [
                'immune-support-customer',
            ])
            ;
    }

    public function immuneEliteHealthChallenge()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
             ->where('password', 'elite-challenge-active');
            ;
    }


    public function challengeMembers()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')
            ->whereIn('password', [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])
            ;
    }

    public function order()
    {
        return $this->hasOne(Orders::class);
    }

    public function healthGoal()
    {
        return $this->hasOne(UserHealthGoals::class, 'user_id', 'id')->where('category_id', '=', 1);
    }

    public function businessGoal()
    {
        return $this->hasOne(UserHealthGoals::class, 'user_id', 'id')->where('category_id', '=', 2);
    }

    public function nextHealthGoal()
    {
        return $this->hasOne(UserNextStepGoals::class, 'user_id', 'id')->where('category_id', '=', 1);
    }

    public function nextBusinessGoal()
    {
        return $this->hasOne(UserNextStepGoals::class, 'user_id', 'id')->where('category_id', '=', 2);
    }

    public function goalResults()
    {
        return $this->hasOne(UserGoalResults::class, 'user_id', 'id')->where('category_id', '=', 1);
    }

    public function businessGoalResults()
    {
        return $this->hasOne(UserGoalResults::class, 'user_id', 'id')->where('category_id', '=', 2);
    }

    public function healthActions()
    {
        return $this->hasMany(UserHealthActions::class, 'user_id', 'id')->where('category_id', '=', 1);
    }

    public function businessHealthActions()
    {
        return $this->hasMany(UserHealthActions::class, 'user_id', 'id')->where('category_id', '=', 2);
    }

    public function upcomingHealthAction()
    {
        return $this->hasOne(UserHealthActions::class, 'user_id', 'id')->where('week', '>=', Carbon::now())->orderBy('week', 'asc');
    }

    public function thisWeekHealthAction()
    {
        return $this->hasOne(UserHealthActions::class, 'user_id', 'id')->where('week', '=', Carbon::now()->startOfWeek()->subDays(1))->where('category_id', '=', 1)->orderBy('week', 'asc');
    }

    public function thisWeekBusinessAction()
    {
        return $this->hasOne(UserHealthActions::class, 'user_id', 'id')->where('week', '=', Carbon::now()->startOfWeek()->subDays(1))->where('category_id', '=', 2)->orderBy('week', 'asc');
    }

        public function entrepTrainingProgress()
    {
        return $this->hasOne(EntrepreneurshipTrainingProgress::class, 'user_id', 'id');
    }


    /**
     * HELPERS / Mutator
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function getFormalFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} " . (ucfirst(substr($this->middle_name, 0, 1))) . ".";
    }

    public function setInactiveAtAttribute($value)
    {
        $this->attributes['inactive_at'] = $value;
        if (is_string($value))
            $this->attributes['inactive_at'] = Carbon::parse($value);
    }



}
