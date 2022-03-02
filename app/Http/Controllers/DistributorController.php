<?php

namespace App\Http\Controllers;

use App\Jobs\ScheduleChallengeWelcomeEmail;
use App\Mail\EliteChallengeSponsorMail;
use App\Mail\EliteChallengeWelcomeMail;
use App\Services\AchievementLevelsServices;
use App\Services\AdvancedAchievementsServices;
use App\Services\BonusPathsServices;
use App\Services\SuccessCompassServices;
use App\Services\TreeDetailsServices;
use App\Services\UsersServices;
use App\Services\UserSuccessCompassServices;
use Illuminate\Http\Request;
use App\Jobs\ScheduleChallengeDay15Email;
use App\Jobs\ScheduleChallengeDay1Email;
use App\Jobs\ScheduleChallengeDay21Email;
use App\Jobs\ScheduleChallengeDay2Email;
use App\Jobs\ScheduleChallengeDay3Email;
use App\Jobs\ScheduleChallengeDay4Email;
use App\Jobs\ScheduleChallengeDay5Email;
use App\Jobs\ScheduleChallengeDay6Email;
use App\Jobs\ScheduleChallengeDay7Email;
use App\Jobs\ScheduleChallengeDay8Email;
use Auth;
use Mail;

class DistributorController extends Controller
{
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var UserSuccessCompassServices
     */
    private $userSuccessCompassService;

    /** @var array $this ->data */
    private $data = [];
    /**
     * @var AchievementLevelsServices
     */
    private $achievementLevelsServices;
    /**
     * @var AdvancedAchievementsServices
     */
    private $advancedAchievementsServices;
    /**
     * @var TreeDetailsServices
     */
    private $treeDetailsServices;
    /**
     * @var SuccessCompassServices
     */
    private $successCompassServices;
    /**
     * @var BonusPathsServices
     */
    private $bonusPathsServices;

    /**
     * @param UsersServices $usersServices
     * @param UserSuccessCompassServices $userSuccessCompassServices
     * @param AchievementLevelsServices $achievementLevelsServices
     * @param AdvancedAchievementsServices $advancedAchievementsServices
     * @param TreeDetailsServices $treeDetailsServices
     * @param SuccessCompassServices $successCompassServices
     */
    public function __construct(
        UsersServices $usersServices,
        UserSuccessCompassServices $userSuccessCompassServices,
        AchievementLevelsServices $achievementLevelsServices,
        AdvancedAchievementsServices $advancedAchievementsServices,
        TreeDetailsServices $treeDetailsServices,
        SuccessCompassServices $successCompassServices,
        BonusPathsServices $bonusPathsServices
    )
    {
        $this->usersServices = $usersServices;
        $this->userSuccessCompassService = $userSuccessCompassServices;
        $this->achievementLevelsServices = $achievementLevelsServices;
        $this->advancedAchievementsServices = $advancedAchievementsServices;
        $this->treeDetailsServices = $treeDetailsServices;
        $this->successCompassServices = $successCompassServices;
        $this->bonusPathsServices = $bonusPathsServices;
    }

    public function getDistributorDashboard()
    {
        $user = user();
        $getTrees = $this->treeDetailsServices->getTreesByUserId($user);
        $data['in_training'] = false;
        $trees = $getTrees['treeViews'];
        $firstLeft = array_shift($trees['L']);
        $firstRight = array_shift($trees['R']);
        $this->data['user'] = $user;
        $this->data['trees'] = $trees;
        $this->data['user_node_class'] = $getTrees['userNodeClass'];
        $this->data['firstLeft'] = $firstLeft;
        $this->data['firstRight'] = $firstRight;
        $this->data['parent_distributor'] = $this->usersServices->getParentDistributor($user->id);
        $this->data['grand_parent_distributor'] = null;

        if ($this->data['parent_distributor']) {
            $this->data['grand_parent_distributor'] = $this->usersServices->getParentDistributor($this->data['parent_distributor']->id);
        }

        $this->data['achievement_levels_chunk'] = $this->achievementLevelsServices->achievementLevels()->chunk(7);
        $this->data['achievement_icon_map'] = [
            1 => 'pin_blank.jpg',
            2 => 'pin_star.jpg',
            3 => 'pin_bronze.jpg',
            4 => 'pin_silver.jpg',
            5 => 'pin_gold.jpg',
            6 => 'pin_teamleader.jpg',
            7 => 'pin_teammanager.jpg',
            8 => 'pin_teamdirector.jpg',
            9 => 'pin_teamelite.jpg',
            10 => 'pin_pearl.jpg',
            11 => 'pin_emerald.jpg',
            12 => 'pin_diamond.jpg',
            13 => 'pin_presidential1.jpg',
        ];
        $this->data['adv_achievement_icon_map'] = [
            1 => 'pin_teamleader.jpg',
            2 => 'pin_diamond.jpg',
            3 => 'pin_presidential1.jpg',
            4 => 'pin_star.jpg',
        ];
        $this->data['adv_achievement_level_array'] = $this->advancedAchievementsServices->achievementLevels()->chunk(2);
        $this->data['bonus_paths_chunk'] = $this->bonusPathsServices->achievementLevels()->chunk(2);
        $this->data['businessSuccessCompass'] = $user->businessGoal;
        $this->data['nextBusinessGoal'] = $user->nextBusinessGoal;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.dashboard', $this->data);
    }

    public function getDistributorTeamViewer($id)
    {
        $user = $this->usersServices->find($id);
        $getTrees = $this->treeDetailsServices->getTreesByUserId($user);
        $data['in_training'] = false;
        $trees = $getTrees['treeViews'];
        $firstLeft = array_shift($trees['L']);
        $firstRight = array_shift($trees['R']);
        $this->data['user'] = $user;
        $this->data['trees'] = $trees;
        $this->data['user_node_class'] = $getTrees['userNodeClass'];
        $this->data['firstLeft'] = $firstLeft;
        $this->data['firstRight'] = $firstRight;
        $this->data['parent_distributor'] = $this->usersServices->getParentDistributor($user->id);
        $this->data['grand_parent_distributor'] = null;

        if ($this->data['parent_distributor']) {
            $this->data['grand_parent_distributor'] = $this->usersServices->getParentDistributor($this->data['parent_distributor']->id);
        }

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.dashboard_team_viewer', $this->data);
    }

    public function setPlacement(Request $request)
    {
        return $this->usersServices->setPlacement($request->all());
    }

    public function setTrainingStatus(Request $request)
    {
        return $this->usersServices->setTrainingStatus($request->all());
    }

    public function productUsage()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.product_usage', $data);
    }

    public function trulumSkinCare()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.trulum_skin_care', $data);
    }

    public function productTraining()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.product_training', $data);
    }

    public function productTestimonials()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.product_testimonials', $data);
    }

    public function changeAutoship()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.change_autoship', $data);
    }

    public function biome()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.biome', $data);
    }

    public function leaveALegacy()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product.leave_a_legacy', $data);
    }

    public function deductr()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.business_building.deductr', $data);
    }

    public function eliteHealthChallenge()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.ehc', $data);
    }

    public function ehcVideos()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.ehc_videos', $data);
    }

    public function productVideos()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.product_videos', $data);
    }

    public function businessVideos()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.business_videos', $data);
    }

     public function businessCards()
    {
        $data['in_training'] = false;
        $user = user();
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }
        return view('distributor.business_cards', $data);
    }


    public function sendEliteHealthChallengeEmail()
    {
        $user = Auth::user();

        ScheduleChallengeWelcomeEmail::dispatch($user);
        ScheduleChallengeDay1Email::dispatch($user);
        ScheduleChallengeDay2Email::dispatch($user)->delay(now()->addDays(1));
        ScheduleChallengeDay3Email::dispatch($user)->delay(now()->addDays(2));
        ScheduleChallengeDay4Email::dispatch($user)->delay(now()->addDays(3));
        ScheduleChallengeDay5Email::dispatch($user)->delay(now()->addDays(4));
        ScheduleChallengeDay6Email::dispatch($user)->delay(now()->addDays(5));
        ScheduleChallengeDay7Email::dispatch($user)->delay(now()->addDays(6));
        ScheduleChallengeDay8Email::dispatch($user)->delay(now()->addDays(7));
        ScheduleChallengeDay15Email::dispatch($user)->delay(now()->addDays(14));
        ScheduleChallengeDay21Email::dispatch($user)->delay(now()->addDays(20));
    }
}
