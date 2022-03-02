<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsRequest;
use App\Services\EventsServices;
use App\Services\EventStatusesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminEventsController extends Controller
{

    /**
     * @var EventsServices
     */
    private $eventsServices;
    /**
     * @var EventStatusesServices
     */
    private $eventStatusesServices;

    public function __construct(EventsServices $eventsServices, EventStatusesServices $eventStatusesServices)
    {
        $this->eventsServices = $eventsServices;
        $this->eventStatusesServices = $eventStatusesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = config('ln.events');

        return view('legacy_admin.legacy_events', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $event = new \stdClass();
        $event->id = "";
        $event->user_id = user()->id;
        $event->name = "";
        $event->start_date = "";
        $event->end_date = "";
        $event->start_time = "";
        $event->end_time = "";
        $event->max_participants = "";

        $data['event'] = $event;
        $data['events'] = config('ln.events');
        $data['_method'] = "POST";
        $data['time_stamps'] = [
            '6:00am', '6:30am', '7:00am', '7:30am', '8:00am', '8:30am', '9:00am', '9:30am', '10:00am', '10:30am', '11:00am', '11:30am', '12:00pm', '12:30pm', '1:00pm', '1:30pm', '2:00pm', '2:30pm', '3:00pm', '3:30pm', '4:00pm', '4:30pm', '5:00pm', '5:30pm', '6:00pm', '6:30pm', '7:00pm', '7:30pm', '8:00pm', '8:30pm', '9:00pm', '9:30pm', '10:00pm', '10:30pm', '11:00pm', '11:30pm',
        ];

        return view('legacy_admin.legacy_events_form', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventsRequest $request)
    {
        $data = $request->except('_method');
        $data = $this->eventsServices->create($data);

        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->eventsServices->find($id);
        $eventParticipants = $this->eventsServices->getEventParticipants($event->id);
        $eventStatuses = $this->eventStatusesServices->all();

        $data['event'] = $event;
        $data['participants'] = $eventParticipants;
        $data['statuses'] = $eventStatuses;

        return view('legacy_admin.legacy_events_participants_page', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->eventsServices->find($id);
        $data['event'] = $event;
        $data['events'] = config('ln.events');
        $data['_method'] = "PUT";
        $data['time_stamps'] = [
            '6:00am', '6:30am', '7:00am', '7:30am', '8:00am', '8:30am', '9:00am', '9:30am', '10:00am', '10:30am', '11:00am', '11:30am', '12:00pm', '12:30pm', '1:00pm', '1:30pm', '2:00pm', '2:30pm', '3:00pm', '3:30pm', '4:00pm', '4:30pm', '5:00pm', '5:30pm', '6:00pm', '6:30pm', '7:00pm', '7:30pm', '8:00pm', '8:30pm', '9:00pm', '9:30pm', '10:00pm', '10:30pm', '11:00pm', '11:30pm',
        ];
        return view('legacy_admin.legacy_events_form', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventsRequest $request, $id)
    {
        $data = $this->eventsServices->update($data = $request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->eventsServices->delete($id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }


}
