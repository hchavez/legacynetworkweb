<?php

namespace App\Widgets;

use App\Repositories\UserHealthActionsRepository;
use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;

class CloneUserHealthActionItems extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'date' => null,
        'category_id' => 1
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(UserHealthActionsRepository $userHealthActionsRepository)
    {
        $data = $this->config;

        $userHealthActions = $userHealthActionsRepository->getAllBeforeDate(Carbon::parse($data['date']), $data['category_id']);
        $data['userHealthActions'] = $userHealthActions;

        return view('widgets.clone_user_health_action_items', $data);
    }
}
