<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarPublicEventRequest;
use App\Http\Requests\EventsRequest;
use App\Services\EventsServices;
use App\Services\EventStatusesServices;
use App\Services\PublicCalendarEventsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPublicCalendarEventsController extends Controller
{
    /**
     * @var PublicCalendarEventsServices
     */
    private $publicCalendarEventsServices;

    /**
     * @param PublicCalendarEventsServices $publicCalendarEventsServices
     */
    public function __construct(PublicCalendarEventsServices $publicCalendarEventsServices)
    {
        $this->publicCalendarEventsServices = $publicCalendarEventsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.calendar_events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['_method'] = 'POST';
        $data['id'] = null;
        $data['type'] = null;

        return view('legacy_admin.calendar_events_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarPublicEventRequest $request)
    {
        $data = $this->publicCalendarEventsServices->create($request->except(['_method']));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendarEvent = $this->publicCalendarEventsServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $calendarEvent->id;
        $data['type'] = $calendarEvent->type;
        $data['title'] = $calendarEvent->title;
        $data['start_date'] = $calendarEvent->start_date->format('m/d/Y');
        $data['start_time'] = $calendarEvent->start_date->format('h:i a');
        $data['end_date'] = $calendarEvent->end_date->format('m/d/Y');
        $data['end_time'] = $calendarEvent->end_date->format('h:i a');
        $data['details'] = $calendarEvent->details;

        return view('legacy_admin.calendar_events_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalendarPublicEventRequest $request, $id)
    {
        $data = $this->publicCalendarEventsServices->update($request->except(['_method']), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->publicCalendarEventsServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }

    public function duplicate($id)
    {
        $calendarEvent = $this->publicCalendarEventsServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $calendarEvent->id;
        $data['type'] = $calendarEvent->type;
        $data['title'] = $calendarEvent->title;
        $data['start_date'] = $calendarEvent->start_date->format('m/d/Y');
        $data['start_time'] = $calendarEvent->start_date->format('h:i a');
        $data['end_date'] = $calendarEvent->end_date->format('m/d/Y');
        $data['end_time'] = $calendarEvent->end_date->format('h:i a');
        $data['details'] = $calendarEvent->details;

        return view('legacy_admin.calendar_events_duplicate_form', $data);
    }
}
