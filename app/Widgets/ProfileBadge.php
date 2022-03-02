<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ProfileBadge extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'user' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data = $this->config;
        $data['achievement_icon_map'] = [
            1 => 'pin_blank.png',
            2 => 'pin_star.png',
            3 => 'pin_bronze.png',
            4 => 'pin_silver.png',
            5 => 'pin_gold.png',
            6 => 'pin_teamleader.png',
            7 => 'pin_teammanager.png',
            8 => 'pin_teamdirector.png',
            9 => 'pin_teamelite.png',
            10 => 'pin_pearl.png',
            11 => 'pin_emerald.png',
            12 => 'pin_diamond.png',
            13 => 'pin_presidential1.png',
        ];

        return view('widgets.profile_badge', $data);
    }
}
