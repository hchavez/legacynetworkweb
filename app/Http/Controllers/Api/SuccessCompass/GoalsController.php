<?php

namespace App\Http\Controllers\Api\SuccessCompass;

use App\Http\Requests\Api\SuccessCompass\GoalsRequest;
use App\Services\Api\SuccessCompass\GoalsServices;
use App\Transformers\NullTransformer;
use App\Transformers\SuccessCompassGoalsTransformer;
use App\Http\Controllers\Controller;

class GoalsController extends Controller
{
    /**
     * @var GoalsServices
     */
    private $goalsServices;

    public function __construct(GoalsServices $goalsServices)
    {
        $this->goalsServices = $goalsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GoalsRequest $request)
    {
        if ($request->input('type') == 'health') {
            $userHealthGoal = user()->healthGoal;
        } else {
            $userHealthGoal = user()->businessGoal;
        }

        if (empty($userHealthGoal)) {
            $data = fractal()->item($userHealthGoal)
                ->transformWith(new NullTransformer())->toArray();

            return response()->json($data);
        }

        $data = fractal()->item($userHealthGoal)
            ->transformWith(new SuccessCompassGoalsTransformer())->toArray();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalsRequest $request)
    {
        $data = fractal()->item($this->goalsServices->create($request->all()))
            ->transformWith(new SuccessCompassGoalsTransformer())->toArray();

        return response()->json($data);
    }

}
