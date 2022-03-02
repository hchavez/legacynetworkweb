<?php

namespace App\Http\Controllers\Api\SuccessCompass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SuccessCompass\ResultsRequest;
use App\Services\Api\SuccessCompass\ResultsServices;
use App\Transformers\NullTransformer;
use App\Transformers\SuccessCompassResultsTransformer;

class ResultsController extends Controller
{
    /**
     * @var ResultsServices
     */
    private $resultsServices;

    /**
     * ResultsController constructor.
     * @param ResultsServices $resultsServices
     */
    public function __construct(ResultsServices $resultsServices)
    {
        $this->resultsServices = $resultsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResultsRequest $request)
    {

        if ($request->input('type') == 'health') {
            $userNextStepGoal = user()->goalResults;
        } else {
            $userNextStepGoal = user()->businessGoalResults;
        }

        if (empty($userNextStepGoal)) {
            $data = fractal()->item($userNextStepGoal)
                ->transformWith(new NullTransformer())->toArray();

            return response()->json($data);
        }

        $data = fractal()->item($userNextStepGoal)
            ->transformWith(new SuccessCompassResultsTransformer())->toArray();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultsRequest $request)
    {
        $data = fractal()->item($this->resultsServices->create($request->all()))
            ->transformWith(new SuccessCompassResultsTransformer())->toArray();

        return response()->json($data);
    }

}
