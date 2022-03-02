<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class UserHealthActionItems extends AbstractWidget
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
    public function run()
    {
        $data = $this->config;

        return view('widgets.user_health_action_items', $data);
    }
}
