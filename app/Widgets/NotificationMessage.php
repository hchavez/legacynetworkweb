<?php

namespace App\Widgets;

use App\Repositories\NotificationMessagesRepository;
use App\Services\NotificationMessagesServices;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class NotificationMessage extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(NotificationMessagesServices $notificationMessagesServices)
    {
        $data = $this->config;

        $user = Auth::user();

        $notifications = $notificationMessagesServices->getBy('user_id', $user->id);
        $data['notifications'] = $notifications;

        return view('widgets.notification_message', $data);
    }
}
