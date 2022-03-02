<?php

namespace App\Widgets\Events\Modals;

use App\Repositories\EventsRepository;
use Arrilot\Widgets\AbstractWidget;

class AddUpdate extends AbstractWidget
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
        $data['id'] = '';
        $data['user_id'] = user()->id;
        $data['event_name'] = '';
        $data['start_date'] = '';
        $data['start_time'] = '';
        $data['end_date'] = '';
        $data['end_time'] = '';
        $data['max_participants'] = '';
        $data['action'] = 'add';
        $data['action_text'] = 'Add Event';
        $data['time_stamps'] = [
            '12:00am', '12:30am', '1:00am', '1:30am', '2:00am', '2:30am', '3:00am', '3:30am', '4:00am', '4:30am', '5:00am', '5:30am', '6:00am', '6:30am', '7:00am', '7:30am', '8:00am', '8:30am', '9:00am', '9:30am', '10:00am', '10:30am', '11:00am', '11:30am', '12:00pm', '12:30pm', '1:00pm', '1:30pm', '2:00pm', '2:30pm', '3:00pm', '3:30pm', '4:00pm', '4:30pm', '5:00pm', '5:30pm', '6:00pm', '6:30pm', '7:00pm', '7:30pm', '8:00pm', '8:30pm', '9:00pm', '9:30pm', '10:00pm', '10:30pm', '11:00pm', '11:30pm',
        ];


        if ($this->config['event_id'] != null) {
            $event = $eventsRepository->find($data['event_id']);
            $data['id'] = $event->id;
            $data['user_id'] = $event->user_id;
            $data['event_name'] = $event->name;
            $data['start_date'] = $event->start_date->format('m/d/Y');
            $data['start_time'] = $event->start_time;
            $data['end_date'] = $event->end_date->format('m/d/Y');
            $data['end_time'] = $event->end_time;
            $data['max_participants'] = $event->max_participants;
            $data['action'] = 'update';
            $data['action_text'] = 'Update Event';
        }

        return view('widgets.events.modals.add_update', $data);
    }
}
