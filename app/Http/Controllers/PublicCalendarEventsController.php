<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsRequest;
use App\Services\EventsServices;
use App\Services\EventStatusesServices;
use App\Services\PublicCalendarEventsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicCalendarEventsController extends Controller
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
    public function index(Request $request, $type_id)
    {
        $data = $this->publicCalendarEventsServices->getPublicCalendarEventsByTypeId($type_id, $request->input('start'), $request->input('end'));

        return response($data);
    }

}
