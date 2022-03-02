<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class UserNextStepsGoals extends AbstractWidget
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
            $data['nextHealthGoal'] = $user->nextHealthGoal;
        } else {
            $data['nextHealthGoal'] = $user->nextBusinessGoal;
        }

        return view('widgets.user_next_steps_goals', $data);
    }
}
