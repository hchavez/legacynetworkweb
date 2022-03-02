<?php

namespace App\Http\Controllers\Api\SuccessCompass;

use App\Http\Requests\Api\SuccessCompass\NextStepGoalsRequest;
use App\Services\Api\SuccessCompass\NextStepGoalsServices;
use App\Transformers\NullTransformer;
use App\Transformers\SuccessCompassNextStepGoalsTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NextStepGoalsController extends Controller
{
    /**
     * @var NextStepGoalsServices
     */
    private $nextStepGoalsServices;

    public function __construct(NextStepGoalsServices $nextStepGoalsServices)
    {
        $this->nextStepGoalsServices = $nextStepGoalsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NextStepGoalsRequest $request)
    {

        if ($request->input('type') == 'health') {
            $userNextStepGoal = user()->nextHealthGoal;
        } else {
            $userNextStepGoal = user()->nextBusinessGoal;
        }

        if (empty($userNextStepGoal)) {
            $data = fractal()->item($userNextStepGoal)
                ->transformWith(new NullTransformer())->toArray();

            return response()->json($data);
        }

        $data = fractal()->item($userNextStepGoal)
            ->transformWith(new SuccessCompassNextStepGoalsTransformer())->toArray();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NextStepGoalsRequest $request)
    {
        $data = fractal()->item($this->nextStepGoalsServices->create($request->all()))
            ->transformWith(new SuccessCompassNextStepGoalsTransformer())->toArray();

        return response()->json($data);
    }

}
