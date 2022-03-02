<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class UserGoalResults extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'category_id' => 1
    ];

    public function run()
    {
        $user = user();
        $data = $this->config;

        if ($data['category_id'] == 1) {
            $data['goalResults'] = $user->goalResults;
        } else {
            $data['goalResults'] = $user->businessGoalResults;
        }


        return view('widgets.user_goal_results', $data);
    }
}
