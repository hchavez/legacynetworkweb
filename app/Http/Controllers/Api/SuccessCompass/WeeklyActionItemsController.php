<?php

namespace App\Http\Controllers\Api\SuccessCompass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SuccessCompass\WeeklyActionsRequest;
use App\Services\Api\SuccessCompass\WeeklyActionItemsServices;
use App\Services\Api\SuccessCompass\WeeklyActionsServices;
use App\Transformers\NullTransformer;
use App\Transformers\SuccessCompassWeeklyActionItemsTransformer;
use App\Transformers\SuccessCompassWeeklyActionsTransformer;

class WeeklyActionItemsController extends Controller
{
    /**
     * @var WeeklyActionItemsServices
     */
    private $weeklyActionItemsServices;

    /**
     * WeeklyActionsController constructor.
     * @param WeeklyActionItemsServices $weeklyActionItemsServices
     * @internal param WeeklyActionsServices $resultsServices
     */
    public function __construct(WeeklyActionItemsServices $weeklyActionItemsServices)
    {
        $this->weeklyActionItemsServices = $weeklyActionItemsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $healthActionItem = $this->weeklyActionItemsServices->find($id);

        if (empty($healthActionItem)) {
            $data = fractal()->item($healthActionItem)
                ->transformWith(new NullTransformer())->toArray();

            return response()->json($data);
        }

        $data = fractal()->item($healthActionItem)
            ->transformWith(new SuccessCompassWeeklyActionItemsTransformer())->toArray();

        return response()->json($data);
    }

    public function destroy($id)
    {
        $this->weeklyActionItemsServices->delete($id);

        return response([
            'message' => 'deleted',
        ], 200);
    }

}
