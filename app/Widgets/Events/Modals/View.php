<?php

namespace App\Widgets\Events\Modals;

use App\Repositories\EventsRepository;
use App\Repositories\EventsStatusesRepository;
use Arrilot\Widgets\AbstractWidget;

class View extends AbstractWidget
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
     * @param EventsRepository $eventsRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function run(EventsRepository $eventsRepository, EventsStatusesRepository $eventsStatusesRepository)
    {
        $data = $this->config;
        $data['event'] = $eventsRepository->find($data['event_id']);
        $data['event_statuses'] = $eventsStatusesRepository->all();

        return view('widgets.events.modals.view', $data);
    }
}
