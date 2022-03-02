<?php

namespace App\Widgets\Events\Modals;

use App\Repositories\EventsRepository;
use Arrilot\Widgets\AbstractWidget;

class Delete extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'event_id' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(EventsRepository $eventsRepository)
    {
        $data = $this->config;
        $data['event'] = $eventsRepository->find($data['event_id']);

        return view('widgets.events.modals.delete', $data);
    }
}
