<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Achievements extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'bonus_path_id' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data = $this->config;

        return view('widgets.achievements', $data);
    }
}
