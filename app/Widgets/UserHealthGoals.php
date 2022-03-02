<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class UserHealthGoals extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'category_id' => 1
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $user = user();
        $data = $this->config;

        if ($data['category_id'] == 1) {
            $data['userHealthGoal'] = $user->healthGoal;
        } else {
            $data['userHealthGoal'] = $user->businessGoal;
        }

        $data['userHealthGoalItems'] = $data['userHealthGoal'] ? $data['userHealthGoal']->healthItems : [];

        return view('widgets.user_health_goals', $data);
    }
}
