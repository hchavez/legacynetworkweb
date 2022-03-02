<?php

namespace App\Http\Controllers\Api\SuccessCompass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SuccessCompass\WeeklyActionsRequest;
use App\Services\Api\SuccessCompass\WeeklyActionsServices;
use App\Transformers\NullTransformer;
use App\Transformers\SuccessCompassWeeklyActionsTransformer;
use Carbon\Carbon;

class WeeklyActionsController extends Controller
{
    /**
     * @var WeeklyActionsServices
     */
    private $weeklyActionsServices;

    /**
     * WeeklyActionsController constructor.
     * @param WeeklyActionsServices $resultsServices
     */
    public function __construct(WeeklyActionsServices $weeklyActionsServices)
    {
        $this->weeklyActionsServices = $weeklyActionsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeeklyActionsRequest $request)
    {
        if ($request->input('type') == 'health') {
            $healthActions = user()->healthActions;
        } else {
            $healthActions = user()->businessHealthActions;
        }

        if (empty($healthActions)) {
            $data = fractal()->item($healthActions)
                ->transformWith(new NullTransformer())->toArray();

            return response()->json($data);
        }

        $data = fractal()->collection($healthActions)
            ->transformWith(new SuccessCompassWeeklyActionsTransformer())->toArray();

        return response()->json($data);
    }

    public function show($id)
    {
        $healthAction = $this->weeklyActionsServices->find($id);

        if (empty($healthAction)) {
            $data = fractal()->item($healthAction)
                ->transformWith(new NullTransformer())->toArray();

            return response()->json($data);
        }

        $data = fractal()->item($healthAction)
            ->transformWith(new SuccessCompassWeeklyActionsTransformer())->toArray();

        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeeklyActionsRequest $request)
    {
        $data = fractal()->item($this->weeklyActionsServices->create($request->all()))
            ->transformWith(new SuccessCompassWeeklyActionsTransformer())->toArray();

        return response()->json($data);
    }

    public function destroy($id)
    {
        $this->weeklyActionsServices->delete($id);

        return response([
            'message' => 'deleted',
        ], 200);
    }

}
