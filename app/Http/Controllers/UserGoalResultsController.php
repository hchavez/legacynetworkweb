<?php

namespace App\Http\Controllers;

use App\Services\UserGoalResultsServices;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserGoalResultsController extends Controller
{
    /**
     * @var UserGoalResultsServices
     */
    private $services;

    public function __construct(UserGoalResultsServices $services)
    {
        $this->services = $services;
    }

    public function setResults(Request $request)
    {
        DB::beginTransaction();

        try {
            $result = $this->services->findByArray([
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
            ]);

            if ($result) {
                $this->services->update([
                    'user_id' => Auth::user()->id,
                    'result' => $request->input('result'),
                    'category_id' => $request->input('category_id'),
                ], $result->id);
            } else {
                $this->services->create([
                    'user_id' => Auth::user()->id,
                    'result' => $request->input('result'),
                    'category_id' => $request->input('category_id'),
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        if ($request->input('category_id') == 1) {
            return redirect('distributor/business_building/success_compass');
        }

        return redirect('distributor/business_building/success_compass_business');
    }

}
