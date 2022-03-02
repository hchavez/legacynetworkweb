<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ResendEhcEmails extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'user_id' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data = $this->config;
        return view('widgets.resend_ehc_emails', $data);
    }
}
