<?php

namespace App\Widgets\Events\Modals;

use App\Repositories\EventsRepository;
use Arrilot\Widgets\AbstractWidget;

class ListEvents extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'name_id' => null,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(EventsRepository $eventsRepository)
    {
        $data = $this->config;
        $allEvents = $eventsRepository->getEventsByTitle($this->config['name_id']);

        $completedEvents = $allEvents->filter(function ($event) {
            return $event->status == 'attended';
        });

        $pendingEvents = $allEvents->filter(function ($event) {
            return $event->status != 'attended';
        });


        $data['events'] = $pendingEvents;
        $data['completedEvents'] = $completedEvents;

        return view('widgets.events.modals.list_events', $data);
    }
}
